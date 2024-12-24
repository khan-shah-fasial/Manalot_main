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

   .notification_page .right_sidebar {
    width: 300px;
}

.notification_page .left_sidebar {
    width: 300px;
}
.notification_page .width_20 {
    width: 25% !important;
}
.notification_page .activity .trending_link {
    font-size: 14px;
}

.notification_page .width_60 {
    width: 50% !important;
}

.notification_page .activity ul li img {
    width: 20px;
    height: 27px;
    border-radius: 100%;
}

.notification_tabs_box .nav-link {
    display: block;
    padding: .5rem 1rem;
    color: #0d6efd;
    text-decoration: none;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
    border: none;
    color: #545454 !important;
    border-radius: 40px;
    font-size: 15px;
    background: #E7ECEF !important;
    font-weight: 400;
    padding: 4px 10px 5px 10px;
    line-height: 24px;
    text-align: center;
    border-radius: 50px !important;
    width:120px;
}

.notification_tabs_box .nav-tabs .nav-link.active {
    color: white !important;
    background: linear-gradient(34.89deg, #4B2779 8%, #BE2475 83.76%) !important;
    font-weight: 400;
}
.notification_tabs_box button {
    margin-right: 20px;
}
.notification_tabs_box div#nav-tab {
    background: #fff;
    padding: 25px 35px;
    border-radius: 50px;
}

.notify_box {
    background: #fff;
    padding: 25px 35px;
    border-radius: 100px;
    margin-top: 20px;
}

.notify_box p {
    font-size: 14px;
    line-height: 19px;
}
.notify_box p b{
 font-weight:800;
}

.userimg img
{
    width:100%;
    border-radius:50px;
}

