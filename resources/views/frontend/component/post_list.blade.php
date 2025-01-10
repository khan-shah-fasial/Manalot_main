
@php
// Get user IDs from the posts
$userIds = $posts->pluck('author_id')->unique();

// Cache user details for these IDs
$userDetails = Cache::remember('user_details_' . implode('_', $userIds->toArray()), 10 * 60, function () use ($userIds) {
    return DB::table('users')
        ->join('userdetails', 'users.id', '=', 'userdetails.user_id')
        ->whereIn('users.id', $userIds)
        ->select('users.id', 'users.username', 'userdetails.profile_photo')
        ->get()
        ->keyBy('id'); // Key the result by user ID for easy access
});
@endphp


@foreach ($posts as $post)

    @php
        // Get the user details for the current post's user_id
        $user = $userDetails->get($post->author_id);
    @endphp


    <div class="post mt-md-4 mt-3 proxima_nova_font">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <img class="user_img" src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : '/assets/images/drishti_img.png' }}" alt="user_img" />
                <div class="user_name_post">
                    <strong class="mb-0 user_name">{{ ucfirst($user->username) }}</strong>
                    <p class="text-xs mb-0" style="color: #535353">
                        {{ timeAgo($post->created_at) }} <i class="fa fa-globe"></i>
                    </p>
                </div>
            </div>
            <div class="action">
                <div class="dropdown_wrapper">
                    <button>Edit</button>
                    <button>Delete</button>
                </div>
                <i class="fa-solid fa-ellipsis-vertical"></i>
            </div>
            <a class="saved_clip" onclick="saved_post({{ $post->id }}, this);" href="javascript:void(0);" data-post-id="{{ $post->id }}">
                <img class="saved_clip_img" 
                     src="{{ auth()->user()->savedPosts->contains('post_id', $post->id) ? '/assets/images/saved_icon.svg' : '/assets/images/grey_saved_icon.svg' }}">
            </a>
        </div>
        <div class="mt-md-3 post_description">
            <div>
                @php
                    // Define the content
                    $content = $post->content;
            
                    // Use a regular expression to find hashtags and replace them with hyperlinks
                    $contentWithLinks = preg_replace_callback(
                        '/#(\w+)/', // Regex to find hashtags (e.g., #something)
                        function ($matches) {
                            $tag = $matches[1];
                            $url = route('index', ['tag' => $tag]);
                            return "<a href=\"$url\">#{$tag}</a>";
                        },
                        $content
                    );
            
                    // Convert line breaks to <br> and output the result
                    echo nl2br($contentWithLinks);
                @endphp
            </div>

         <div id="carouselExample" class="postslider_banner carousel slide w-100" data-bs-ride="carousel" data-bs-interval="3000">
    @if($post->media_type != null && $post->media_type == 'media')
        @php 
            $media = json_decode($post->image_url);
            $firstSlide = true; // Initialize a flag for the first slide
        @endphp

        <!-- Dynamic Pagination Indicators -->
        <div class="carousel-indicators">
            @foreach($media as $index => $row)
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            @foreach($media as $row)
                @if($row->type == 'image')
                    <div class="carousel-item {{ $firstSlide ? 'active' : '' }}">
                        <img width="100%" height="100%" src="{{ asset('storage/' . $row->path) }}" />
                    </div>
                @elseif($row->type == 'video')
                    <div class="carousel-item {{ $firstSlide ? 'active' : '' }}">
                        <!-- Autoplay Video -->
                        <video width="100%" height="100%" autoplay loop muted>
                            <source src="{{ asset('storage/' . $row->path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endif
                @php $firstSlide = false; @endphp <!-- Mark that the first slide is processed -->
            @endforeach
        </div>
    @endif

    <!-- Previous and Next Controls -->
    <button class="carousel-control-prev" data-bs-target="#carouselExample" type="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" data-bs-target="#carouselExample" type="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

        <div class="like_comnt">
            <a href="javascript:void(0);" class="upper-like-count" id="like-count-{{$post->id}}" onclick="openLikeModal({{ $post->id }}, {{ $post->likes->count() }})">{{ $post->likes->count() }}</a>
            <ul class="like_comnt_list">
                <li class="like_comnt_list_item">
                    <a id="like_comnt_link_like" class="like_comnt_link {{ auth()->user()->likes->contains('post_id', $post->id) ? 'add-like' : '' }}" 
                       href="#" 
                       data-post-id="{{ $post->id }}">
                        <span class="like_text">
                            <img class="like_img" src="/assets/images/like_icon.svg">
                            Like <span class="like-count">{{ $post->likes->count() }}</span>
                        </span>
                    </a>
                </li>
                <li class="like_comnt_list_item">
                    <a id="add-comment-{{ $post->id }}" 
                       class="like_comnt_link show-comment-form"
                       onclick="show_comment_form(event, '{{ $post->id }}')"
                       href="#" 
                       data-post-id="{{ $post->id }}">
                        <span class="comment_text">
                            <img class="comment_img" src="/assets/images/comnt_icon.svg">
                            Comment <span class="comment-count">{{ $post->comments->count() }}</span>
                        </span>
                    </a>
                </li>
                <li class="like_comnt_list_item">
                    <a class="like_comnt_link" href="">
                        <span class="share_text">
                            <img class="share_img" src="/assets/images/share_icon.svg">
                            Share
                        </span>
                    </a>
                </li>
                <li class="like_comnt_list_item d-none d-lg-block">
                    <a class="like_comnt_link" href="">
                        <span class="send_text">
                            <img class="send_img" src="/assets/images/send_icon.svg">
                            Apply Now
                        </span>
                    </a>
                </li>
            </ul>
        </div>


        <!-- Comments Section -->
        <div class="comments-section position-relative" id="comments-section-{{ $post->id }}" style="display: none;">
            <!-- Comment Form -->
            <form class="comment-form" data-post-id="{{ $post->id }}">
                <textarea name="comment" class="comment-input" placeholder="Write a comment..."></textarea>
                <input type="hidden" name="parent_id" class="parent-id" value="">
                <button type="submit" class="comment_btns"><img src="/assets/images/post_button_icons.svg"></button>
            </form>
            <div class="comments-list"></div>
        </div>

    </div>
    </div>
