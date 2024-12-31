@extends('frontend.layouts.app')

@section('page.title', 'Manalot')

@section('page.description', '')

@section('page.type', 'website')

@section('page.content')

<style>
    @media screen and (min-width: 1200px) {
        .container, .container-lg, .container-md, .container-sm, .container-xl {
            max-width: 1270px;
        }
    }

    .right_sidebar {
    width: 257px;
}

.left_sidebar {
    width: 257px;
}
body
{
        background-color: #e7ecef;
}

#loading img {
    width: 50px;
    height: auto;
}

#loading p {
    margin-top: 10px;
    font-size: 14px;
    color: #555;
}

.no-posts-message {
    margin-top: 20px;
    font-size: 16px;
    color: #888;
    text-align: center;
}

</style>

    <section class="pb-5 mt80" style="background-color: #e7ecef">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-md-3 mt-4 pb-md-5 pb-3 order-md-1 order-3 right_sidebar_parent_div width_20">
                    <aside class="right_sidebar">
                        
                            <div class="activity helvetica_font">
                                <div class="d-flex flex-column mb-md-3 mb-2">
                                    <strong class="text-lg">Trending Now</strong>
                                    <span class="curated text-sm">Curated by Manalot</span>
                                </div>
                                <ul class="list-unstyled d-flex flex-column gap-0">
                                    <li class="d-flex align-items-center gap-0">
                                        <!-- <img src="/assets/images/newss1.png" alt="" /> -->
                                        <p class="d-flex flex-column ">
                                            <a class="trending_link" href="">
                                                Green Skills Report
                                            </a>
                                            <span class="text-xs">10 min ago&nbsp;&nbsp;
                                                <a class="watched" href=""><i class="fa fa-eye"></i>&nbsp;&nbsp; 4,532</a>
                                            </span>
                                        </p>
                                    </li>                                    
                                    
                                    <li class="d-flex align-items-center gap-0">
                                        <!-- <img src="/assets/images/newss1.png" alt="" /> -->
                                        <p class="d-flex flex-column ">
                                            <a class="trending_link" href="">
                                                Green Skills Report
                                            </a>
                                            <span class="text-xs">10 min ago&nbsp;&nbsp;
                                                <a class="watched" href=""><i class="fa fa-eye"></i>&nbsp;&nbsp; 4,532</a>
                                            </span>
                                        </p>
                                    </li>   
                                    
                                    <li class="d-flex align-items-center gap-0">
                                        <!-- <img src="/assets/images/newss1.png" alt="" /> -->
                                        <p class="d-flex flex-column ">
                                            <a class="trending_link" href="">
                                                Green Skills Report
                                            </a>
                                            <span class="text-xs">10 min ago&nbsp;&nbsp;
                                                <a class="watched" href=""><i class="fa fa-eye"></i>&nbsp;&nbsp; 4,532</a>
                                            </span>
                                        </p>
                                    </li>   
                                    
                                    <li class="d-flex align-items-center gap-0">
                                        <!-- <img src="/assets/images/newss1.png" alt="" /> -->
                                        <p class="d-flex flex-column ">
                                            <a class="trending_link" href="">
                                                Green Skills Report
                                            </a>
                                            <span class="text-xs">10 min ago&nbsp;&nbsp;
                                                <a class="watched" href=""><i class="fa fa-eye"></i>&nbsp;&nbsp; 4,532</a>
                                            </span>
                                        </p>
                                    </li>   
                                    
                                    <li class="d-flex align-items-center gap-0">
                                        <!-- <img src="/assets/images/newss1.png" alt="" /> -->
                                        <p class="d-flex flex-column ">
                                            <a class="trending_link" href="">
                                                Green Skills Report
                                            </a>
                                            <span class="text-xs">10 min ago&nbsp;&nbsp;
                                                <a class="watched" href=""><i class="fa fa-eye"></i>&nbsp;&nbsp; 4,532</a>
                                            </span>
                                        </p>
                                    </li>   
                                </ul>
                            </div>
                       
                        <!-- <div class="adds mt-4">
                            <img src="/assets/images/offer2.png" class="w-100" alt="" />
                        </div> -->
                        <div class="mt-4 sidebar_footer_div">
                            <span class="side_footer_mln_text">Manalot Leadership Network</span>
                            <ul class="list-unstyled d-flex align-items-center justify-content-center flex-wrap sidebar_footer_quick_links">
                                <li class="list-group-item">
                                    <a href="#" class="text-decoration-none inherit">
                                        About Us
                                    </a>
                                </li>
                                <!-- <li class="list-group-item">|</li> -->
                                <li class="list-group-item">
                                    <a href="#" class="text-decoration-none inherit">FAQs</a>
                                </li>
                                <!-- <li class="list-group-item">|</li> -->
                                <li class="list-group-item">
                                    <a href="#" class="text-decoration-none inherit">
                                        Help Center
                                    </a>
                                </li>
                                <!-- <li class="list-group-item">|</li> -->
                                <li class="list-group-item">
                                    <a href="#" class="text-decoration-none inherit">
                                        Contact Us
                                    </a>
                                </li>
                                <!-- <li class="list-group-item">|</li> -->
                                <li class="list-group-item">
                                    <a href="#" class="text-decoration-none inherit">Privacy & Terms</a>
                                </li>                            
                            </ul>
                        </div>
                        <div class="language_translator">
                            <img class="icon_language" src="/assets/images/footer_english_filter.svg">
                           
                        </div>
                        <strong class="text-center maple_footer_text">Maple Consulting & Services &copy; 2021</strong>
                        <div class="py-5 my-5 d-md-block d-none"></div>
                        
                    </aside>
                </div>
                
                <div class="col-md-6 mt-4 order-md-2 order-1 middle_post_parent_div width_60">
                    <main>
                        {{-- @if(auth()->user()->role_id == 1)
                            <form class="post_form">
                                <div>
                                    <img src="/assets/images/s-logo.png" alt="" />
                                </div>
                                <div class="w-100">
                                    <div class="input">
                                        <input type="text" placeholder="Share something...." />
                                        <img src="/assets/images/emoji.png" alt="" class="emoji" />
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-3">
                                        <div class="media">
                                            <button>
                                                <img src="/assets/images/image.png" alt="" />
                                                <span>Image</span>
                                            </button>
                                            <button>
                                                <img src="/assets/images/video.png" alt="" />
                                                <span>Video</span>
                                            </button>
                                            <button>
                                                <img src="/assets/images/poll.png" alt="" />
                                                <span>Poll</span>
                                            </button>
                                        </div>
                                        <div class="purple_btn ">
                                            <button class="google_btn">Add Post</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif --}}

                        @if(auth()->user()->role_id == 1)
                            <div class="search_bar_new">
                                <div class="input_search">
                                    <input type="text" class="ai_search_bar" placeholder="Start a post, Try writing with AI ">
                                    <button type="button" class="ai_search_btn " data-bs-toggle="modal" data-bs-target="#postmodal">Post</button>
                                </div>
                            </div>
                        @endif

                        <div id="postContainer">
                            @include('frontend.component.post_list')
                        </div>

                        <div id="loading" style="display: none; text-align: center;">
                            <img src="/assets/images/loading.gif" alt="Loading...">
                        </div>
                        
                        <!-- <div class="post mt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="/assets/images/s-logo.png" alt="" />
                                    <div>
                                        <p class="mb-0">Manalot</p>
                                        <p class="text-xs" style="color: #b4b4b4">
                                            12 Minutes ago
                                        </p>
                                    </div>
                                </div>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </div>
                            <div>
                                <p class="post_content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                    do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua.
                                </p>
                                <img src="/assets/images/post.jpg" class="w-100" alt="" />
                                <div class="d-flex align-items-center justify-content-between mt-3 like_comnts_n_events">
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
                                </div>
                                <div class="d-flex align-items-center gap-3 mt-4">
                                    <img src="/assets/images/s-logo.png" alt="" />
                                    <input type="text" class="comment_input" placeholder="Write your comment" />
                                </div>
                            </div>
                        </div> -->
                    </main>
                </div>

                <div class="col-md-3 mt-4 pb-md-5 order-md-3 order-2 left_sidebar_parent_div width_20">
                    <aside class="left_sidebar">
                        {{-- <div class="profile">
                            <img class="img-fluid" src="/assets/images/bg-avatar.jpg" alt="" />
                            <img src="/assets/images/avatar.jpg" alt="" class="avatar" />
                            <p class="username mb-0">Manalot</p>
                            <p class="role text-xs mb-5">Admin</p>
                            <a href="{{ route('user.edit-profile') }}"><button class="purple_btn">Edit Profile</button></a>
                        </div> --}}

                        <div class="activity helvetica_font">
                            <div class="d-flex flex-column mb-md-3 mb-2">
                                <strong class="text-lg">Trending Now</strong>
                                <span class="curated text-sm">Curated by Manalot</span>
                            </div>
                            <ul class="list-unstyled d-flex flex-column gap-0">
                                <li class="d-flex align-items-center gap-0">
                                    <!-- <img src="/assets/images/newss1.png" alt="" /> -->
                                    <p class="d-flex flex-column ">
                                        <a class="trending_link" href="">
                                            Green Skills Report
                                        </a>
                                        <span class="text-xs">10 min ago&nbsp;&nbsp;
                                            <a class="watched" href=""><i class="fa fa-eye"></i>&nbsp;&nbsp; 4,532</a>
                                        </span>
                                    </p>
                                </li>                                    
                                
                                <li class="d-flex align-items-center gap-0">
                                    <!-- <img src="/assets/images/newss1.png" alt="" /> -->
                                    <p class="d-flex flex-column ">
                                        <a class="trending_link" href="">
                                            Green Skills Report
                                        </a>
                                        <span class="text-xs">10 min ago&nbsp;&nbsp;
                                            <a class="watched" href=""><i class="fa fa-eye"></i>&nbsp;&nbsp; 4,532</a>
                                        </span>
                                    </p>
                                </li>   
                                
                                <li class="d-flex align-items-center gap-0">
                                    <!-- <img src="/assets/images/newss1.png" alt="" /> -->
                                    <p class="d-flex flex-column ">
                                        <a class="trending_link" href="">
                                            Green Skills Report
                                        </a>
                                        <span class="text-xs">10 min ago&nbsp;&nbsp;
                                            <a class="watched" href=""><i class="fa fa-eye"></i>&nbsp;&nbsp; 4,532</a>
                                        </span>
                                    </p>
                                </li>   
                                
                                <li class="d-flex align-items-center gap-0">
                                    <!-- <img src="/assets/images/newss1.png" alt="" /> -->
                                    <p class="d-flex flex-column ">
                                        <a class="trending_link" href="">
                                            Green Skills Report
                                        </a>
                                        <span class="text-xs">10 min ago&nbsp;&nbsp;
                                            <a class="watched" href=""><i class="fa fa-eye"></i>&nbsp;&nbsp; 4,532</a>
                                        </span>
                                    </p>
                                </li>   
                                
                                <li class="d-flex align-items-center gap-0">
                                    <!-- <img src="/assets/images/newss1.png" alt="" /> -->
                                    <p class="d-flex flex-column ">
                                        <a class="trending_link" href="">
                                            Green Skills Report
                                        </a>
                                        <span class="text-xs">10 min ago&nbsp;&nbsp;
                                            <a class="watched" href=""><i class="fa fa-eye"></i>&nbsp;&nbsp; 4,532</a>
                                        </span>
                                    </p>
                                </li>   
                            </ul>
                        </div>

                        {{--@if(auth()->user()->role_id == 1)
                            <div class="candidates mt-4">
                                <p class="text-lg">Candidates</p>
                                <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                                    <li>
                                        <img src="/assets/images/candinet1.png" alt="" />
                                        <span>Samantha David</span>
                                    </li>
                                    <li>
                                        <img src="/assets/images/candinet2.png" alt="" />
                                        <span>John Deo</span>
                                    </li>
                                    <li>
                                        <img src="/assets/images/candinet3.png" alt="" />
                                        <span>Harry Maguire</span>
                                    </li>
                                    <li>
                                        <img src="/assets/images/candinet4.png" alt="" />
                                        <span>Harry Maguire</span>
                                    </li>
                                    <li class="justify-content-end">
                                        <a href="" class="text-light fs-7 float-end">View more</a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                        --}}

                        <div class="saved_items_main_div activity helvetica_font">
                            <a href="{{ url(route('index')) }}?savepost=true" class="d-flex gap-3">
                                <img src="/assets/images/saved_icon.svg" alt="icon" class="icon">
                                <strong class="text-sm">Saved items</strong>
                            </a>

                            <a href="" class="d-flex gap-3">
                                <img src="/assets/images/group_icon.svg" alt="icon" class="icon">
                                <strong class="text-sm">Groups</strong>
                            </a>

                            <a href="" class="d-flex gap-3">
                                <img src="/assets/images/letter_icon.svg" alt="icon" class="icon">
                                <strong class="text-sm">Newsletters</strong>
                            </a>

                            <a href="" class="d-flex gap-3">
                                <img src="/assets/images/update_icon.svg" alt="icon" class="icon">
                                <strong class="text-sm">Updates</strong>
                            </a>

                        </div>

                        <!-- <div class="text-center pt-3">
                            <span class="home_copyight">Manalot Corporation © 2021</span>
                        </div> -->
                        <div class="py-5 my-5 d-md-block d-none"></div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@include('frontend.component.post_modal_popup')

