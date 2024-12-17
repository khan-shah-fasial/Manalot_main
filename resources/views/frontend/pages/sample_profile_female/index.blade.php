@extends('frontend.layouts.app')

@section('page.title', 'Manalot')

@section('page.description', 'Manalot')

@section('page.type', 'website')

@section('page.content')

<style>
	body {
		background-color: #e7ecef !important;
	}
	.profile-page a:hover {
		color: #535353;
	} 
</style>


<div class="profile-page pb-5 proxima_nova_font ">
<div class="container">

<!-- <div class="top-section">
	<div class="row align-items-center">
		<div class="col-md-6">
			<a href="/login"><img src="http://127.0.0.1:8000/assets/images/namalot_logo.png"></a>
		</div>

		<div class="col-md-6">
			<div class="blue_btn text-end">
			<a  href="/login" class="text-decoration-none text-white">Continue to Login</a>
			</div>
		</div>


	</div>
</div> -->

	<div class="header user_header d-md-block d-none helvetica_font">
        <div class="container">
            <header class="d-flex align-items-center justify-content-between">
                <div class="d-flex gap-lg-4 gap-md-2">
					<a href="/" style="pointer-events: none;">
                        <img class="user_header_logo" src="/assets/images/favicon2.png" alt="">
                    </a>
                    <form class="search_input d-flex align-items-center mb-0">
                        <button>
                            <i class="fa fa-search"></i>
                        </button>
                        <input type="text" placeholder="Search" />
                    </form>
                </div>
                <div class="d-flex justify-content-end align-items-center user_header_right">
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="d-flex flex-column gap-1 align-items-center text-decoration-none inherit text-dark text-xs notification_button">
                        <div>
                            <img src="/assets/images/home_icon2.png" alt="home icon" />
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
					<a href="#" data-toggle="modal" data-target="#exampleModal" class="d-flex flex-column gap-1 align-items-center text-decoration-none inherit text-dark text-xs notification_button">
                        <div>
                            <img src="/assets/images/crown_icon.png" alt="Notification icon" />
                        </div>
                        <span>Manalotians</span>
                    </a>
                    <div class="header_drishti">
						<img class="three_dots" src="/assets/images/three_dots.svg"  id="dropdownTrigger">
                        <img class="header_drishti_img" src="/assets/images/anil_rajkundra.png" alt="user image">
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
            <header class="d-flex align-items-center justify-content-between">
                <div class="d-flex gap-1 logo_search_div">
                    <a href="/">
                        <img class="user_header_logo" src="/assets/images/favicon2.png" alt="" />
                    </a>
                    <form class="search_input d-flex align-items-center mb-0">
                        <div class="mobile_search_input" style="display: none;">
                            <div class="d-flex">
                                <button class="close">X</button>
                                <button type="submit" class="searched">
                                    <i class="fa fa-search"></i> 
                                </button>
                                <input type="text" placeholder="Search" />
                            </div>
                        </div>
                        <button class="mobile_search_btn">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="d-flex justify-content-end align-items-center user_header_right">
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="d-flex flex-column gap-1 align-items-center text-decoration-none inherit text-dark text-xs notification_button">
                        <div>
                            <img src="/assets/images/home_icon2.png" alt="home icon" />
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



	<div class="image-profile box_shadows">
		<div class="bg-profile-cover">
		   <img class="img-fluid" src="/assets/images/female_intro_bg_img2.png"/>
		</div>

		<div class="bg-profile-content">
			<img class="user_img" src="/assets/images/smita_raikundla.png"/>
			
			<div class="profile_content_main_div">
				<div class="profile-content">
					<h3>Smita Raikundlia <img class="verified" src="/assets/images/verified.svg"> </h3>
					<p>Executive Director/CXO & Leadership Hiring/ Executive Search Professional/ Client Management</p>
					<span>Mumbai, Maharashtra, India.</span>
					<div class="d-flex py-3 pt-4 mt-1 profile_view_btn">
						<div class="purple_btn">
							<a href="" class="profile_btn connect_btn ">
								<i class="fa fa-plus"></i>
								Connect
							</a>
						</div>
						<div class="golden_btn">
							<a href="" class="golden_btn message_btn">
								<img class="telegram_icon" src="/assets/images/paper_clip_icon.svg">
								 <!-- <i class="fa fa-paperclip"></i> -->
								Share Profile
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 d-flex flex-column gap-lg-0 gap-lg-4 gap-2 pe-md-3">
					<div class="profile_manalot_div d-flex align-items-center gap-2 mb-lg-3 mb-1">
						<img class="profile_study_logo" src="/assets/images/favicon3.png">
						<span>Manalot</span>
					</div>
					<div class="mngmnt_school d-flex align-items-center gap-2">
						<img class="school_logo" src="/assets/images/somaya_img.png">
						<span>K.J. Somaiya Institute Of Management Studies and....</span>
					</div>
				</div>
	        </div>
        </div>

		<div class="user-profile-social-links">
			<div class="bg_verified_main">
				<img class="bg_verified_img" src="/assets/images/verified.svg">
				<p class="bg_verified_text">Background Verified with MLN</p>
			</div>
			<div class="bg_verified_main">
				<img class="bg_verified_img" src="/assets/images/search_user.svg">
				<p class="bg_verified_text">Looking for : <span class="bg_verified_bold_text"> MD, CEO</span></p>
			</div>
			<div class="bg_verified_main">
				<img class="bg_verified_img" src="/assets/images/desired.svg">
				<p class="bg_verified_text">Desired Job Location : <span class="bg_verified_bold_text">Mumbai, India </span></p>
			</div>
			<div class="user-social-links">
                <a href="#" class="linkedin">
					<img class="user_social" src="/assets/images/linkedin_img.svg">
				</a>
                <a href="#" class="instagram">
					<img class="user_social" src="/assets/images/instagram_img.svg">
				</a>
                <a href="#" class="twitter">
					<img class="user_social" src="/assets/images/x-twitter_img.svg">
				</a>
                <a href="#" class="facebook">
					<img class="user_social" src="/assets/images/facebook_img.svg">
				</a>
                <a href="#" class="globe">
					<img class="user_social" src="/assets/images/globe_img.svg">
				</a>
            </div>
		</div>
    </div>


	<!-- <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">Personal Information</h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-4">
				<p><strong>Date of Birth: </strong> 04/07/1996</p>
			</div>

			<div class="col-md-4">
				<p><strong>Gender: </strong> Male</p>
			</div>

			<div class="col-md-4">
				<p><strong>Phone: </strong> +91 9892334709</p>
			</div>

			<div class="col-md-4">
				<p><strong>Email: </strong>  graphics@nexgeno.in</p>
			</div>

			<div class="col-md-4">
				<p><strong>Zip/Postal Code: </strong> 400017</p>
			</div>

			<div class="col-md-4">
				<p><strong>City: </strong>  Mumbai</p>
			</div>

			<div class="col-md-4">
				<p><strong>Country: </strong>  India</p>
			</div>

			<div class="col-md-4">
				<p><strong>State: </strong> Maharashtra</p>
			</div>

			<div class="col-md-12">
				<p><strong>Address: </strong>  407, Avighna Park, Malad West, Mumbai, Maharshtra, India,</p>
			</div>
		</div>
	</div> -->

	<!-- <div class="info-section profile-information box_shadows mt-35 padd-40">
        <div class="col-lg-6">
			<div class="about_heading_div">
				<img class="user_icon" src="/assets/images/user_icon.png">
				<h4 class="about_heading">Personal Information</h4>
			</div> 
			<div class="personal_info_div">
				<span class="personal_info"> <i class="fa fa-cake-candles"></i>4th July 1996 </span>
				<div class="d-flex flex-md-row flex-column gap-md-5">
					<span class="personal_info"> 
						<i class="fa fa-phone icon pe-1"></i>
						<a href="tel:+91-9892334709" class="user_number"> +91 9892334709 </a>
					</span>
					<span class="personal_info"> 
						<i class="fa fa-envelope icon"></i>
						<a href="mailto:graphics@nexgeno.in" class="user_email">graphics@nexgeno.in </a>
					</span>
				</div>
				<span class="personal_info"> 
					<i class="fa fa-location-dot icon"></i>407, Avighna Park, Malad West, Mumbai, Maharashtra, India 
				</span>
            </div>
		</div>
        <div class="col-lg-6 ps-lg-4">
			<div class="about_heading_div">
				<img class="user_icon" src="/assets/images/speaker.png">
				<h4 class="about_heading">Social Media Links</h4>
			</div>
            
        </div>
    </div> -->


	<div class="about_main_div profile-information box_shadows mt-35 padd-40">
		<div class="about_heading_div">
			<img class="user_icon" src="/assets/images/user_icon.svg">
			<h4 class="about_heading">About</h4>
		</div>
		<div class="about_para_div">
			<p class="about_para">
                With over 19 years of professional experience in the field of human resources, 
                I possess a natural ability to excel in networking and liaising for global 
                leadership requirements. My expertise extends to identifying the right personnel 
                and leading talent selection projects with astute business acumen.				
			</p>
			<p class="about_para">
                In 2015, I co-founded Manalot (formerly Maple Consultancy & Services) with a compelling 
                vision and unwavering passion to build human capital and create enduring value through 
                Leadership Transformation. Today, our organization is recognized for our unique blend 
                of research and strategic skills, our ability to drive positive change within 
                organizations to enhance business performance, our proactive approach to challenges, 
                and our expertise in cultural transformation and process reorganization.
			
			</p>
			<p class="about_para">
                As an Executive Director, I bring to the forefront my unwavering passion, sense of purpose, 
                and entrepreneurial mindset, all aimed at developing future leadership within our organization and beyond.
			</p>
			<a class="visit_mln" href=""> Visit us at www.manalot.com</a>
		</div>
	 </div>

	<div class="profile-information box_shadows mt-35 padd-40 work_exp">
		<div class="about_heading_div">
			<img class="user_icon" src="/assets/images/suitcase_icon.svg">
			<h4 class="about_heading">Work Experience</h4>
		</div>
		<div class="col-12">
			<div class="d-flex align-items-center">
				<img src="/assets/images/favicon.svg" alt="Manalot Logo">
				<div class="ms-3">
					<h5 class="mb-1">Managing Director</h5>
					<p class="">Manalot . Full time | Nov 2016 - Present · 8 yrs 1 mo | Mumbai, Maharashtra</p>
					<p class="work_exp_details_text">
						As a distinguished leadership advisory and retained executive search firm, 
						Manalot (formerly Maple Consulting & Services) collaborates as a trusted partner-in-change 
						for dynamic organizations and senior leadership worldwide. With a steadfast commitment to 
						building relationships based on trust and agility, <b class="bold_see_more"> …see more</b>
					</p>
					<div class="industry_main_div"> 
						<strong class="industry_main_div_heading">Industry :</strong> 
						<div class="industry_div_list">
							<div class="bg_verified_main">
								<img class="bg_verified_img" src="/assets/images/right_mark.svg">
								<p class="bg_verified_text">Analytics/KPO/Research</p>
							</div>
							<div class="bg_verified_main">
								<img class="bg_verified_img" src="/assets/images/right_mark.svg">
								<p class="bg_verified_text">Analytics/KPO/Research</p>
							</div>
							<div class="bg_verified_main">
								<img class="bg_verified_img" src="/assets/images/right_mark.svg">
								<p class="bg_verified_text">Analytics/KPO/Research</p>
							</div>
							<div class="bg_verified_main">
								<img class="bg_verified_img" src="/assets/images/right_mark.svg">
								<p class="bg_verified_text">Analytics/KPO/Research</p>
							</div>
						</div>
					</div>

					<div class="skills_main_div">
						<strong class="skills_main_div_heading">Skills :</strong>
						<div class="industry_div_list">
							<div class="bg_verified_main">
								<img class="bg_verified_img" src="/assets/images/right_mark.svg">
								<p class="bg_verified_text">Resourceful Professional</p>
							</div>
							<div class="bg_verified_main">
								<img class="bg_verified_img" src="/assets/images/right_mark.svg">
								<p class="bg_verified_text">Talent Management</p>
							</div>
							<div class="bg_verified_main">
								<img class="bg_verified_img" src="/assets/images/right_mark.svg">
								<p class="bg_verified_text">Talent Acquisition</p>
							</div>
							<div class="bg_verified_main">
								<img class="bg_verified_img" src="/assets/images/right_mark.svg">
								<p class="bg_verified_text">Expertise in HR Consulting</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="d-flex align-items-center">
				<img src="/assets/images/talent_acquistion_img.png" alt="SITEL Logo">
				<div class="ms-3">
					<h5 class="mb-1">Manager - HR</h5>
					<p class="mb-0">Busisol Sourcing (I) Pvt.Ltd | Jan 2007 - Jan 2014 · 7 yrs 1 mo</p>
				</div>
			</div>
		</div>
	</div>

    <div class="profile-information box_shadows mt-35 padd-40 education_main_div">
        <!-- Education Section -->
        <div class="about_heading_div">
			<img class="user_icon" src="/assets/images/education_icon.svg">
			<h4 class="about_heading">Education</h4>
		</div>
		<div class="d-flex flex-md-row flex-row flex-column flex-wrap pb-md-4 pb-3">
			<div class="col-md-6 mb-3 pe-md-4">
				<div class="d-flex pb-md-3 align-items-center">
					<img src="/assets/images/somaya_img.png" alt="somaya Logo">
					<div class="ms-3">
						<h5 class="mb-1">K J Somaiya Institute of Management</h5>
						<p class="mb-0">Master of Business Administration - MBA, Human Resources Management and Services</p>
					</div>
				</div>
			</div>
		</div>
        <!-- Certifications Section -->
        <div class="about_heading_div">
			<img class="user_icon" src="/assets/images/certificate_icon.svg">
			<h4 class="about_heading">Certifications</h4>
		</div>
		<div class="d-flex flex-md-row flex-column">
			<div class="col-md-6 mb-3 pe-md-4">
				<div class="d-flex align-items-center">
					<img src="/assets/images/logo-cert1.png" alt="Certification 1 Logo">
					<div class="ms-3">
						<h5 class="mb-1">Assessment Centre Design & Implementation</h5>
						<p class="mb-0 ">Ma Foi Management Consultants Limited Issued Jan 2008 </p>
					</div>
				</div>
			</div>
			<div class="col-md-6 mb-3">
				<div class="d-flex align-items-center">
					<img src="/assets/images/logo-cert1.png" alt="Certification 2 Logo">
					<div class="ms-3">
						<h5 class="mb-1">HR College of Commerce & Economics</h5>
						<p class="mb-0 ">NIS Sparta Limited Issued Jan 2007 </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	



	<!-- <div class="profile-information box_shadows mt-35 padd-40 author_main_div"> -->
        <!-- Authorization Section -->
        <!-- <div class="about_heading_div">
			<img class="user_icon" src="/assets/images/authorizatin_icon.png">
			<h4 class="about_heading">Authorization</h4>
		</div>
		<div class="d-flex mb-lg-5 mb-4">
			<div class="me-lg-5 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark_grey" src="/assets/images/right_mark.svg">
				<p>Legal Authorization to work status : <span class="user_yes">Yes</span></p>
			</div>
			<div class="me-lg-5 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark_grey" src="/assets/images/right_mark.svg">
				<p>Availability : <span class="user_yes">Yes</span></p>
			</div>
			<div class="me-lg-5 me-md-3 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark_grey" src="/assets/images/right_mark.svg">
				<p>Notice Period : <span class="user_yes">Yes</span></p>
			</div>
		</div> -->
        <!-- Skills Section -->
        <!-- <div class="about_heading_div">
			<img class="user_icon" src="/assets/images/skill_icon.png">
			<h4 class="about_heading">Skills</h4>
		</div>
		<div class="d-flex">
			<div class="me-lg-5 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark_grey" src="/assets/images/right_mark.svg">
				<p>Resourceful Professional</p>
			</div>
			<div class="me-lg-5 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark_grey" src="/assets/images/right_mark.svg">
				<p>Talent Management</p>
			</div>
			<div class="me-lg-5 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark_grey" src="/assets/images/right_mark.svg">
				<p>Talent Acquisition</p>
			</div>
			<div class="me-lg-5 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark_grey" src="/assets/images/right_mark.svg">
				<p>Expertise in HR Consulting</p>
			</div>
        </div> -->
    <!-- </div> -->

	<div class="maple_consulting_div">
		<h5 class="maple_consluting text-center">
			© Maple Consulting and Services 
		</h5>
	</div>





