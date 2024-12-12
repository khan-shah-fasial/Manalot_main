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
	* {
		font-family: 'Helvetica Neue', sans-serif;
	}
</style>


<div class="profile-page pb-5">
<div class="container">

<div class="top-section">
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
	 </div>



	<div class="image-profile box_shadows">
		<div class="bg-profile-cover">
		   <img class="img-fluid" src="/assets/images/female_intro_bg_img.png"/>
		</div>

		<div class="bg-profile-content">
			<img class="user_img" src="/assets/images/smita_raikundla.png"/>
			
			<div class="profile_content_main_div">
				<div class="profile-content col-lg-7">
					<h3>Smita Raikundlia</h3>
					<p>Executive Director/CXO & Leadership Hiring/ Executive Search Professional/ Client Management
					</p>
					<span>Mumbai, Maharashtra, India.</span>
					<div class="d-flex py-3 pt-4 mt-1 gap-2">
						<div class="purple_btn">
							<a href="" class="profile_btn connect_btn ">
								<i class="fa fa-plus"></i>
								Connect
							</a>
						</div>
						<div>
							<a href="" class="profile_btn message_btn">
								<img class="telegram_icon" src="/assets/images/telegram_arrow.png">
								Message
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 d-flex flex-column gap-lg-0 gap-lg-4 gap-2">
					<div class="profile_manalot_div d-flex align-items-center gap-2 mb-lg-3 mb-1">
						<img class="profile_manalot_logo" src="/assets/images/favicon.png">
						<span>Manalot</span>
					</div>
					<div class="mngmnt_school d-flex align-items-center gap-2">
						<img class="school_logo" src="/assets/images/somaya_img.png">
						<span>K.J. Somaiya Institute Of Management Studies and....</span>
					</div>
				</div>
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

	 <div class="info-section profile-information box_shadows mt-35 padd-40">
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
            <div class="user-social-links">
                <a href="#" class="linkedin">
					<img class="user_social" src="/assets/images/linkedin_img.png">
				</a>
                <a href="#" class="instagram">
					<img class="user_social" src="/assets/images/instagram_img.png">
				</a>
                <a href="#" class="twitter">
					<img class="user_social" src="/assets/images/x-twitter_img.png">
				</a>
                <a href="#" class="facebook">
					<img class="user_social" src="/assets/images/facebook_img.png">
				</a>
                <a href="#" class="globe">
					<img class="user_social" src="/assets/images/globe_img.png">
				</a>
            </div>
        </div>
    </div>


	 <div class="about_main_div profile-information box_shadows mt-35 padd-40">
		<div class="about_heading_div">
			<img class="user_icon" src="/assets/images/user_icon.png">
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
			<!-- <a class="visit_mln" href=""> Visit us at www.manalot.com</a> -->
		</div>
	 </div>

	<div class="profile-information box_shadows mt-35 padd-40 work_exp">
		<div class="about_heading_div">
			<img class="user_icon" src="/assets/images/suitcase_icon.png">
			<h4 class="about_heading">Work Experience</h4>
		</div>
		<div class="col-12">
			<div class="d-flex">
				<img src="/assets/images/favicon.png" alt="Manalot Logo">
				<div class="ms-3">
					<h5 class="mb-1">Executive Director</h5>
					<p class="mb-0 text-muted">Manalot . Full time | Nov 2016 - Present · 8 yrs 1 mo | Mumbai, Maharashtra</p>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="d-flex">
				<img src="/assets/images/sisol_bus.png" alt="SITEL Logo">
				<div class="ms-3">
					<h5 class="mb-1">Manager - HR</h5>
					<p class="mb-0 text-muted">Busisol Sourcing (I) Pvt.Ltd | Jan 2007 - Jan 2014 · 7 yrs 1 mo</p>
				</div>
			</div>
		</div>
	</div>

    <div class="profile-information box_shadows mt-35 padd-40 education_main_div">
        <!-- Education Section -->
        <div class="about_heading_div">
			<img class="user_icon" src="/assets/images/education_icon.png">
			<h4 class="about_heading">Education</h4>
		</div>
		<div class="d-flex flex-md-row flex-row flex-column pb-md-5 pb-3">
			<div class="col-md-6 mb-3 pe-md-4">
				<div class="d-flex">
					<img src="/assets/images/somaya_img.png" alt="Welingkar Logo">
					<div class="ms-3">
						<h5 class="mb-1">K J Somaiya Institute of Management</h5>
						<p class="mb-0 text-muted">Master of Business Administration - MBA, Human Resources Management and Services</p>
					</div>
				</div>
			</div>
		</div>
        <!-- Certifications Section -->
        <div class="about_heading_div">
			<img class="user_icon" src="/assets/images/certificate_icon.png">
			<h4 class="about_heading">Certifications</h4>
		</div>
		<div class="d-flex flex-md-row flex-column">
			<div class="col-md-6 mb-3 pe-md-4">
				<div class="d-flex">
					<img src="/assets/images/logo-cert1.png" alt="Certification 1 Logo">
					<div class="ms-3">
						<h5 class="mb-1">Assessment Centre Design & Implementation</h5>
						<p class="mb-0 text-muted">Ma Foi Management Consultants Limited <br>Issued Jan 2008 </p>
					</div>
				</div>
			</div>
			<div class="col-md-6 mb-3">
				<div class="d-flex">
					<img src="/assets/images/logo-cert1.png" alt="Certification 2 Logo">
					<div class="ms-3">
						<h5 class="mb-1">HR College of Commerce & Economics</h5>
						<p class="mb-0 text-muted">NIS Sparta Limited <br>Issued Jan 2007 </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	



	<div class="profile-information box_shadows mt-35 padd-40 author_main_div">
        <!-- Authorization Section -->
        <div class="about_heading_div">
			<img class="user_icon" src="/assets/images/authorizatin_icon.png">
			<h4 class="about_heading">Authorization</h4>
		</div>
		<div class="d-flex mb-lg-5 mb-4">
			<div class="me-lg-5 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark" src="/assets/images/right_mark.png">
				<p>Legal Authorization to work status : <span class="user_yes">Yes</span></p>
			</div>
			<div class="me-lg-5 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark" src="/assets/images/right_mark.png">
				<p>Availability : <span class="user_yes">Yes</span></p>
			</div>
			<div class="me-lg-5 me-md-3 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark" src="/assets/images/right_mark.png">
				<p>Notice Period : <span class="user_yes">Yes</span></p>
			</div>
		</div>
        <!-- Skills Section -->
        <div class="about_heading_div">
			<img class="user_icon" src="/assets/images/skill_icon.png">
			<h4 class="about_heading">Skills</h4>
		</div>
		<div class="d-flex">
			<div class="me-lg-5 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark" src="/assets/images/right_mark.png">
				<p>Resourceful Professional</p>
			</div>
			<div class="me-lg-5 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark" src="/assets/images/right_mark.png">
				<p>Talent Management</p>
			</div>
			<div class="me-lg-5 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark" src="/assets/images/right_mark.png">
				<p>Talent Acquisition</p>
			</div>
			<div class="me-lg-5 mb-md-3 mb-2 d-flex gap-2 align-items-center">
				<img class="right_mark" src="/assets/images/right_mark.png">
				<p>Expertise in HR Consulting</p>
			</div>
        </div>
    </div>

	<div class="maple_consulting_div mt-lg-5 mt-4">
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