@endforeach

<!-- Modal for showing likes -->
<div class="modal fade" id="likeModal" tabindex="-1" aria-labelledby="likeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="likeModalLabel">Post Likes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="likeList" class="list-group">
                    <!-- User list will be appended here -->
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- <div class="post mt-4 proxima_nova_font">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-2">
            <img class="user_img" src="/assets/images/drishti_img.png" alt="user_img" />
            <div class="user_name_post">
                <strong class="mb-0 user_name">Drishti Jadhav</strong>
                <p class="text-xs mb-0" style="color: #535353">
                    12 Minutes ago <i class="fa fa-globe"></i>
                </p>
            </div>
        </div>
        <div class="action">
            <div class="dropdown_wrapper">
                <button>Edit</button>
                <button>Delete</button>
            </div>
            <i class="fa-solid fa-ellipsis-vertical"></i>
        </div>
        <a class="saved_clip" href="">
            <img class="saved_clip_img" src="/assets/images/grey_saved_icon.svg">
        </a>
    </div>
    <div class="mt-md-3 post_description">
        <p class="post_content">
            In my years leading Manalot, I take particular pride in sharing that many of our most successful 
            leadership placements have been professionals who navigated career transitions after layoffs. 
        </p>
        <p class="post_content">
            The current market realities mean business restructuring reflects organizational shifts, 
            not individual capabilities. Therefore, to those who are in transition: focus on documenting your 
            achievements with concrete metrics and invest time in meaningful professional relationships. 
        </p>
        <p class="post_content">
            At Manalot, we've consist
        </p>
        <!-- <img src="/assets/images/post.jpg" class="w-100" alt="" /> -->
        <!-- <div class="d-flex align-items-center justify-content-between mt-3 like_comnts_n_events">
            <div class="d-flex align-items-center gap-3 like_n_comnts">
                <div class="d-flex align-items-center gap-1">
                    <img src="/assets/images/heart.png" alt="" />
                    <span>15k</span>
                </div>
                <div class="d-flex align-items-center gap-1">
                    <img src="/assets/images/comment.png" alt="" />
                    <span>120</span>
                </div>
            </div>
            <div class="d-flex align-items-center gap-1 events">
                <span class="pe-2">Events</span>
                <img src="/assets/images/event.png" alt="" />
            </div>
        </div> -->
        <!-- <div class="d-flex align-items-center gap-3 mt-4">
            <img src="/assets/images/s-logo.png" alt="" />
            <input type="text" class="comment_input" placeholder="Write your comment" />
        </div> -->
    </div>
    <div class="like_comnt">
        <ul class="like_comnt_list">
            <li class="like_comnt_list_item">
                <a class="like_comnt_link" href="">
                    <span class="like_text">
                        <img class="like_img" src="/assets/images/like_icon.svg">
                        Like
                    </span>
                </a>
            </li>
            <li class="like_comnt_list_item">
                <a class="like_comnt_link" href="">
                    <span class="comment_text">
                        <img class="comment_img" src="/assets/images/comnt_icon.svg">
                        Comment
                    </span>
                </a>
            </li>
            <li class="like_comnt_list_item">
                <a class="like_comnt_link" href="">
                    <span class="share_text">
                        <img class="share_img" src="/assets/images/share_icon.svg">
                        Share
                    </span>
                </a>
            </li>
            <li class="like_comnt_list_item">
                <a class="like_comnt_link" href="">
                    <span class="send_text">
                        <img class="send_img" src="/assets/images/send_icon.svg">
                        Apply Now
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div> --}}


