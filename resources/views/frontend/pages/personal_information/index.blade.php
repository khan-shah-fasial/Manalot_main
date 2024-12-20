@extends('frontend.layouts.app')

@section('page.title', 'Manalot')

@section('page.description', '')

@section('page.type', 'website')

@section('page.content')

<style>
    @media screen and (min-width: 1200px) {
        .container, .container-lg, .container-md, .container-sm, .container-xl {
            max-width: 1230px;
        }

        header.d-flex.align-items-center.justify-content-between {
            width: 100%;
        }
    }

    body#index {
        background-color: #e7ecef;
    }

    .user_header .search_input button { 
        padding: 8px 0px 8px 20px;
    }
</style>

<section class="personal_information pb-5 mt80" style="background-color: #e7ecef">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-md-3 mt-4 pb-md-5 pb-3 right_sidebar_parent_div width_20">
                <aside class="left_sidebar">
                    <div class="list-group">
                        <h6 class="manage_network">Manage My Network</h6>
                        <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="list-group-item personal_info active" id="personal_info_tab" data-bs-toggle="tab" href="#personal_info" role="tab" aria-controls="personal_info" aria-selected="true">
                                <img class="personal_info_left_list_icon" src="/assets/images/prsnl_info_icon.svg">
                                Personal Information
                            </a>
                            <a class="list-group-item chng_pswrd" id="chng_pswrd_tab" data-bs-toggle="tab" href="#chng_pswrd" role="tab" aria-controls="chng_pswrd" aria-selected="false">
                                <img class="personal_info_left_list_icon" src="/assets/images/chng_pswrd_icon.svg">
                                Change Password
                            </a>
                            <a class="list-group-item wrk_exp" id="wrk_exp_tab" data-bs-toggle="tab" href="#wrk_exp" role="tab" aria-controls="wrk_exp" aria-selected="false">
                                <img class="personal_info_left_list_icon" src="/assets/images/wrk_exp_icon.svg">
                                Work Experience
                            </a>
                            <a class="list-group-item edu" id="edu_tab" data-bs-toggle="tab" href="#edu" role="tab" aria-controls="edu" aria-selected="false">
                                <img class="personal_info_left_list_icon" src="/assets/images/edu_icon.svg">
                                Education
                            </a>
                            <a class="list-group-item cert_flag" id="cert_flag_tab" data-bs-toggle="tab" href="#cert_flag" role="tab" aria-controls="cert_flag" aria-selected="false">
                                <img class="personal_info_left_list_icon" src="/assets/images/cert_flag_icon.svg">
                                Certification
                            </a>
                            <a class="list-group-item avail_ref" id="avail_ref_tab" data-bs-toggle="tab" href="#avail_ref" role="tab" aria-controls="avail_ref" aria-selected="false">
                                <img class="personal_info_left_list_icon" src="/assets/images/avail_ref_icon.svg">
                                Availability & Reference
                            </a>
                            <a class="list-group-item" id="_tab" data-bs-toggle="tab" href="#wrk_auth" role="tab" aria-controls="wrk_auth" aria-selected="false">
                                <img class="personal_info_left_list_icon" src="/assets/images/wrk_auth_icon.svg">
                                Work Authorization
                            </a>
                            <a class="list-group-item cert_flag2" id="social_media_tab" data-bs-toggle="tab" href="#social_media" role="tab" aria-controls="social_media" aria-selected="false">
                                <img class="personal_info_left_list_icon" src="/assets/images/cert_flag_icon.svg">
                                Social Media Links
                            </a>
                        </nav>
                    </div>
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
            <div class="col-md-9 pt-md-4 main_parent_div">
                <main class="">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="personal_info tab-pane fade show active" id="personal_info"  role="tabpanel" aria-labelledby="personal_info_tab">
                            <h3 class="prsnl_info_heading">Personal Information</h3>
                            <form class="proxima_nova_font">
                                <div class="row">
                                    <!-- Full Name and Gender -->
                                    <div class="col-md-6">
                                        <label for="fullName" class="form-label">Full Name*</label>
                                        <input type="text" class="form-control" id="fullName">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Gender*</label>
                                        <select class="form-select" id="gender">
                                            <option></option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    <!-- Headline -->
                                    <div class="col-md-12">
                                        <label for="headline" class="form-label">Headline</label>
                                        <textarea type="text" class="form-control" id="headline" rows="1"></textarea>
                                    </div>
                                    <!-- Profile Photo and Date of Birth -->
                                    <div class="col-md-6">
                                        <label for="profilePhoto" class="form-label">Profile Photo</label>
                                        <input type="file" class="form-control choose_img_file" id="profilePhoto">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dob" class="form-label">Date of Birth*</label>
                                        <input type="date" class="form-control is-invalid input_text register_date_field" id="Date2" name="dob" placeholder="Date" required="">
                                    </div>
                                    <!-- Zip/Postal Code and City -->
                                    <div class="col-md-6">
                                        <label for="zipCode" class="form-label">Zip/Postal Code*</label>
                                        <input type="text" class="form-control" id="zipCode">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="city" class="form-label">City*</label>
                                        <input type="text" class="form-control" id="city">
                                    </div>
                                    <!-- Country and State -->
                                    <div class="col-md-6">
                                        <label for="country" class="form-label">Country*</label>
                                        <select class="form-select" id="country">
                                            <option></option>
                                            <option>India</option>
                                            <option>USA</option>
                                            <option>UK</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="state" class="form-label">State*</label>
                                        <select class="form-select" id="state">
                                            <option></option>
                                            <option>Maharashtra</option>
                                            <option>Delhi</option>
                                            <option>Karnataka</option>
                                        </select>
                                    </div>
                                    <!-- Address -->
                                    <div class="col-md-12">
                                        <label for="address" class="form-label">Address*</label>
                                        <textarea class="form-control" id="address" rows="1"></textarea>
                                    </div>
                                    <!-- Phone and Email -->
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone*</label>
                                        <input type="tel" class="form-control" id="phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address*</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <!-- About -->
                                    <div class="col-md-12">
                                        <label for="about" class="form-label">About*</label>
                                        <textarea class="form-control" id="about" rows="3"></textarea>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="chng_pswrd tab-pane fade" id="chng_pswrd" role="tabpanel" aria-labelledby="chng_pswrd_tab">
                            <h3 class="prsnl_info_heading">Change Password</h3>
                            <form class="proxima_nova_font">
                                <div class="row">                                    
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password*</label>
                                        <input type="text" class="form-control" id="password">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="change_password" class="form-label">Confirm Password*</label>
                                        <input type="text" class="form-control" id="change_password">
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="wrk_exp tab-pane fade" id="wrk_exp" role="tabpanel" aria-labelledby="wrk_exp_tab">
                            <h3 class="prsnl_info_heading">Work Experience</h3>
                            <form class="proxima_nova_font">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="professional_title" class="form-label">Professional Title*</label>
                                        <input type="text" class="form-control" id="professional_title">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="company_name" class="form-label">Company Name*</label>
                                        <input type="text" class="form-control" id="company_name">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="start_date" class="form-label">Start Date*</label>
                                        <input type="text" class="form-control" id="start_date" placeholder="Month">
                                    </div>

                                    <div class="col-md-6">
                                    <label for="start_date2" class="form-label"> </label>
                                        <input type="number" class="form-control" id="start_date2"  placeholder="Year">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="end_date" class="form-label">End Date*</label>
                                        <input type="text" class="form-control" id="end_date" placeholder="Month">
                                    </div>

                                    <div class="col-md-6">
                                    <label for="end_date2" class="form-label"> </label>
                                        <input type="number" class="form-control" id="end_date2" placeholder="Year">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="industry" class="form-label">Industry*</label>
                                        <select class="form-select" id="industry">
                                            <option></option>
                                            <option>Web Desing</option>
                                            <option>UI/UX Desing</option>
                                            <option>Web Developement</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <label for="skills" class="form-label">Skills*</label>
                                        <input type="text" class="form-control" id="skills">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="responsibilities_achievements" class="form-label">Responsibilities/Achievements</label>
                                        <textarea class="form-control" id="responsibilities_achievements" rows="3"></textarea>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="edu tab-pane fade" id="edu" role="tabpanel" aria-labelledby="edu_tab">
                            <h3 class="prsnl_info_heading">Education</h3>
                            <form class="proxima_nova_font">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="school_university" class="form-label">School/University Name*</label>
                                        <input type="text" class="form-control" id="school_university">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="degree" class="form-label">Degree*</label>
                                        <input type="text" class="form-control" id="degree">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="graduation_year" class="form-label">Graduation Year*</label>
                                        <select class="form-select" id="graduation_year">
                                            <option>Select Year</option>
                                            <option>2010</option>
                                            <option>2011</option>
                                            <option>2012</option>
                                            <option>2013</option>
                                            <option>2014</option>
                                            <option>2015</option>
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                            <option>2021</option>
                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="major_field" class="form-label">Major/Field of Study*</label>
                                        <input type="text" class="form-control" id="major_field">
                                    </div>

                                    <div class="col-md-6 add_more_div">
                                        <a class="add_more" href="">ADD MORE +</a>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="cert_flag tab-pane fade" id="cert_flag" role="tabpanel" aria-labelledby="cert_flag_tab">
                            <h3 class="prsnl_info_heading">Certifications</h3>
                            <form class="proxima_nova_font">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="certificate_name" class="form-label">Certificate Name</label>
                                        <input type="text" class="form-control" id="certificate_name">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="date_obtained" class="form-label">Date Obtained</label>
                                        <input type="date" class="form-control is-invalid input_text register_date_field" id="date_obtained" name="dob" placeholder="Date" required="">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="issuing_organization" class="form-label">Issuing Organization</label>
                                        <input type="text" class="form-control" id="issuing_organization">
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="avail_ref tab-pane fade" id="avail_ref" role="tabpanel" aria-labelledby="avail_ref_tab">
                            <h3 class="prsnl_info_heading">Availability </h3>
                            <form class="proxima_nova_font">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="preferred_title_role*" class="form-label">Preferred Title/Role*</label>
                                        <input type="text" class="form-control" id="preferred_title_role*">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="employment_yype" class="form-label">Employment Type*</label>
                                        <input type="text" class="form-control" id="employment_yype">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="preferred_industry" class="form-label">Preferred Industry*</label>
                                        <input type="text" class="form-control" id="preferred_industry">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="desired_job_location" class="form-label">Desired Job Location*</label>
                                        <input type="text" class="form-control" id="desired_job_location">
                                    </div>

                                    <div class="col-md-12 mb-0">
                                        <div class="col-md-6">
                                            <label for="expected_salary*" class="form-label">Expected Salary*</label>
                                            <select class="form-select" id="expected_salary*">
                                                <option></option>
                                                <option>5LPA</option>
                                                <option>6LPA</option>
                                                <option>7LPA</option>
                                                <option>8LPA</option>
                                                <option>9LPA</option>
                                                <option>10LPA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 add_more_div">
                                        <a class="add_more" href="">ADD MORE +</a>
                                    </div>                                    
                                </div> 

                                <br>
                                <h3 class="prsnl_info_heading">References</h3> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="reference_name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="reference_name">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="reference_mobile_no" class="form-label">Mobile No</label>
                                        <input type="tel" class="form-control" id="reference_mobile_no">
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="wrk_auth tab-pane fade" id="wrk_auth" role="tabpanel" aria-labelledby="wrk_auth_tab">
                            <h3 class="prsnl_info_heading">Work Authorization</h3>
                            <form class="proxima_nova_font">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <label for="legal_authorization" class="form-label">Legal Authorization to work status</label>
                                        <select class="form-select" id="yn1">
                                            <option></option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <label for="availability " class="form-label">Availability </label>
                                        <select class="form-select" id="yn2">
                                            <option></option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <label for="notice_period" class="form-label">Notice Period</label>
                                        <select class="form-select" id="yn3">
                                            <option></option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="social_media tab-pane fade" id="social_media" role="tabpanel" aria-labelledby="social_media_tab">
                            <h3 class="prsnl_info_heading">Social Media Links</h3>
                            <form class="proxima_nova_font">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="personal_info_linkdin" class="form-label">Linkdin</label>
                                        <input type="text" class="form-control" id="personal_info_linkdin">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="personal_info_twitter" class="form-label">Twitter</label>
                                        <input type="text" class="form-control" id="personal_info_twitter">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="personal_info_instagram" class="form-label">Instagram</label>
                                        <input type="text" class="form-control" id="personal_info_instagram">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="personal_info_facebook" class="form-label">Facebook</label>
                                        <input type="text" class="form-control" id="personal_info_facebook">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="personal_info_others" class="form-label">Others</label>
                                        <input type="text" class="form-control" id="personal_info_others">
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</section>

@endsection