@endsection

@section("page.scripts")

<script>
    let page = 1;
    let loading = false; // Prevent multiple AJAX calls
    let allPostsLoaded = false; // Flag to check if all posts are loaded

    window.onscroll = function () {
        if (
            !loading &&
            !allPostsLoaded &&
            window.innerHeight + window.scrollY >= document.body.offsetHeight
        ) {
            loadMorePosts();
        }
    };

    function loadMorePosts() {
        if (loading) return; // Prevent concurrent requests
        loading = true;
        page++;
        // const url = `{{ url(route('posts.fetch')) }}?page=${page}&savepost=true`;
        const loadingIndicator = document.getElementById('loading');
        loadingIndicator.style.display = 'block';


        // Check if the current URL contains ?savepost=true
        const urlParams = new URLSearchParams(window.location.search);
        const isSavePost = urlParams.get('savepost') === 'true';
        const isTagPost = urlParams.get('tag');
        const isSearchPost = urlParams.get('search');

        console.log(isSearchPost);

        // Construct the URL with or without savepost=true
        let url = `{{ url(route('posts.fetch')) }}?page=${page}`;
        if (isSavePost) {
            url += '&savepost=true';
        }

        if (isTagPost) {
            url += `&tag=${isTagPost}`;
        }

        if (isSearchPost) {
            url += `&search=${encodeURIComponent(isSearchPost)}`; // Encode special characters
            console.log('Constructed URL:', url);
        }

        setTimeout(() => {
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
                .then((response) => {
                    if (response.status === 204) {
                        // No more posts
                        allPostsLoaded = true;
                        loadingIndicator.innerHTML = '<p>No more posts available.</p>';
                        return '';
                    }
                    return response.json();
                })
                .then((data) => {
                    if (data.html) {
                        document.getElementById('postContainer').innerHTML += data.html;
                    }
                    loading = false; // Allow further requests
                    loadingIndicator.style.display = 'none';
                })
                .catch((error) => {
                    console.error('Error loading posts:', error);
                    loading = false;
                    loadingIndicator.style.display = 'none';
                });
        }, 1000); // Delay of 5 seconds
    }
</script>

@endsection