@section('component.scripts')
<script>

    const loggedInUserId = {{ auth()->user()->id }};

    function timeAgo(date) {
        const now = new Date();
        const seconds = Math.floor((now - date) / 1000);
        const intervals = {
            year: 31536000,
            month: 2592000,
            day: 86400,
            h: 3600,
            min: 60,
            sec: 1
        };
        for (let key in intervals) {
            const interval = Math.floor(seconds / intervals[key]);
            if (interval >= 1) {
                return `${interval} ${key}${interval > 1 ? '' : ''}`;
            }
        }
        return 'now';
    }



    $(document).on('click', '#like_comnt_link_like', function (e) {
        e.preventDefault();

        const likeButton = $(this);
        const postId = likeButton.data('post-id'); // Ensure the `post_id` is stored in `data-post-id`
        const likeCountElement = likeButton.find('.like-count'); // Assuming you have a span for the count

        $.get('/csrf-token', function (data) {
            const csrfToken = data.token;

            // Perform the AJAX request
            $.ajax({
                url: `{{ url(route('posts.like')) }}`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Set the token in the header
                },
                data: {
                    post_id: postId
                },
                success: function (response) {
                    if (response.status === 'liked') {
                        likeButton.addClass('add-like');
                    } else {
                        likeButton.removeClass('add-like');
                    }

                    // Update the like count
                    likeCountElement.text(response.likeCount);

                    // Locate the parent comment div
                    const parentLikeDiv = $(`#like-count-${postId}`);
                    parentLikeDiv.text(response.likeCount);
                },
                error: function (xhr) {
                    console.error('Something went wrong:', xhr.responseText);
                },
            });
        });
    });




    // Show/Hide Comment Form and Fetch Comments
    function show_comment_form(e, postId) {
        e.preventDefault();
        // const postId = $(this).data('post-id');
        const commentsSection = $(`#comments-section-${postId}`);

        // Close all other comment sections
        $('.comments-section').not(commentsSection).hide();

        // Toggle the current comment section
        commentsSection.toggle();

        if (commentsSection.is(':visible')) {
            fetchComments(postId);
        }
    };

    // Fetch Comments for a Post
    function fetchComments(postId) {
        $.ajax({
            url: `/posts/${postId}/comments`,
            type: 'GET',
            success: function (response) {
                if (response.comments && Array.isArray(response.comments)) {
                    // Generate and update comments list
                    const commentsHTML = response.comments.map(comment => generateCommentHTML(comment)).join('');
                    $(`#comments-section-${postId} .comments-list`).html(commentsHTML);

                    // Update the comment count
                    $(`#add-comment-${postId} .comment-count`).text(response.commentCount);
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function (xhr) {
                console.error('Error fetching comments:', xhr.responseText);
            }
        });
    }

    // Generate Comment HTML
    function generateCommentHTML(comment) {
        let repliesHTML = '';
        if (Array.isArray(comment.replies) && comment.replies.length > 0) {
            // Use the `created_at` value from the comment object
            const commenttime_reply = timeAgo(new Date(comment.created_at));
            repliesHTML = comment.replies.map(reply => `
                <div class="reply" id="comment-${reply.id}">

                       <div class="row">
                           <div class="col-md-1">
                                <img class="user_img" 
                        src="${reply.userdetails?.profile_photo 
                                ? `/storage/${reply.userdetails.profile_photo}` 
                                : '/assets/images/drishti_img.png'}" 
                        alt="user_img" />
                           </div>
                           <div class="col-md-9 ps-1">
                                <p class="main_admin_head">${reply.user.username}:</p>
                                <div class="reply_content">
                                   ${reply.content}
                                </div>
                                
                                 <a href="#" class="reply-link" onclick="reply_form(${reply.parent_id},${reply.post_id},'${reply.user.username}');">Reply</a>
                           </div>

                           <div class="col-md-2">
                           <div class="comment_rights">
                           <div class=""><b>${commenttime_reply}</b></div>

                           <div class="dropdown">
                                <a class="" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="/assets/images/dots_icons1.svg">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <!-- Add Action -->
                                   
                                        ${
                    comment.user_id === loggedInUserId
                        ? `
                           <li> <a href="javascript:void(0);" class="delete-link" data-comment-id="${reply.id}" onclick="deleteComment(${reply.id}, ${comment.post_id}, this)">Delete</a></li>
                           <li><a href="javascript:void(0);" class="edit-link" data-comment-id="${reply.id}" onclick="edit_form(${reply.parent_id}, ${reply.id}, '${reply.content}');">Edit</a></li>
                        `
                        : ''
                    }
                                   
                                    
                                </ul>
                            </div>
                              
                           </div>
                           </div>
                       </div>
                </div>
            `).join('');
        }

        if(comment.parent_id === null){
            // Use the `created_at` value from the comment object
            const commenttime = timeAgo(new Date(comment.created_at));
            return `
                <div class="comment" id="comment-${comment.id}">
                <div class="row">
                <div class="col-md-1">
                   <img class="user_img" 
                     src="${comment.userdetails?.profile_photo 
                            ? `/storage/${comment.userdetails.profile_photo}` 
                            : '/assets/images/drishti_img.png'}" 
                     alt="user_img" />
                </div>
                   
                    <div class="col-md-9 ps-1">
                            <p class="main_admin_head">${comment.user.username}:</p> 
                   <div class="reply_content">
                        ${comment.content} 
                   </div>

                   <a href="#" class="reply-link" data-parent-id="${comment.id}" data-post-id="${comment.post_id}" data-user-name="${comment.user.username}">Reply</a>
                   
                   
                   
                    </div>

                     <div class="col-md-2">
                     <div class="comment_rights">
                    <div class="">
                      <b>${commenttime}</b>
                    </div> 
                       <div class="comment_rights">
                            <div class="dropdown">
                        ${
                    comment.user_id === loggedInUserId
                    ? `<a class="" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/assets/images/dots_icons1.svg">
                    </a>`
                        : ''
                    }
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    ${
                                    comment.user_id === loggedInUserId
                                        ? `<a href="javascript:void(0);" class="delete-link" data-comment-id="${comment.id}" onclick="deleteComment(${comment.id}, ${comment.post_id}, this)">Delete</a>`
                                        : ''
                                    }
                                </li>
                                <li>
                                    ${
                                    comment.user_id === loggedInUserId
                                        ? `<a class="edit-link dropdown-item" href="javascript:void(0);" data-parent-id="${comment.id}" data-comment-id="${comment.id}" data-contain="${comment.content}" onclick="edit_form(${comment.id}, ${comment.id}, '${comment.content}');">
                                            Edit
                                        </a>`
                                        : ''
                                    }
                                </li>
                            </ul>
                          </div>
                        </div>
                       </div>
                    </div>


                    <div class="col-md-12">
                         <div class="replies ps-5">${repliesHTML}</div>
                    </div>
                </div>
                </div>
            `;
        }

    }


    function generateReplyCommentHTML(comment) {
        let repliesHTML = '';
        const commentjust = timeAgo(new Date(comment.created_at));
        return `
            
        

        <div class="reply" id="comment-${comment.id}">

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-8">
             <p class="main_admin_head">${comment.user.username}:</p> 
                  <div class="reply_content">
                        ${comment.content} 
                   </div>

            </div>
            <div class="col-md-3">
                 <div class="comment_rights">
                 <div class="">
                     ${commentjust}
                 </div>
                            <div class="dropdown">
                        ${
                    comment.user_id === loggedInUserId
                    ? `<a class="" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/assets/images/dots_icons1.svg">
                    </a>`
                        : ''
                    }
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    ${
                comment.user_id === loggedInUserId
                    ? `
                        <a href="javascript:void(0);" class="delete-link" data-comment-id="${comment.id}" onclick="deleteComment(${comment.id}, ${comment.post_id}, this)">Delete</a>
                        `
                    : ''
                }
                                </li>
                                <li>
                                    ${
                comment.user_id === loggedInUserId
                    ? `
                        <a href="javascript:void(0);" class="edit-link" data-comment-id="${comment.id}" onclick="edit_form(${comment.parent_id}, ${comment.id}, '${comment.content}');">Edit</a>
                    `
                    : ''
                }
                                </li>
                            </ul>
                          </div>
                        </div>
            
            </div>
        </div>

              
               
            </div>
        `;
    }

    // Submit Comment or Reply
    $(document).on('submit', '.comment-form, .comment-form-reply', function (e) {
        e.preventDefault();

        const form = $(this);
        const postId = form.data('post-id');
        const comment = form.find('.comment-input').val();
        const parentId = form.find('.parent-id').val();


        $.get('/csrf-token', function (data) {
            const csrfToken = data.token;
            $.ajax({
                url: '/comments',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Set the token in the header
                },
                data: {
                    post_id: postId,
                    comment: comment,
                    parent_id: parentId
                },
                success: function (response) {
                    if (response.success) {
                        form.find('.comment-input').val(''); // Clear input
                        form.find('.parent-id').val('');    // Reset parent ID

                        // Remove any existing .comment-form-reply forms
                        if ($('.comment-form-reply').length > 0) {
                            $('.comment-form-reply').remove();

                                                // Add the new comment or reply to the DOM
                            const newCommentHTML = generateReplyCommentHTML(response.comment);

                            if (parentId) {
                                // If it's a reply, append it to the appropriate reply section
                                $(`#comment-${parentId} .replies`).append(newCommentHTML);
                            } else {
                                // If it's a new comment, append it to the main comments list
                                $(`#comments-section-${postId} .comments-list`).append(newCommentHTML);
                            }


                        }

                        fetchComments(postId);              // Refresh comments


                    }
                },
                error: function (xhr) {
                    console.error('Error submitting comment:', xhr.responseText);
                }
            });
        });
    });

    // Handle Reply Link
    $(document).on('click', '.reply-link', function (e) {
        e.preventDefault();

        const parentId = $(this).data('parent-id');
        const post_id = $(this).data('post-id');
        const repliesDiv = $(this).siblings('.replies');
        const user_name = $(this).data('user-name');

        // Check if a reply form already exists
        const existingForm = repliesDiv.find('.comment-form-reply');

        if (existingForm.length > 0) {
            // If the form exists, remove it
            existingForm.remove();
        } else {
            // If the form doesn't exist, create and append it
            const replyFormHTML = `
                <form class="comment-form-reply mt-2 position-relative" data-post-id="${post_id}">
                    <textarea name="comment" class="comment-input form-control" placeholder="Write a comment...">${user_name} </textarea>
                    <input type="hidden" name="parent_id" class="parent-id" value="${parentId}">
                    <input type="hidden" name="parent_id" class="post_id" value="${post_id}">
                    <button type="submit" class="comment_btns"><img src="/assets/images/post_button_icons.svg"></button>
                </form>
            `;
            repliesDiv.append(replyFormHTML);
        }
    });

    function reply_form(parentId, postId, userName) {
        // Remove any existing reply form
        $('.comment-form-reply').remove();

        // Locate the parent comment div
        const parentDiv = $(`#comment-${parentId}`);

        // Check if the form is already appended
        if (parentDiv.find('.comment-form-reply').length === 0) {
            // Create the reply form
            const replyFormHTML = `
                <form class="comment-form-reply mt-2 position-relative" data-post-id="${postId}">
                    <textarea name="comment" class="comment-input form-control" placeholder="Write a comment...">${userName}</textarea>
                    <input type="hidden" name="parent_id" class="parent-id" value="${parentId}">
                    <input type="hidden" name="post_id" class="post-id" value="${postId}">
                    <button type="submit" class="comment_btns"><img src="/assets/images/post_button_icons.svg"></button>
                </form>
            `;

            // Append the form immediately after the parent div
            parentDiv.after(replyFormHTML);
        }
    }

    // $(document).on('click', '.edit-link', function (e) {
    //     e.preventDefault();

    //     const parentId = $(this).data('parent-id');
    //     const commentId = $(this).data('comment-id');
    //     const repliesDiv = $(this).siblings('.replies');
    //     const contain = $(this).data('contain');

    //     // Check if a reply form already exists
    //     const existingForm = repliesDiv.find('.comment-form-reply');

    //     if (existingForm.length > 0) {
    //         // If the form exists, remove it
    //         existingForm.remove();
    //     } else {
    //         // If the form doesn't exist, create and append it
    //         const replyFormHTML = `
    //             <form class="comment-form-reply mt-2" data-comment-id="${commentId}">
    //                 <textarea name="comment" class="comment-input form-control" placeholder="Write a comment...">${contain}</textarea>
    //                 <input type="hidden" name="comment_id" class="comment-id" value="${commentId}">
    //                 <button type="submit" class="btn btn-primary btn-sm mt-2">Post</button>
    //             </form>
    //         `;
    //         repliesDiv.append(replyFormHTML);
    //     }
    // });

    function edit_form(parentId, commentId, contain) {
        // Remove any existing reply form
        $('.comment-form-reply').remove();

        // Locate the parent comment div
        const parentDiv = $(`#comment-${parentId}`);

        // Check if the form is already appended
        if (parentDiv.find('.comment-form-reply').length === 0) {
            // Create the reply form
            const replyFormHTML = `
                <form class="comment-form-reply mt-2 position-relative" data-comment-id="${commentId}">
                    <textarea name="comment" class="comment-input form-control" placeholder="Write a comment...">${contain}</textarea>
                    <input type="hidden" name="comment_id" class="comment-id" value="${commentId}">
                    <button type="submit" class="comment_btns"><img src="/assets/images/post_button_icons.svg"></button>
                </form>
            `;

            // Append the form immediately after the parent div
            parentDiv.after(replyFormHTML);
        }
    }

    
    function deleteComment(commentId, postId, element) {
        // if (!confirm("Are you sure you want to delete this comment?")) {
        //     return; // User cancelled the action
        // }

        $.get('/csrf-token', function (data) {
            const csrfToken = data.token;

            $.ajax({
                url: `/comments/${commentId}`, // Adjust the URL to match your Laravel route
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    if (response.success) {
                        // Remove the comment div
                        $(element).closest('.comment').remove();

                        fetchComments(postId)

                    } else {
                        alert(response.message || 'Failed to delete the comment.');
                    }
                },
                error: function(xhr) {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    }


    // function saved_post(postId, element) {
    //     const icon = $(this).find('.saved_clip_img');
    //     console.log('working tt 2');

    //     $.get('/csrf-token', function (data) {
    //         const csrfToken = data.token;

    //         $.ajax({
    //             url: `{{ url(route('toggle-save-post')) }}`;,
    //             method: 'POST',
    //             headers: {
    //                 'X-CSRF-TOKEN': csrfToken // Set the token in the header
    //             },
    //             data: {
    //                 post_id: postId
    //             },
    //             success: function (response) {
    //                 if (response.success) {
    //                     if (response.saved) {
    //                         $icon.attr('src', '/assets/images/saved_icon.svg');
    //                     } else {
    //                         $icon.attr('src', '/assets/images/grey_saved_icon.svg');
    //                     }
    //                 }
    //             },
    //             error: function () {
    //                 alert('Failed to toggle save status. Please try again.');
    //             }
    //         });
    //     });
    // };

    function saved_post(postId, element) {
        const $icon = $(element).find('.saved_clip_img'); // Find the image element within the clicked element

        $.get('/csrf-token', function (data) {
            const csrfToken = data.token;

            $.ajax({
                url: `{{ url(route('toggle-save-post')) }}`, // Correct syntax
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Set the CSRF token in the header
                },
                data: {
                    post_id: postId
                },
                success: function (response) {
                    if (response.success) {
                        // Update the image source based on the response
                        if (response.saved) {
                            $icon.attr('src', '/assets/images/saved_icon.svg');
                        } else {
                            $icon.attr('src', '/assets/images/grey_saved_icon.svg');
                        }
                    }
                },
                error: function () {
                    alert('Failed to toggle save status. Please try again.');
                }
            });
        });
    }

    function openLikeModal(postId, likeCount) {
        // Only open the modal if there are likes
        // if (likeCount > 0) {
            // Make an AJAX request to fetch the list of users who liked the post
            $.ajax({
                url: `/posts/${postId}/likes`, // Define the route in your backend
                type: 'GET',
                success: function (response) {
                    // Populate the modal with the list of users
                    const likeList = $('#likeList');
                    likeList.empty(); // Clear any existing content
                    response.likes.forEach(user => {
                        likeList.append(`<li class="list-group-item">${user.username}</li>`);
                    });

                    // Show the modal
                    $('#likeModal').modal('show');
                },
                error: function (error) {
                    console.error('Error fetching likes:', error);
                }
            });
        // }
    }


</script>

@endsection