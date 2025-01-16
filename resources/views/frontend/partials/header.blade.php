@if(auth()->user())

    @php


        $user_profile = Cache::remember('user_profile_' . auth()->user()->id, 600, function () {
            return DB::table('userdetails')
                ->where('user_id', auth()->user()->id)
                ->value('profile_photo');
        });

    @endphp

    <div class="header user_header helvetica_font">
        <div class="container-lg container-fluid">
            <header class="d-flex align-items-center justify-content-between">
                <div class="d-flex gap-lg-4 gap-md-2">
                    <a href="/">
                        <img class="user_header_logo" src="/assets/images/favicon2.png" alt="" />
                    </a>
                    <form class="search_input d-flex align-items-center mb-0" id="searchForm">
                        <button>
                            <i class="fa fa-search"></i>
                        </button>
                        <input type="text" id="searchInput" placeholder="Search" />
                    </form>
                </div>
                <div class="d-flex justify-content-end align-items-center user_header_right">
                    <a href="/" class="d-lg-block d-none text-center align-items-center text-decoration-none inherit text-dark text-xs notification_button">
                        <div>
                            <img src="/assets/images/home_icon3.svg" alt="home icon" />
                        </div>
                        <span>Home</span>
                    </a>
                    <a href="/" class="d-lg-block d-none text-center align-items-center text-decoration-none text-dark text-xs">
                        <div>
                            <img src="/assets/images/people_icon3.svg" alt="people icon" />
                        </div>
                        <span>My Network</span>
                    </a>
                    <a href="/" class="d-lg-block d-none text-center align-items-center text-decoration-none text-dark text-xs">
                        <div>
                            <img src="/assets/images/suitcase_icon3.svg" alt="suitcase icon" />
                        </div>
                        <span>Jobs</span>
                    </a>
                    <a href="/" class="d-lg-block d-none text-center align-items-center text-decoration-none text-dark text-xs">
                        <div>
                            <img src="/assets/images/chats_icon3.svg" alt="message icon" />
                        </div>
                        <span>Messages</span>
                    </a>
                    <a href="/notification" class="text-center align-items-center text-decoration-none inherit text-dark text-xs notification_button">
                        <div>
                            <img src="/assets/images/notification_icon3.svg" alt="Notification icon" />
                        </div>
                        <span class="d-lg-block d-none">Notification</span>
                    </a>
                    
					
					<a href="#" class="d-lg-block d-none text-center align-items-center text-decoration-none inherit text-dark text-xs notification_button">
                        <div>
                            <img src="/assets/images/crown_icon3.svg" alt="Notification icon" />
                        </div>
                        <span>Manalotians</span>
                    </a>
                    <div class="header_drishti">
						<img class="three_dots" src="/assets/images/three_dots.svg"  id="dropdownTrigger">
                        <img class="header_drishti_img" src="{{ $user_profile ? asset('storage/' . $user_profile) : '/assets/images/drishti_img2.png' }}" alt="user image">
                        
                        <div class="logout dropdown-content" id="dropdownContent">
                            <div class="view_profile_child_1">
                                <div class="d-flex align-items-center gap-2">
                                    <img class="user_img" src="/assets/images/drishti_img.png" alt="user_img">
                                    <div class="user_name_post">
                                        <strong class="mb-0 user_name proxima_nova_font">Drishti Jadhav</strong>
                                        <p class="text-xs mb-0" style="color: #535353">
                                            UI/UX Designer
                                        </p>
                                    </div>
                                </div>
                                <a class="view_profile_btn" href="{{route('user.edit-profile')}}">Edit Profile</a>
                                <a class="view_profile_btn" href="{{route('user.view-profile')}}">View Profile</a>
                                {{-- <a class="view_profile_btn" href="{{route('sample_profile')}}">View Profile</a> --}}
                                <a href="" class="view_profile_quick_menu">Setting & Privacy</a>
                                <a href="" class="view_profile_quick_menu">Help</a>
                                <a href="" class="view_profile_quick_menu">Language</a>
                            </div>
                            <a href="{{ url(route('customer.logout')) }}" class="logout">Sign Out</a>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </div>



     <div class="header user_header helvetica_font d-md-none footer_fiexd_action">
        <div class="container-lg container-fluid">
            <header class="">
               
                <div class="d-flex justify-content-between align-items-center user_header_right">
                    <a href="/" class="text-center align-items-center text-decoration-none inherit text-dark text-xs notification_button">
                        <div>
                            <img src="/assets/images/home_icon3.svg" alt="home icon" />
                        </div>
                        <span>Home</span>
                    </a>
                    <a href="/" class="text-center align-items-center text-decoration-none text-dark text-xs">
                        <div>
                            <img src="/assets/images/people_icon3.svg" alt="people icon" />
                        </div>
                        <span> Network</span>
                    </a>

                    
                    <a href="/" class="text-center align-items-center text-decoration-none text-dark text-xs ">
                        <div>
                            <img src="/assets/images/suitcase_icon3.svg" alt="suitcase icon" />
                        </div>
                        <span>Jobs</span>
                    </a>
                    <a href="/" class="text-center align-items-center text-decoration-none text-dark text-xs">
                        <div>
                            <img src="/assets/images/chats_icon3.svg" alt="message icon" />
                        </div>
                        <span>Messages</span>
                    </a>
                  
                    
					
					<a href="#" class="text-center align-items-center text-decoration-none inherit text-dark text-xs notification_button">
                        <div>
                            <img src="/assets/images/crown_icon3.svg" alt="Notification icon" />
                        </div>
                        <span>Manalotians</span>
                    </a>
                    
                </div>
            </header>
        </div>
    </div>
    @section("search.scripts")

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const urlParams = new URLSearchParams(window.location.search);
                const searchValue = urlParams.get('search');

                if (searchValue) {
                    const searchInput = document.getElementById('searchInput');
                    if (searchInput) {
                        searchInput.value = searchValue;
                    }
                }
            });

            document.getElementById('searchForm').addEventListener('submit', function (event) {
                event.preventDefault();

                const searchInput = document.getElementById('searchInput').value.trim();
                if (searchInput) {
                    const currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.set('search', searchInput);
                    window.location.href = currentUrl.toString();
                }
            });
        </script>

    @endsection

@endif