.notify_content p {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>

    <section class="pb-5 mt80 notification_page" style="background-color: #e7ecef">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-md-3 mt-4 pb-md-5 pb-3 order-md-1 order-3 right_sidebar_parent_div width_20">
                    <aside class="right_sidebar">
                        
                            <div class="activity helvetica_font">
                                <div class="d-flex flex-column mb-md-3 mb-2">
                                    <strong class="text-lg">Current Job Opening</strong>
                                    <span class="curated text-sm">Curated by Manalot</span>
                                </div>
                                <ul class="list-unstyled d-flex flex-column gap-0">
                                    <li class="mb-4">
                                        <div class="row">
                                            <div class="col-md-10 pr-0">
                                                <a class="trending_link" href="">
                                                    Director of Information 
                                                 </a>
                                            </div>

                                            <div class="col-md-2">
                                                <a class="saved_clip" href="">
                                                    <img class="saved_clip_img" src="/assets/images/active_iconcart.svg">
                                                </a>
                                            </div>
                                        </div>
                                    </li>                                    
                                    
                                    <li class="mb-4">
                                        <div class="row">
                                            <div class="col-md-10 pr-0">
                                                <a class="trending_link" href="">
                                                    Head (Legal and Compliance)
                                                 </a>
                                            </div>

                                            <div class="col-md-2">
                                                <a class="saved_clip" href="">
                                                    <img class="saved_clip_img" src="/assets/images/inactive_iconcart.svg">
                                                </a>
                                            </div>
                                        </div>
                                    </li> 
                                    
                                     <li class="mb-4">
                                        <div class="row">
                                            <div class="col-md-10 pr-0">
                                                <a class="trending_link" href="">
                                                   Chief Executive Officer
                                                 </a>
                                            </div>

                                            <div class="col-md-2">
                                                <a class="saved_clip" href="">
                                                    <img class="saved_clip_img" src="/assets/images/inactive_iconcart.svg">
                                                </a>
                                            </div>
                                        </div>
                                    </li>    
                                    
                                    <li class="mb-4">
                                        <div class="row">
                                            <div class="col-md-10 pr-0">
                                                <a class="trending_link" href="">
                                                    Chief Operating Officer
                                                 </a>
                                            </div>

                                            <div class="col-md-2">
                                                <a class="saved_clip" href="">
                                                    <img class="saved_clip_img" src="/assets/images/inactive_iconcart.svg">
                                                </a>
                                            </div>
                                        </div>
                                    </li>   
                                    
                                     <li>
                                        <div class="row">
                                            <div class="col-md-10 pr-0">
                                                <a class="trending_link" href="">
                                                    VP, IT / Chief Information 
                                                 </a>
                                            </div>

                                            <div class="col-md-2">
                                                <a class="saved_clip" href="">
                                                    <img class="saved_clip_img" src="/assets/images/inactive_iconcart.svg">
                                                </a>
                                            </div>
                                        </div>
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
                            <img class="icon_language" src="/assets/images/footer_english_filter.png">
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <strong class="text-center maple_footer_text">Maple Consulting & Services &copy; 2021</strong>
                        <div class="py-5 my-5 d-md-block d-none"></div>
                        
                    </aside>
                </div>
                
                <div class="col-md-6 mt-4 order-md-2 order-1 middle_post_parent_div width_60">
                    <main>
                       <div class="notification_tabs_box">


                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Jobs</button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">My Posts</button>
                            </div>
                        </nav>


                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                   
                                    <div class="notify_box">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="userimg">
                                                    <img src="/assets/images/user_image1.svg" />
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <div class="notify_content">
                                                    <p>Trending post from <b>LinkedIn News India</b> Anupam Mittal, founder at Shaadi.com, says that he believes in having long-term confidence and short-term pessimism. This means that even though he is....</p>
                                                </div>
                                                <div class="d-flex gap-4">
                                                    <p class="pb-0 mb-0">132 Reactions</p>
                                                    <p class="pb-0 mb-0">30 Comments</p>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <p class="pb-0 mb-0 pt-4">2h</p>
                                                <div>
                                                    <img src="/assets/images/dots_icons1.svg"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="notify_box">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="userimg">
                                                    <img src="/assets/images/user_image1.svg" />
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <div class="notify_content">
                                                    <p>Trending post from <b>LinkedIn News India</b> Anupam Mittal, founder at Shaadi.com, says that he believes in having long-term confidence and short-term pessimism. This means that even though he is....</p>
                                                </div>
                                                <div class="d-flex gap-4">
                                                    <p class="pb-0 mb-0">132 Reactions</p>
                                                    <p class="pb-0 mb-0">30 Comments</p>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <p class="pb-0 mb-0 pt-4">2h</p>
                                                <div>
                                                    <img src="/assets/images/dots_icons1.svg"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="notify_box">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="userimg">
                                                    <img src="/assets/images/user_image1.svg" />
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <div class="notify_content">
                                                    <p>Trending post from <b>LinkedIn News India</b> Anupam Mittal, founder at Shaadi.com, says that he believes in having long-term confidence and short-term pessimism. This means that even though he is....</p>
                                                </div>
                                                <div class="d-flex gap-4">
                                                    <p class="pb-0 mb-0">132 Reactions</p>
                                                    <p class="pb-0 mb-0">30 Comments</p>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <p class="pb-0 mb-0 pt-4">2h</p>
                                                <div>
                                                    <img src="/assets/images/dots_icons1.svg"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="notify_box">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="userimg">
                                                    <img src="/assets/images/user_image1.svg" />
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <div class="notify_content">
                                                    <p>Trending post from <b>LinkedIn News India</b> Anupam Mittal, founder at Shaadi.com, says that he believes in having long-term confidence and short-term pessimism. This means that even though he is....</p>
                                                </div>
                                                <div class="d-flex gap-4">
                                                    <p class="pb-0 mb-0">132 Reactions</p>
                                                    <p class="pb-0 mb-0">30 Comments</p>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <p class="pb-0 mb-0 pt-4">2h</p>
                                                <div>
                                                    <img src="/assets/images/dots_icons1.svg"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="notify_box">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="userimg">
                                                    <img src="/assets/images/user_image1.svg" />
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <div class="notify_content">
                                                    <p>Trending post from <b>LinkedIn News India</b> Anupam Mittal, founder at Shaadi.com, says that he believes in having long-term confidence and short-term pessimism. This means that even though he is....</p>
                                                </div>
                                                <div class="d-flex gap-4">
                                                    <p class="pb-0 mb-0">132 Reactions</p>
                                                    <p class="pb-0 mb-0">30 Comments</p>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <p class="pb-0 mb-0 pt-4">2h</p>
                                                <div>
                                                    <img src="/assets/images/dots_icons1.svg"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="notify_box">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="userimg">
                                                    <img src="/assets/images/user_image1.svg" />
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <div class="notify_content">
                                                    <p>Trending post from <b>LinkedIn News India</b> Anupam Mittal, founder at Shaadi.com, says that he believes in having long-term confidence and short-term pessimism. This means that even though he is....</p>
                                                </div>
                                                <div class="d-flex gap-4">
                                                    <p class="pb-0 mb-0">132 Reactions</p>
                                                    <p class="pb-0 mb-0">30 Comments</p>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <p class="pb-0 mb-0 pt-4">2h</p>
                                                <div>
                                                    <img src="/assets/images/dots_icons1.svg"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Profile</div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Contact</div>
                            </div>


                       </div>
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
                                <strong class="text-lg">Current Job Opening</strong>
                                <span class="curated text-sm">Curated by Manalot</span>
                            </div>
                            <ul class="list-unstyled d-flex flex-column gap-0">
                               <li class="mb-4">
                                        <div class="row">
                                            <div class="col-md-10 pr-0">
                                                <a class="trending_link" href="">
                                                    Director of Information 
                                                 </a>
                                            </div>

                                            <div class="col-md-2">
                                                <a class="saved_clip" href="">
                                                    <img class="saved_clip_img" src="/assets/images/active_iconcart.svg">
                                                </a>
                                            </div>
                                        </div>
                                    </li>                                    
                                    
                                    <li class="mb-4">
                                        <div class="row">
                                            <div class="col-md-10 pr-0">
                                                <a class="trending_link" href="">
                                                    Head (Legal and Compliance)
                                                 </a>
                                            </div>

                                            <div class="col-md-2">
                                                <a class="saved_clip" href="">
                                                    <img class="saved_clip_img" src="/assets/images/inactive_iconcart.svg">
                                                </a>
                                            </div>
                                        </div>
                                    </li> 
                                    
                                     <li class="mb-4">
                                        <div class="row">
                                            <div class="col-md-10 pr-0">
                                                <a class="trending_link" href="">
                                                   Chief Executive Officer
                                                 </a>
                                            </div>

                                            <div class="col-md-2">
                                                <a class="saved_clip" href="">
                                                    <img class="saved_clip_img" src="/assets/images/inactive_iconcart.svg">
                                                </a>
                                            </div>
                                        </div>
                                    </li>    
                                    
                                    <li class="mb-4">
                                        <div class="row">
                                            <div class="col-md-10 pr-0">
                                                <a class="trending_link" href="">
                                                    Chief Operating Officer
                                                 </a>
                                            </div>

                                            <div class="col-md-2">
                                                <a class="saved_clip" href="">
                                                    <img class="saved_clip_img" src="/assets/images/inactive_iconcart.svg">
                                                </a>
                                            </div>
                                        </div>
                                    </li>   
                                    
                                     <li>
                                        <div class="row">
                                            <div class="col-md-10 pr-0">
                                                <a class="trending_link" href="">
                                                    VP, IT / Chief Information 
                                                 </a>
                                            </div>

                                            <div class="col-md-2">
                                                <a class="saved_clip" href="">
                                                    <img class="saved_clip_img" src="/assets/images/inactive_iconcart.svg">
                                                </a>
                                            </div>
                                        </div>
                                    </li>   
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection
