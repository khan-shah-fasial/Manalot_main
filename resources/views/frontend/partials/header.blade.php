@if(auth()->user()) 
    <div class="header user_header d-md-block d-none helvetica_font">
        <div class="container">
            <header class="d-flex align-items-center">
                <div class="col-lg-6 d-flex gap-lg-4 gap-md-2">
                    <a href="/">
                        <img class="user_header_logo" src="/assets/images/favicon2.png" alt="" />
                    </a>
                    <form class="search_input d-flex align-items-center mb-0">
                        <input type="text" placeholder="Search" />
                        <button>
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="col-lg-6 d-flex justify-content-end align-items-center user_header_right">
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="d-flex flex-column gap-1 align-items-center text-decoration-none inherit text-dark text-xs notification_button">
                        <div>
                            <img src="/assets/images/home_icon.png" alt="home icon" />
                        </div>
                        <span>Home</span>
                    </a>
                    <a href="{{ url(route('about-us')) }}" class="d-flex flex-column gap-1 align-items-center text-decoration-none text-dark text-xs">
                        <div>
                            <img src="/assets/images/people_icon.png" alt="people icon" />
                        </div>
                        <span>My Network</span>
                    </a>
                    <a href="" class="d-flex flex-column gap-1 align-items-center text-decoration-none text-dark text-xs">
                        <div>
                            <img src="/assets/images/suitcase_icon2.png" alt="suitcase icon" />
                        </div>
                        <span>Jobs</span>
                    </a>
                    <a href="{{ url(route('help-center')) }}" class="d-flex flex-column gap-1 align-items-center text-decoration-none text-dark text-xs">
                        <div>
                            <img src="/assets/images/chats_icon.png" alt="message icon" />
                        </div>
                        <span>Messages</span>
                    </a>
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="d-flex flex-column gap-1 align-items-center text-decoration-none inherit text-dark text-xs notification_button">
                        <div>
                            <img src="/assets/images/notification_icon.png" alt="Notification icon" />
                        </div>
                        <span>Notification</span>
                    </a>
                    <div class="notification_box" style="display:none">
                        <div class="notification_modal">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex gap-2 align-items-center">
                                    <h3 class="mb-0 notifty_hed">Notification</h3>
                                    <p class="mb-0 count_label">3</p>
                                </div>
                                <p class="mb-0 mark_read">Mark all as read</p>
                            </div>
                            <div class='mt-4 d-flex flex-column gap-2'>
                                <div class="item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="/assets/images/candinet1.png" alt="" />
                                        <div>
                                            <p class="mb-0">
                                                <span class="username"> Manalot </span>
                                                <span class="text-xs">Reacted on your Comment</span>
                                            </p>
                                            <p class="mb-0 text-xs">5m Ago</p>
                                        </div>
                                    </div>
                                    <p class="dot"></p>
                                </div>
                                <div class="item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="/assets/images/candinet1.png" alt="" />
                                        <div>
                                            <p class="mb-0">
                                                <span class="username"> Manalot </span>
                                                <span class="text-xs">Reacted on your Comment</span>
                                            </p>
                                            <p class="mb-0 text-xs">5m Ago</p>
                                        </div>
                                    </div>
                                    <p class="dot"></p>
                                </div>
                                <div class="item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="/assets/images/candinet1.png" alt="" />
                                        <div>
                                            <p class="mb-0">
                                                <span class="username"> Manalot </span>
                                                <span class="text-xs">Reacted on your Comment</span>
                                            </p>
                                            <p class="mb-0 text-xs">5m Ago</p>
                                        </div>
                                    </div>
                                    <p class="dot"></p>
                                </div>
                                <div class="item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="/assets/images/candinet1.png" alt="" />
                                        <div>
                                            <p class="mb-0">
                                                <span class="username"> Manalot </span>
                                                <span class="text-xs">Reacted on your Comment</span>
                                            </p>
                                            <p class="mb-0 text-xs">5m Ago</p>
                                        </div>
                                    </div>
                                    <p class="dot"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header_drishti">
                        <img class="header_drishti_img" src="/assets/images/drishti_img2.png" alt="user image" id="dropdownTrigger">
                        <div class="logout dropdown-content" id="dropdownContent">
                            <a href="" class="view_profile">View Profile</a>
                            <a href="{{ url(route('customer.logout')) }}" class="logout">Logout</a>
                        </div>
                    </div>

                </div>
            </header>
        </div>
    </div> 

    <div class="header user_header user_header_mobile d-md-none d-block helvetica_font">
        <div class="container-fluid px-0">
            <header class="d-flex align-items-center">
                <div class="col-md-6 col-4 d-flex gap-1 logo_search_div">
                    <a href="/">
                        <img class="user_header_logo" src="/assets/images/favicon2.png" alt="" />
                    </a>
                    <form class="search_input d-flex align-items-center mb-0">
                        <div class="mobile_search_input" style="display: none;">
                            <div class="d-flex">
                                <button class="close">X</button>
                                <input type="text" placeholder="Search" />
                                <button type="submit" class="searched">
                                    <i class="fa fa-search"></i> 
                                </button>
                            </div>
                        </div>
                        <button class="mobile_search_btn">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-6 col-8 d-flex justify-content-end align-items-center user_header_right">
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="d-flex flex-column gap-1 align-items-center text-decoration-none inherit text-dark text-xs notification_button">
                        <div>
                            <img src="/assets/images/home_icon.png" alt="home icon" />
                        </div>
                    </a>
                    <a href="{{ url(route('about-us')) }}" class="d-flex flex-column gap-1 align-items-center text-decoration-none text-dark text-xs">
                        <div>
                            <img src="/assets/images/people_icon.png" alt="people icon" />
                        </div>
                    </a>
                    <a href="" class="d-flex flex-column gap-1 align-items-center text-decoration-none text-dark text-xs">
                        <div>
                            <img src="/assets/images/suitcase_icon2.png" alt="suitcase icon" />
                        </div>
                    </a>
                    <a href="{{ url(route('help-center')) }}" class="d-flex flex-column gap-1 align-items-center text-decoration-none text-dark text-xs">
                        <div>
                            <img src="/assets/images/chats_icon.png" alt="message icon" />
                        </div>
                    </a>
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="d-flex flex-column gap-1 align-items-center text-decoration-none inherit text-dark text-xs notification_button">
                        <div>
                            <img src="/assets/images/notification_icon.png" alt="Notification icon" />
                        </div>
                    </a>
                    <div class="notification_box" style="display:none">
                        <div class="notification_modal">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex gap-2 align-items-center">
                                    <h3 class="mb-0 notifty_hed">Notification</h3>
                                    <p class="mb-0 count_label">3</p>
                                </div>
                                <p class="mb-0 mark_read">Mark all as read</p>
                            </div>
                            <div class='mt-4 d-flex flex-column gap-2'>
                                <div class="item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="/assets/images/candinet1.png" alt="" />
                                        <div>
                                            <p class="mb-0">
                                                <span class="username"> Manalot </span>
                                                <span class="text-xs">Reacted on your Comment</span>
                                            </p>
                                            <p class="mb-0 text-xs">5m Ago</p>
                                        </div>
                                    </div>
                                    <p class="dot"></p>
                                </div>
                                <div class="item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="/assets/images/candinet1.png" alt="" />
                                        <div>
                                            <p class="mb-0">
                                                <span class="username"> Manalot </span>
                                                <span class="text-xs">Reacted on your Comment</span>
                                            </p>
                                            <p class="mb-0 text-xs">5m Ago</p>
                                        </div>
                                    </div>
                                    <p class="dot"></p>
                                </div>
                                <div class="item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="/assets/images/candinet1.png" alt="" />
                                        <div>
                                            <p class="mb-0">
                                                <span class="username"> Manalot </span>
                                                <span class="text-xs">Reacted on your Comment</span>
                                            </p>
                                            <p class="mb-0 text-xs">5m Ago</p>
                                        </div>
                                    </div>
                                    <p class="dot"></p>
                                </div>
                                <div class="item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="/assets/images/candinet1.png" alt="" />
                                        <div>
                                            <p class="mb-0">
                                                <span class="username"> Manalot </span>
                                                <span class="text-xs">Reacted on your Comment</span>
                                            </p>
                                            <p class="mb-0 text-xs">5m Ago</p>
                                        </div>
                                    </div>
                                    <p class="dot"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </div> 
@endif