<!-- 
	 <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row"><div class="col-md-6"><h4 class="profile_heds">Work Experience</h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-4"><p><strong>Professional Title: </strong> UI/UX Designer</p>
			</div>

			<div class="col-md-8"><p><strong>Company Name: </strong> Nexgeno Technology Pvt Ltd</p>
			</div>

			<div class="col-md-4">
				<p><strong>Years of Experience: </strong> 5-7 Yrs</p>
			</div>

			<div class="col-md-4">
				<p><strong>Industry: </strong>  IT</p>
			</div>

			<div class="col-md-4">
				<p><strong>Skills: </strong> HTML, CSS, PHP</p>
			</div>

			<div class="col-md-12">
				<p><strong>Responsibilities/Achievements: </strong>  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
			</div>
		</div>
	 </div>


	 <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">Education</h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-12">
				<p><strong>School/University Name: </strong> Don Bosco</p>
			</div>

			<div class="col-md-4">
				<p><strong>Degree: </strong> BSc in Design</p>
			</div>

			<div class="col-md-4">
				<p><strong>Graduation Year: </strong> 2016</p>
			</div>

			<div class="col-md-4">
				<p><strong>Major/Field of Study:  </strong> Arts</p>
			</div>
		</div>
	 </div>


	 <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">Certifications</h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-12">
				<p><strong>Certificate Name: </strong> Completion of Figma Mega Course </p>
			</div>

			<div class="col-md-6">
				<p><strong>Date Obtained: </strong> BSc in Design</p>
			</div>

			<div class="col-md-6">
				<p><strong>Registration Number, If Applicable: </strong> 3132123</p>
			</div>

		</div>
	 </div>


	 <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">Availability </h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-6">
				<p><strong>Preferred Title/Role: </strong> UI/UX Designer</p>
			</div>

			<div class="col-md-6">
				<p><strong>Desired Job Location: </strong> Mumbai</p>
			</div>


			<div class="col-md-4">
				<p><strong>Employment Type: </strong> Full Time</p>
			</div>

			<div class="col-md-4">
				<p><strong>Preferred Industry: </strong> IT</p>
			</div>

			

			<div class="col-md-4">
				<p><strong>Expected Salary: </strong> 5LPA</p>
			</div>
		</div>
	 </div>


	  <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">References </h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-6">
				<p><strong>Name: </strong> Lorem Ipsum </p>
			</div>

			<div class="col-md-6">
				<p><strong>Mobile No: </strong> 9865121545</p>
			</div>
		</div>
	 </div>


	 <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">Work Authorization </h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-6">
				<p><strong>Legal Authorization to work status: </strong> Yes </p>
			</div>

			<div class="col-md-3">
				<p><strong>Availability : </strong> Yes</p>
			</div>

			<div class="col-md-3">
				<p><strong>Notice Period : </strong> Yes</p>
			</div>
		</div>
	 </div>

	 <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">Social Media Links</h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-6">
				<p><strong>Linkdin: </strong> https://www.linkdin.com/Mahtab </p>
			</div>

			<div class="col-md-6">
				<p><strong>X : </strong> https://www.twitter.com/Mahtab </p>
			</div>

			<div class="col-md-6">
				<p><strong>Instagram : </strong>https://www.instagram.com/Mahtab</p>
			</div>

			<div class="col-md-6">
				<p><strong>Facebook : </strong>https://www.facebook.com/Mahtab</p>
			</div>

			<div class="col-md-6">
				<p><strong>Other : </strong>https://www.other.com/Mahtab</p>
			</div>
		</div>
	 </div> -->




</div>
</div>


@endsection