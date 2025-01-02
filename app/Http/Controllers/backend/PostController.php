<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class PostController extends Controller
{
    // View all post statuses
    public function index_posts()
    {
        // Retrieve posts with author information, likes count, shares count, and comments count
        $posts = DB::table('posts as QC')
            ->join('users as QP', 'QC.author_id', '=', 'QP.id')
            ->leftJoin('post_likes as PL', 'QC.id', '=', 'PL.post_id')
            ->leftJoin('post_shares as PS', 'QC.id', '=', 'PS.post_id')
            ->leftJoin('comments as PC', 'QC.id', '=', 'PC.post_id')
            ->select(
                'QC.id',
                'QC.author_id',
                'QC.content',
                'QC.event',
                'QC.image_url',
                'QC.status',
                'QC.created_at',
                'QC.updated_at',
                'QP.username',
                DB::raw('COUNT(DISTINCT PL.id) as likes_count'),
                DB::raw('COUNT(DISTINCT PS.id) as shares_count'),
                DB::raw('COUNT(DISTINCT PC.id) as comments_count')
            )
            ->groupBy('QC.id', 'QP.username', 'QC.author_id', 'QC.content', 'QC.event', 'QC.image_url', 'QC.status', 'QC.created_at', 'QC.updated_at')
            ->get();

        // Convert created_at fields to Carbon instances
        $posts->transform(function ($post) {
            $post->created_at = Carbon::parse($post->created_at);
            return $post;
        });

        return view('backend.pages.posts.index', compact('posts'));
    }


    // Likes Functionality
    public function likes_post($id)
    {
        $likes = DB::table('post_likes')
                    ->join('users', 'post_likes.user_id', '=', 'users.id')
                    ->select('users.username', 'post_likes.created_at')
                    ->where('post_likes.post_id', $id)
                    ->get();

        return view('backend.pages.posts.likes', compact('likes'));
    }

    // Comments Functionality
    public function comments_post($id)
    {
        // Fetch comments for the post and arrange them in a hierarchical format
        $comments = $this->getComments($id);
    
        return view('backend.pages.posts.comments', compact('comments'));
    }
    
    private function getComments($postId, $parentId = null, $level = 0)
    {
        $comments = DB::table('comments')
                    ->join('users', 'comments.user_id', '=', 'users.id')
                    ->select('comments.*', 'users.username')
                    ->where('comments.post_id', $postId)
                    ->where('comments.parent_id', $parentId)
                    ->orderBy('comments.created_at', 'asc')
                    ->get();
    
        $result = [];
    
        foreach ($comments as $comment) {
            $comment->replies = $this->getComments($postId, $comment->id, $level + 1);
            $result[] = $comment;
        }
    
        return $result;
    }
    

    // Shares Functionality
    public function shared_post($id)
    {
        $shares = DB::table('post_shares')
                    ->join('users', 'post_shares.user_id', '=', 'users.id')
                    ->select('users.username', 'post_shares.created_at')
                    ->where('post_shares.post_id', $id)
                    ->get();

        return view('backend.pages.posts.shares', compact('shares'));
    }


    // Show the form for adding a new post status
    public function add_posts()
    {
        return view('backend.pages.posts.add');
    }

    // Create a new post status
    public function create_posts(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
            'event' => 'nullable|string|max:100',
           'media.*' => 'nullable|file|mimes:jpeg,jpg,png,webp,gif,mp4,mov,avi,wmv|max:10240', // Validate image files only
        //     'video' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:10240', // Validate video files with a max size of 10MB
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        // Retrieve the authenticated admin user
        $author_id = auth()->user()->id;

        // Handle file uploads
        $imagePathPost = null;
        $post_type = null;
        // if ($request->hasFile('media')) {

            // $file = $request->file('media');
            // $mimeType = $file->getMimeType();

            // // Check if the media is an image or video based on MIME type
            // if (strpos($mimeType, 'image') !== false) {
            //     // It's an image
            //     $imagePathPost = $file->store('assets/image/post', 'public');
            //     $type = 'image';
            // } elseif (strpos($mimeType, 'video') !== false) {
            //     // It's a video
            //     $imagePathPost = $file->store('assets/video/post', 'public');
            //     $type = 'video';
            // }

            if ($request->hasFile('media')) {
                $mediaArray = []; // Initialize an array to store the file paths and types
                $post_type = 'media';
                foreach ($request->file('media') as $file) {
                    $mimeType = $file->getMimeType();
            
                    // Check if the media is an image or video based on MIME type
                    if (strpos($mimeType, 'image') !== false) {
                        // It's an image
                        $filePath = $file->store('assets/image/post', 'public');
                        $type = 'image';
                    } elseif (strpos($mimeType, 'video') !== false) {
                        // It's a video
                        $filePath = $file->store('assets/video/post', 'public');
                        $type = 'video';
                    } else {
                        continue; // Skip unsupported file types
                    }
            
                    // Add the file details to the media array
                    $imagePathPost[] = [
                        'path' => $filePath,
                        'type' => $type,
                    ];
                }
            
                // // You can now save $mediaArray to the database or use it further
                // return response()->json(['media' => $mediaArray], 200);
            }


        // }

        // if ($request->hasFile('video')) {
        //     $imagePathPost = $request->file('video')->store('assets/video/post', 'public');
        //     $type = 'video';
        // }

        if ($request->has('event')) {
            $post_type = 'event';
        }

        if ($request->has('poll')) {
            $post_type = 'poll';
        }

        // Insert post data into the database
        $post = DB::table('posts')->insertGetId([
            'author_id' => $author_id,
            'content' => $request->input('content'),
            'event' => $request->input('event'),
            'status' => $request->input('status', '1'),
            'image_url' => json_encode($imagePathPost),
            'media_type' => $post_type,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($post) {

            Cache::flush();

            $response = [
                'status' => true,
                'notification' => 'Post added successfully!',
            ];
        } else {
            $response = [
                'status' => false,
                'notification' => 'Error!',
            ];
        }

        return response()->json($response);
    }

    // Show the form for editing an existing post status
    public function edit_posts($id)
    {
        $posts = DB::table('posts')->where('id', $id)->first();
        return view('backend.pages.posts.edit', compact('posts'));
    }

    // View a specific post status
    public function view_posts($id)
    {
        // Fetch the post with author information, likes count, shares count, and comments count
        $post = DB::table('posts as QC')
            ->join('users as QP', 'QC.author_id', '=', 'QP.id')
            ->leftJoin('post_likes as PL', 'QC.id', '=', 'PL.post_id')
            ->leftJoin('post_shares as PS', 'QC.id', '=', 'PS.post_id')
            ->leftJoin('comments as PC', 'QC.id', '=', 'PC.post_id')
            ->select(
                'QC.id',
                'QC.author_id',
                'QC.content',
                'QC.event',
                'QC.image_url',
                'QC.status',
                'QC.created_at',
                'QC.updated_at',
                'QP.username',
                DB::raw('COUNT(DISTINCT PL.id) as likes_count'),
                DB::raw('COUNT(DISTINCT PS.id) as shares_count'),
                DB::raw('COUNT(DISTINCT PC.id) as comments_count')
            )
            ->where('QC.id', $id)
            ->groupBy('QC.id', 'QP.username', 'QC.author_id', 'QC.content', 'QC.event', 'QC.image_url', 'QC.status', 'QC.created_at', 'QC.updated_at')
            ->first();

        // Convert created_at and updated_at fields to Carbon instances
        if ($post) {
            $post->created_at = Carbon::parse($post->created_at);
            $post->updated_at = Carbon::parse($post->updated_at);
        }

        return view('backend.pages.posts.view', compact('post'));
    }

    // Update an existing post status
    public function update_posts(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:posts,id',
            'content' => 'required|string',
            'event' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpeg,webp,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 422); // Use 422 for validation errors
        }

        $id = $request->input('id');

        // Retrieve the post by ID
        $post = DB::table('posts')->where('id', $id)->first();

        if (!$post) {
            return response()->json([
                'status' => false,
                'notification' => 'Post not found'
            ], 404);
        }

        // Retrieve the authenticated admin user
        $author_id = auth()->user()->id;

        // Handle file uploads
        $imagePathPost = $post->image_url;
        if ($request->hasFile('image')) {
            $imagePathPost = $request->file('image')->store('assets/image/post', 'public');
        }

        // Update the Post record using DB facade
        $affected = DB::table('posts')
            ->where('id', $id)
            ->update([
                'author_id' => $author_id,
                'content' => $request->input('content'),
                'event' => $request->input('event'),
                'status' => $request->input('status'),
                'image_url' => $imagePathPost,
                'updated_at' => now(),
            ]);

        if ($affected) {

            Cache::flush();

            $response = [
                'status' => true,
                'notification' => 'Post updated successfully!',
            ];
        } else {
            $response = [
                'status' => false,
                'notification' => 'No changes made to the Post.',
            ];
        }

        return response()->json($response);
    }

    // Delete an existing post status
    public function delete_posts($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        if (!$post) {
            $response = [
                'status' => false,
                'notification' => 'Record not found!',
            ];
            return response()->json($response);
        }

        // Delete post record
        DB::table('posts')->where('id', $id)->delete();

        Cache::flush();

        $response = [
            'status' => true,
            'notification' => 'Post deleted successfully!',
        ];

        return response()->json($response);
    }
}
