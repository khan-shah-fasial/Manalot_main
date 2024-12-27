@extends('frontend.layouts.app')

@section('page.title', 'Manalot')

@section('page.description', '')

@section('page.type', 'website')

@section('page.content')

@php
// var_dump($user);

// var_dump($user_detail);

    // $experience_status = DB::table('experience_status')->where('status', 1)->get();

    $employ_types = DB::table('employ_types')->where('status', 1)->get();

    $notice_period_list = DB::table('notice_period')->where('status', 1)->get();

    $years_of_exp = DB::table('years_of_exp')->where('status', '1')->get();
    // $job_title = DB::table('job_title')->where('status', '1')->get();

    $industry = DB::table('industry')->where('status', '1')->get();
    $groupedIndustries = $industry->where('main', 1);

    $skills = DB::table('skills')->where('status', '1')->get();

    $currencies = DB::table('currencies')->get(['id','symbol']);

    // $references_from = DB::table('references_from')->where('status', '1')->get();

    $email = isset($user->email) ? $user->email : null;

    $fullname = isset($user_detail->fullname) ? $user_detail->fullname : null;
    $phone_number = isset($user_detail->phone_number) ? $user_detail->phone_number : null;
    $gender = isset($user_detail->gender) ? $user_detail->gender : null;
    $profile_photo = isset($user_detail->profile_photo) ? $user_detail->profile_photo : null;
    // Retrieving the date of birth from user details
    $dobFormatted = isset($user_detail->dob) ? $user_detail->dob : null;

    // Ensure the date format is correct for the input type "date"
    $dob = $dobFormatted ? date('Y-m-d', strtotime($dobFormatted)) : null;

    $pincode = isset($user_detail->pincode) ? $user_detail->pincode : null;
    $city = isset($user_detail->city) ? $user_detail->city : null;
    $country = isset($user_detail->country) ? $user_detail->country : null;
    $state = isset($user_detail->state) ? $user_detail->state : null;
    $address = isset($user_detail->address) ? $user_detail->address : null;

    $wrk_exp__title = isset($user_detail->wrk_exp__title) ? $user_detail->wrk_exp__title : null;
    $wrk_exp_company_name = isset($user_detail->wrk_exp_company_name) ? $user_detail->wrk_exp_company_name : null;
    $wrk_exp_years = isset($user_detail->wrk_exp_years) ? $user_detail->wrk_exp_years : null;
    $industry_check = isset($user_detail->industry) ? $user_detail->industry : '[]';
    $experience_letter = isset($user_detail->experience_letter) ? $user_detail->experience_letter : null;
    $employed = isset($user_detail->employed) ? $user_detail->employed : null;
    $skill_check = isset($user_detail->skill) ? $user_detail->skill : '[]';
    $wrk_exp_responsibilities = isset($user_detail->wrk_exp_responsibilities) ? $user_detail->wrk_exp_responsibilities : null;


    $edu_clg_name = isset($user_detail->edu_clg_name) ? $user_detail->edu_clg_name : null;
    $edu_degree = isset($user_detail->edu_degree) ? $user_detail->edu_degree : null;
    $edu_graduation_year = isset($user_detail->edu_graduation_year) ? $user_detail->edu_graduation_year : null;
    $edu_field = isset($user_detail->edu_field) ? $user_detail->edu_field : null;

    $edu_data = isset($user_detail->edu_data) ? $user_detail->edu_data : '[]';
    $edu_data = json_decode($edu_data, true);

    $certificate_data = isset($user_detail->certificate_data) ? $user_detail->certificate_data : '[]';
    $certificate_data = json_decode($certificate_data, true);

    $pref_title = isset($user_detail->pref_title) ? $user_detail->pref_title : null;
    $pref_emp_type = isset($user_detail->pref_emp_type) ? $user_detail->pref_emp_type : null;
    $pref_industry_check = isset($user_detail->pref_industry) ? $user_detail->pref_industry : '[]';
    $pref_location = isset($user_detail->pref_location) ? $user_detail->pref_location : null;

    $current_salary_currency  = isset($user_detail->current_salary_currency) ? $user_detail->current_salary_currency : null;
    $pref_salary_currency  = isset($user_detail->pref_salary_currency) ? $user_detail->pref_salary_currency : null;

    $current_salary = isset($user_detail->current_salary) ? $user_detail->current_salary : null;
    $notice_period_check = isset($user_detail->notice_period_duration) ? $user_detail->notice_period_duration : null;
    $pref_salary = isset($user_detail->pref_salary) ? $user_detail->pref_salary : null;
    $work_authorization_status = isset($user_detail->work_authorization_status) ? $user_detail->work_authorization_status : null;
    $notice_period = isset($user_detail->notice_period) ? $user_detail->notice_period : null;
    $availability = isset($user_detail->availability) ? $user_detail->availability : null;

    $references_data = isset($user_detail->references) ? $user_detail->references : '[]';
    $references_data = json_decode($references_data, true);

    $linkedin = isset($user_detail->linkdin) ? $user_detail->linkdin : null;
    $twitter = isset($user_detail->twitter) ? $user_detail->twitter : null;
    $instagram = isset($user_detail->instagram) ? $user_detail->instagram : null;
    $facebook = isset($user_detail->facebook) ? $user_detail->facebook : null;
    $other = isset($user_detail->other) ? $user_detail->other : null;

@endphp
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
    .header > .container-lg.container-fluid {
        padding: 0px;
    }

    .education-row .col-md-6:nth-child(odd) {
    padding-left: 12px;
    padding-right: 12px !important;
}

.education-row .col-md-6:nth-child(even) {
    padding-left: 12px !important;
    padding-right: 0px;
}

.cirtificate_pdd .col-md-6:nth-child(even) {
    padding-left: 15px !important;
    padding-right: 12px;
}
.cirtificate_pdd .col-md-6:nth-child(odd) {
    padding-left: 12px;
    padding-right: 12px !important;
}
.reference-row .col-md-6:nth-child(even) {
    padding-left: 25px;
}
.reference-row .col-md-6:nth-child(odd) {
    padding-right: 0;
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
                                <span class="work_exp_updt">Update</span>
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

                            <form id="personal-info" action="{{ url(route('user.save-profile', ['param' => 'personal-info'])) }}"
                                method="post" enctype="multipart/form-data" class="d-flex flex-column">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="first_name" class="form-label">Full Name *</label>
                                            <input type="text" class="form-control is-invalid input_text" name="fullname"
                                                id="fullname" placeholder="Enter First Name" pattern="[A-Za-z]+" minlength="1"
                                                maxlength="255" value="{{ isset($fullname) ? $fullname : (Session::has('google_name') ? Session::get('google_name') : '') }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Gender" class="form-label">Gender *</label>
                                            <select class="select2 form-select form-control is-invalid  input_select old-select2"
                                                aria-label="Default select example" id="Gender" name="gender" required>
                                                <option value="1" @if ($gender == 1) selected @endif>Male</option>
                                                <option value="">Select Gender</option>
                                                <option value="2" @if ($gender == 2) selected @endif>Female</option>
                                                <option value="3" @if ($gender == 3) selected @endif>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Headline -->
                                    <div class="col-md-12">
                                        <label for="headline" class="form-label">Headline</label>
                                        <textarea type="text" class="form-control" id="headline" rows="1">Listed as Most Innovative Leadership Advisory Firm – APAC 2024 I Featured as a Top 10...</textarea>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="formFile" class="form-label" id="profile_photo">Profile Photo {{--<span class="leble_size">(png, jpg)</span>--}}</label>
                                            @if (!empty($profile_photo) && $profile_photo != null)
                                                <a class="pdf_view" target="_blank" href="{{ asset('storage/' . $profile_photo) }}">
                                                    View
                                                </a>
                                            @endif
                                            <img src="/assets/images/chooe_img_icon.svg" alt="" class="input_icon" />
                                            <input class="form-control is-invalid" type="file" id="profile_photo" name="profile_photo"
                                                accept=".jpg,.jpeg,.png,.webp" {{-- @if (empty($profile_photo) || $profile_photo == null) @endif --}} />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Date" class="form-label">Date of Birth*</label>
                                            <!-- <img src="/assets/images/calender_icon.png" alt="" class="input_icon"> -->
                                            <input type="date" class="form-control is-invalid input_text register_date_field" id="Date"
                                                name="dob" placeholder="Date" value="{{ isset($dob) ? $dob : '' }}" max="{{ date('Y-m-d') }}"
                                                required />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="zip_code" class="form-label">Zip/Postal Code*</label>
                                            <input type="text" class="form-control is-invalid input_text" id="pincode"
                                                name="pincode" pattern="[0-9A-Za-z]+" minlength="1" maxlength="10"
                                                placeholder="Enter Your zipcode / Pincode" value="{{ isset($pincode) ? $pincode : '' }}" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="city" class="form-label">City*</label>
                                            <input type="text" class="form-control is-invalid input_text" id="city"
                                                name="city" pattern="[A-Za-z]+" minlength="3" maxlength="50"
                                                placeholder="Enter Your City" value="{{ isset($city) ? $city : '' }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="country_name" class="form-label">Country*</label>
                                            <input type="text" value="{{ isset($country) ? $country : '' }}"
                                                class="form-control is-invalid input_text" id="country_name" name="country"
                                                placeholder="Enter Your country" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="State" class="form-label">State*</label>
                                            <input type="text" value="{{ isset($state) ? $state : 'Maharashtra' }}"
                                                class="form-control is-invalid input_text" id="state" name="state"
                                                placeholder="Enter Your State" required />
                                        </div>
                                    </div>


                                    <div class="col-md-12 mb-12">
                                        <div class="position-relative form-group">
                                            <label for="address" class="form-label">Address*</label>
                                            <textarea class="form-control is-invalid" rows="1" name="address" id="address" pattern="[0-9A-Za-z]+" placeholder="Address">{{ isset($address) ? $address : '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Phone" class="form-label">Phone *</label>
                                            <input type="text" class="form-control is-invalid input_text" id="Mobile"
                                                name="phone_number" placeholder="Enter your Phone Number" title="This Field is required" pattern="[0-9]+" minlength="5"
                                                maxlength="16" value="{{ $phone_number }}" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="email" class="form-label">Email Address*</label>
                                            <input type="email" class="form-control is-invalid input_text" id="email" name="email"
                                                placeholder="Enter Your email" required value="{{ $email ?? '' }}" />
                                        </div>
                                    </div>

                                    <!-- About -->
                                    <div class="col-md-12">
                                        <label for="about" class="form-label">About*</label>
                                        <textarea class="form-control" id="about" rows="3">As a versatile and dedicated human resource professional,
                                             I bring a wealth of experience as a seasoned consultant in
                                              providing global leadership advisory services. With a keen
                                              understanding of the intricate dynamics of leading...</textarea>
                                    </div>


                                </div>
                                <div class="purple_btn text-start">
                                    <!-- <button type="submit" class="text-decoration-none text-white">Next</button> -->
                                    <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                </div>
                            </form>
                        </div>

                        <div class="chng_pswrd tab-pane fade" id="chng_pswrd" role="tabpanel" aria-labelledby="chng_pswrd_tab">
                            <h3 class="prsnl_info_heading">Change Password</h3>

                            <form id="change-password" class="proxima_nova_font" action="{{ url(route('user.save-profile', ['param' => 'change-password'])) }}">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="password" class="form-label">Password *</label>
                                            <img src="/assets/images/key.png" alt="" class="input_icon" />
                                            <input type="password" class="form-control is-invalid input_text" id="password" name="password"
                                                placeholder="Enter your Password" minlength="6" maxlength="20" required />
                                            {{-- <img src="images/key.png" alt="" class="input_icon" /> --}}
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="password" class="form-label">Confirm Password *</label>
                                            <img src="/assets/images/key.png" alt="" class="input_icon" />
                                            <input type="password" class="form-control is-invalid input_text" id="confirm_password"
                                                name="confirm_password" placeholder="Enter your Password" minlength="6" maxlength="20"
                                                required />
                                            {{-- <img src="images/key.png" alt="" class="input_icon" /> --}}
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form>
                        </div>




<!---------------------------------------------- Work Experience ---------------------------------------------->

                        <div class="wrk_exp tab-pane fade" id="wrk_exp" role="tabpanel" aria-labelledby="wrk_exp_tab">
                            <h3 class="prsnl_info_heading">Work Experience</h3>

                            <form id="personal-work-info" action="{{ url(route('user.save-profile', ['param' => 'personal-work-info'])) }}" method="post" enctype="multipart/form-data" class="d-flex flex-column">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="job_title" class="form-label">Professional Title*</label>
                                            <input type="text" class="form-control is-invalid input_text" id="job_title"
                                                name="wrk_exp__title" placeholder="Enter your Job Title" pattern="[A-Za-z]+"
                                                minlength="2" maxlength="100" value="{{ $wrk_exp__title }}" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="company" class="form-label">Company Name*</label>
                                            <input type="text" class="form-control is-invalid input_text" id="company"
                                                name="wrk_exp_company_name" placeholder="Enter your Company Name" pattern="[A-Za-z]+"
                                                minlength="1" maxlength="100" value="{{ $wrk_exp_company_name }}"
                                                required>
                                        </div>
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


                                    <div class="col-md-6 mb-4">

                                        <label for="industry" class="form-label">Industries</label>
                                        <div id="list-industry" class="d-none">

                                        </div>

                                        <div id="dropdown-container">
                                            {{-- <div id="selected-values">Selected values will be shown here.</div> --}}
                                            <input type="hidden" id="selected-values-ids" name="industry[]" value="">


                                            <div class="dropdown industry_option_dropdown">
                                                <a class="dropdown-toggle industry_option">Select Industries Served </a>
                                                <div class="dropdown-menu industry-check-box industry_option_dropdown_box">
                                                    @foreach ($groupedIndustries as $mainIndustry)
                                                        <div class="title" style="background: #d5d5d563; padding: 10px; font-weight: 600">
                                                            {{ $mainIndustry->name }}
                                                        </div>

                                                        @php
                                                            $sub_Catg = $industry->where('main_partent_id', $mainIndustry->id);
                                                        @endphp

                                                        @if (count($sub_Catg) != 0)
                                                            @foreach ($sub_Catg as $subIndustry)
                                                                <div class="option custom-languages pt-1">

                                                                    <input type="checkbox" id="{{ $subIndustry->id }}"
                                                                    data-id="{{ $subIndustry->id }}" @if (in_array($subIndustry->id, json_decode($industry_check, true))) checked @endif>
                                                                    <label for="{{ $subIndustry->id }}">{{ $subIndustry->name }}</label>

                                                                    @php
                                                                        $child_Catg = $industry->where('sub_parent_id', $subIndustry->id);
                                                                    @endphp

                                                                    @if (count($child_Catg) != 0)
                                                                        <div class="child-options">
                                                                            @foreach ($child_Catg as $childIndustry)
                                                                            <div class="field_option pt-1">
                                                                                <input type="checkbox" id="{{ $childIndustry->id }}" data-id="{{ $childIndustry->id }}" @if (in_array($childIndustry->id, json_decode($industry_check, true))) checked @endif>
                                                                                <label for="{{ $childIndustry->id }}">{{ $childIndustry->name }}</label>
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <div class="position-relative form-group">
                                            <label for="skills" class="form-label">Skills*</label>
                                            <select name="skill[]" multiple="multiple"
                                                class="select2 form-select form-control is-invalid input_select"
                                                aria-label="Default select example" id="skills-data" required>
                                                <option value=""> </option>
                                                @foreach ($skills as $row)
                                                    <option value="{{ $row->name }}"
                                                        @if (in_array($row->name, json_decode($skill_check, true))) selected @endif>
                                                        {{ ucfirst($row->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-none" id="option-skills"></div>

                                    <div class="col-md-12 pt-4">
                                        <div class="form-group">
                                            <label for="Responsibilities" class="form-label">Responsibilities/Achievements*</label>
                                            <textarea class="form-control is-invalid" rows="4" cols="45" name="wrk_exp_responsibilities"
                                                placeholder="Message" required>{{ $wrk_exp_responsibilities }}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="purple_btn text-start">
                                    <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                </div>
                            </form>

                        </div>

<!---------------------------------------------- Work Experience ---------------------------------------------->

<!------------------------------------------------- Education ------------------------------------------------->

                        <div class="edu tab-pane fade" id="edu" role="tabpanel" aria-labelledby="edu_tab">
                            <h3 class="prsnl_info_heading">Education</h3>

                            <form id="education-info" action="{{ url(route('user.save-profile', ['param' => 'education-info'])) }}"
                                method="post" enctype="multipart/form-data" class="d-flex flex-column">
                                @csrf

                                @if (!empty($edu_data))
                                    @foreach ($edu_data as $index => $education)
                                        <div class="row education-row cirtificate_pdd">
                                            <div class="col-md-6 mb-4">
                                                <div class="position-relative form-group">
                                                    <label for="School" class="form-label">School/University Name*</label>
                                                    <input type="text" class="form-control is-invalid input_text certificate_name"
                                                        name="edu_clg_name[]" placeholder="Enter Your School/University Name"
                                                        pattern="[A-Za-z]+" minlength="1" maxlength="100"
                                                        value="{{ $education['edu_clg_name'] }}" required/>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="position-relative form-group">
                                                    <label for="Degree" class="form-label">Degree*</label>
                                                    <input type="text" class="form-control is-invalid input_text certificate_name"
                                                        name="edu_degree[]" placeholder="Enter your Degree"
                                                        pattern="[A-Za-z]+" minlength="1" maxlength="100"
                                                        value="{{ $education['edu_degree'] }}" required/>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="position-relative form-group">
                                                    <label for="Certificate" class="form-label">Graduation Year*</label>
                                                    <input type="text" class="form-control is-invalid input_text certificate_name"
                                                        name="edu_graduation_year[]" placeholder="Enter Your Graduation Year"
                                                        pattern="[0-9A-Za-z]+" minlength="1" maxlength="100"
                                                        value="{{ $education['edu_graduation_year'] }}" required/>
                                                </div>
                                            </div>


                                            <div class="col-md-6 mb-4">
                                                <div class="position-relative form-group">
                                                    <label for="Certificate" class="form-label">Major/Field of Study*</label>
                                                    <input type="text" class="form-control is-invalid input_text certificate_name"
                                                        name="edu_field[]" placeholder="Enter your Major Field of Study"
                                                        pattern="[A-Za-z]+" minlength="1" maxlength="100"
                                                        value="{{ $education['edu_field'] }}" required/>
                                                </div>
                                            </div>

                                            <div class="col-md-12 d-flex gap-3 add_more_div">
                                                <button type="button" class="add_more add-edu-row">Add More +</button>
                                                <button type="button" class="remove_more remove-edu-row">Remove -</button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row education-row cirtificate_pdd">
                                        <div class="col-md-6 mb-4">
                                            <div class="position-relative form-group">
                                                <label for="School" class="form-label">School/University Name*</label>
                                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                                    name="edu_clg_name[]" placeholder="Enter Your School/University Name"
                                                    pattern="[A-Za-z]+" minlength="1" maxlength="100" value="Don Bosco" required
                                                />
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="position-relative form-group">
                                                <label for="Degree" class="form-label">Degree*</label>
                                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                                    name="edu_degree[]" placeholder="Enter your Degree"
                                                    pattern="[A-Za-z]+" minlength="1" maxlength="100" value="BSc in Design" required
                                                />
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="position-relative form-group">
                                                <label for="Certificate" class="form-label">Graduation Year*</label>
                                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                                    name="edu_graduation_year[]" placeholder="Enter Your Graduation Year"
                                                    pattern="[0-9A-Za-z]+" minlength="1" maxlength="100" required
                                                />
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="position-relative form-group">
                                                <label for="Certificate" class="form-label">Major/Field of Study*</label>
                                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                                    name="edu_field[]" placeholder="Enter your Major Field of Study"
                                                    pattern="[A-Za-z]+" minlength="1" maxlength="100" value="Arts"
                                                />
                                            </div>
                                        </div>

                                        <div class="col-md-6 add_more_div">
                                            <button class="add_more add-edu-row" href="">ADD MORE +</button>
                                        </div>
                                    </div>
                                @endif

                                <div class="purple_btn text-start">
                                    <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                </div>
                            </form>

                        </div>

<!------------------------------------------------- Education ------------------------------------------------->

<!----------------------------------------------- Certification ------------------------------------------------->

                        <div class="cert_flag tab-pane fade" id="cert_flag" role="tabpanel" aria-labelledby="cert_flag_tab">
                            <h3 class="prsnl_info_heading">Certifications</h3>

                            <form id="certifications-info" action="{{ url(route('user.save-profile', ['param' => 'certifications-info'])) }}"
                                method="post" enctype="multipart/form-data" class="d-flex flex-column">
                                @csrf
                                @if (!empty($certificate_data))
                                    @foreach ($certificate_data as $index => $certificate)
                                        <div class="row certificate-row cirtificate_pdd">
                                            <div class="col-md-12 mb-4">
                                                <div class="position-relative form-group">
                                                    <label for="Certificate" class="form-label">Certificate Name</label>
                                                    <input required type="text" class="form-control is-invalid input_text certificate_name"
                                                        name="certificate_name[]" placeholder="Enter Your Certificate Name"
                                                        pattern="[0-9A-Za-z]+" minlength="1" maxlength="100"
                                                        value="{{ $certificate['certificate_name'] }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="position-relative form-group">
                                                    <label for="Date Obtained*" class="form-label">Date Obtained</label>
                                                    <input required type="date" class="form-control is-invalid input_text certificate_obtn_date register_date_field" max="{{ date('Y-m-d') }}"
                                                        name="certificate_obtn_date[]" placeholder="Date"
                                                        value="{{ $certificate['certificate_obtn_date'] }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="position-relative form-group">
                                                    <label for="Issuing Registration*" class="form-label">Issuing Organization</label>
                                                    <input required type="text" class="form-control is-invalid input_text certificate_issuing"
                                                        name="certificate_issuing[]" placeholder="Enter your Issuing Registration"
                                                        pattern="[0-9A-Za-z]+" minlength="1" maxlength="50"
                                                        value="{{ $certificate['certificate_issuing'] }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 d-flex gap-3 add_more_div">
                                                <button type="button" class="add_more add-row-certificate">ADD MORE +</button>
                                                <button type="button" class="remove_more remove-row-certificate">REMOVE -</button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row certificate-row cirtificate_pdd">
                                        <div class="col-md-12 mb-4">
                                            <div class="position-relative form-group">
                                                <label for="Certificate" class="form-label">Certificate Name</label>
                                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                                    name="certificate_name[]" placeholder="Enter Your Certificate Name"
                                                    pattern="[0-9A-Za-z]+" minlength="1" maxlength="50"/>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="position-relative form-group">
                                                <label for="Date Obtained*" class="form-label">Date Obtained</label>
                                                <input type="date" class="form-control is-invalid input_text certificate_obtn_date register_date_field" max="{{ date('Y-m-d') }}"
                                                    name="certificate_obtn_date[]" placeholder="Date" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="position-relative form-group">
                                                <label for="Issuing Registration*" class="form-label">Issuing Organization</label>
                                                <input type="text" class="form-control is-invalid input_text certificate_issuing"
                                                    name="certificate_issuing[]" placeholder="Enter your Issuing Registration"
                                                    pattern="[0-9A-Za-z]+" minlength="1" maxlength="50" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 add_more_div">
                                            <button type="button" class="add_more add-row-certificate">ADD MORE +</button>
                                        </div>
                                    </div>
                                @endif

                                <div class="purple_btn text-start">
                                    <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                </div>
                            </form>
                        </div>

<!----------------------------------------------- Certification ------------------------------------------------->

<!---------------------------------------- Availability and Reference ------------------------------------------->

                        <div class="avail_ref tab-pane fade" id="avail_ref" role="tabpanel" aria-labelledby="avail_ref_tab">
                            <h3 class="prsnl_info_heading">Availability </h3>

                            <form id="preferences-info" class="proxima_nova_font" action="{{ url(route('user.save-profile', ['param' => 'preferences-info'])) }}"
                                method="post" enctype="multipart/form-data" class="d-flex flex-column">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Preferred Title/Role*" class="form-label">Preferred Title/Role*</label>
                                            <input type="text" class="form-control is-invalid input_text" id="Preferred Designation / Title / Role*"
                                                name="pref_title" placeholder="Enter Your Preferred Des / Title / Role" pattern="[0-9A-Za-z]+"
                                                minlength="1" maxlength="50" value="{{ $pref_title }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Employment Type*" class="form-label">Employment Type*</label>
                                            <select class="select2 form-select form-control is-invalid input_select old-select2"
                                                aria-label="Default select example" id="pref_emp_type" name="pref_emp_type" required>
                                                <option value="">Select Employment Type</option>
                                                @foreach ($employ_types as $row)
                                                    <option value="{{ $row->id }}" @if ($pref_emp_type == $row->id) selected @endif>
                                                        {{ ucfirst($row->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">

                                            <label for="preferred-industry" class="form-label-new form-label">Preferred Industries*</label>
                                            <div id="list-preferred-industry" class=" industry_cls d-none-new"></div>

                                            <div id="dropdown-container-new">
                                                <input type="hidden" id="selected-values-ids-new" name="pref_industry[]" value="">

                                                <div class="dropdown-new industry_option_dropdown">
                                                    <a class="dropdown-toggle-new dropdown-toggle industry_option">Select Preferred Industries Served</a>
                                                    <div class="dropdown-menu-new industry-check-box industry_option_dropdown_box">
                                                        @foreach ($groupedIndustries as $mainIndustry)
                                                            <div class="title-new" style="background: #d5d5d563; padding: 10px; font-weight: 600">
                                                                {{ $mainIndustry->name }}
                                                            </div>

                                                            @php
                                                                $sub_Catg = $industry->where('main_partent_id', $mainIndustry->id);
                                                            @endphp

                                                            @if (count($sub_Catg) != 0)
                                                                @foreach ($sub_Catg as $subIndustry)
                                                                    <div class="option-new custom-languages pt-1">
                                                                        <input type="checkbox" id="sub-industry-{{ $subIndustry->id }}"
                                                                        data-id="{{ $subIndustry->id }}" @if (in_array($subIndustry->id, json_decode($pref_industry_check, true))) checked @endif>
                                                                        <label for="sub-industry-{{ $subIndustry->id }}">{{ $subIndustry->name }}</label>

                                                                        @php
                                                                            $child_Catg = $industry->where('sub_parent_id', $subIndustry->id);
                                                                        @endphp

                                                                        @if (count($child_Catg) != 0)
                                                                            <div class="child-options-new">
                                                                                @foreach ($child_Catg as $childIndustry)
                                                                                <div class="field_option pt-1">
                                                                                    <input type="checkbox" id="child-industry-{{ $childIndustry->id }}" data-id="{{ $childIndustry->id }}" @if (in_array($childIndustry->id, json_decode($pref_industry_check, true))) checked @endif>
                                                                                    <label for="child-industry-{{ $childIndustry->id }}">{{ $childIndustry->name }}</label>
                                                                                </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Employment Type*" class="form-label">Desired Job Location*</label>
                                            <input type="text" class="form-control is-invalid input_text" id="Desired Job Location*"
                                                name="pref_location" pattern="[A-Za-z]+" minlength="1" maxlength="50"
                                                value="{{ $pref_location }}" placeholder="Enter your Desired Job Location"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="State" class="form-label d-block">Expected Salary (Per Annum) *</label>
                                            <div class="sallery_width1">
                                                <select class="select2 form-select form-control is-invalid input_select old-select2"
                                                    aria-label="Default select example" id="pref_salary_currency" name="pref_salary_currency" required>

                                                    @foreach ($currencies as $row)
                                                        <option value="{{ $row->id }}" @if ($pref_salary_currency == $row->id || ($row->id == '28' && $pref_salary_currency == null)) selected @endif>
                                                            <b>{{ $row->symbol }}</b>
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="sallery_width2">
                                                <input type="text" class="form-control is-invalid input_text" id="Expected-Salary"
                                                    name="pref_salary" placeholder="Enter Your Expected Salary" pattern="[0-9]+"
                                                    minlength="1" maxlength="50" value="{{ $pref_salary }}" required />
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="prsnl_info_heading prsnl_info_heading2">References</h3>
                                    @if (!empty($references_data))
                                        @foreach ($references_data as $index => $reference)
                                            <div class="row reference-row mt-4">
                                                <div class="col-md-6 mb-3">
                                                    <div class="position-relative form-group">
                                                        <label for="name" class="form-label">Name *</label>
                                                        <input type="text" class="form-control is-invalid input_text reference_name"
                                                            name="reference_name[]" placeholder="Enter Your Name" pattern="[A-Za-z]+"
                                                            minlength="1" maxlength="20" value="{{ $reference['reference_name'] }}"
                                                            required />
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <div class="position-relative form-group">
                                                        <label for="Phone" class="form-label">Phone *</label>
                                                        <input type="text" class="form-control is-invalid input_text reference_phone"
                                                            name="reference_phone[]" id="Phone{{ $index + 1 }}" placeholder="Enter your Phone Number" title="This Field is required" pattern="[\+]?[0-9\s]{5,16}" minlength="5"
                                                            maxlength="16" value="{{ $reference['reference_phone'] }}" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-12 add_more_div d-flex gap-3">
                                                    <button type="button" class="add_more add-reference-row">ADD MORE +</button>
                                                    <button type="button" class="remove_more remove-reference-row">REMOVE -</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="row reference-row mt-4">
                                            <div class="col-md-6 mb-3">
                                                <div class="position-relative form-group">
                                                    <label for="name" class="form-label">Name *</label>
                                                    <input type="text" class="form-control is-invalid input_text" id="name"
                                                        name="reference_name[]" placeholder="Enter Your Name" pattern="[A-Za-z]+"
                                                        minlength="1" maxlength="20" required />
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <div class="position-relative form-group">
                                                    <label for="Phone1" class="form-label">Phone *</label>
                                                    <input type="text" class="form-control is-invalid input_text reference_phone"
                                                        id="Phone1" name="reference_phone[]" placeholder="Enter your Phone Number"
                                                        pattern="[0-9]+" minlength="10" maxlength="16" required />
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <button type="button" class="add_more add-reference-row">Add More +</button>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="purple_btn text-start">
                                    <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                </div>
                            </form>
                        </div>

<!---------------------------------------- Availability and Reference ------------------------------------------->

<!-------------------------------------------- Work Authorization ----------------------------------------------->

                        <div class="wrk_auth tab-pane fade" id="wrk_auth" role="tabpanel" aria-labelledby="wrk_auth_tab">
                            <h3 class="prsnl_info_heading">Work Authorization</h3>
                            <form id="work-authorization" class="proxima_nova_font" action="{{ url(route('user.save-profile', ['param' => 'work-authorization'])) }}"
                                method="post" enctype="multipart/form-data" class="d-flex flex-column">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="Legal Authorization to work status" class="form-label">Legal
                                                Authorization to work status</label>
                                            <select class="select2 form-select form-control is-invalid input_select old-select2"
                                                aria-label="Default select example" id="Legal Authorization to work status*"
                                                name="work_authorization_status" required>
                                                <option value="">Select work status</option>
                                                <option value="1" @if ($work_authorization_status == 1) selected @endif>Yes</option>
                                                <option value="0" @if ($work_authorization_status == 0) selected @endif>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="Availability" class="form-label">Availability
                                            </label>
                                            <select class="select2 form-select form-control is-invalid input_select old-select2"
                                                aria-label="Default select example" id="Availability" name="availability" required>
                                                <option value="">Select Availability</option>
                                                <option value="1" @if ($availability == 1) selected @endif>Yes</option>
                                                <option value="0" @if ($availability == 0) selected @endif>No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Employment Type*" class="form-label">Notice Period</label>
                                            <select class="select2 form-select form-control is-invalid input_select old-select2"
                                                aria-label="Default select example" id="notice_period_duration" name="notice_period_duration" required>
                                                <option value="">Select Notice Period</option>
                                                @foreach ($notice_period_list as $row)
                                                    <option value="{{ $row->id }}" @if ($notice_period_check == $row->id) selected @endif>
                                                        {{ ucfirst($row->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form>
                        </div>

<!-------------------------------------------- Work Authorization ----------------------------------------------->

<!--------------------------------------------- Social Media Link ----------------------------------------------->

                        <div class="social_media tab-pane fade" id="social_media" role="tabpanel" aria-labelledby="social_media_tab">
                            <h3 class="prsnl_info_heading">Social Media Links</h3>
                            <form id="social-media-info" class="proxima_nova_font" action="{{ url(route('user.save-profile', ['param' => 'social-media-info'])) }}"
                                method="post" enctype="multipart/form-data" class="d-flex flex-column">

                                <div class="row">
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="linkedin" class="form-label">linkedin</label>
                                            <img src="/assets/images/linkedin_icon.svg" alt="" class="input_icon linkedin_icon">
                                            <input type="text" class="form-control is-invalid input_text" id="Linkdin" name="linkdin" placeholder="Enter Your Linkedin URL" value="{{ $linkedin }}" pattern="https://www.linkedin.com/[a-zA-Z0-9_.]+"/>
                                            <!-- {{-- <img src="images/linkedin.png" alt="" class="input_icon" /> --}} -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Twitter" class="form-label">Twitter</label>
                                            <img src="/assets/images/twitter_icon.svg" alt="" class="input_icon twitter_icon">
                                            <input type="text" class="form-control is-invalid input_text" id="Twitter"
                                                name="twitter" placeholder="Enter Your X URL" value="{{ $twitter }}" pattern="https://twitter.com/[a-zA-Z0-9_]+"/>
                                            <!-- {{-- <img src="images/x.png" alt="" class="input_icon" /> --}} -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Instagram" class="form-label">Instagram</label>
                                            <img src="/assets/images/instagram_icon.svg" alt="" class="input_icon insta_icon">
                                            <input type="text" class="form-control is-invalid input_text" id="Instagram"
                                                placeholder="Enter Your Instagram URL" value="{{ $instagram }}" name="instagram" pattern="https://www.instagram.com/[a-zA-Z0-9_.]+">
                                            {{-- <img src="images/instagram.png" alt="" class="input_icon" /> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Facebook" class="form-label">Facebook</label>
                                            <img src="/assets/images/facebook_icon.svg" alt="" class="input_icon facebook_icon">
                                            <input type="text" class="form-control is-invalid input_text" id="Facebook"
                                                placeholder="Enter Your Facebook URL" value="{{ $facebook }}" name="facebook" pattern="https://www.facebook.com/[a-zA-Z0-9.]+"/>
                                            {{-- <img src="images/facebook.png" alt="" class="input_icon" /> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="position-relative form-group">
                                            <label for="others" class="form-label">Others</label>
                                            <input type="text" class="form-control is-invalid input_text" id="others" placeholder="Enter Your Other URL" value="{{ $other }}" name="other" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-md-12 purple_btn">
                                    <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                </div>
                            </form>
                        </div>

<!--------------------------------------------- Social Media Link ----------------------------------------------->

                    </div>
                </main>
            </div>
        </div>
    </div>
</section>
@endsection
@section('component.scripts')
<script>
/*--------------------- Forms Ajax ------------------*/

    function bindFormSubmit(selector, handler) {
        initValidate(selector);
        $(selector).on('submit', function(e) {
            var form = $(this);

            // Special check for #social-media-info
            if (selector === '#social-media-info') {
                // Check if all non-required fields are empty
                var allEmpty = true;
                form.find('input, textarea, select').each(function () {
                    var field = $(this);
                    if (!field.prop('required') && field.val().trim() !== '') {
                        allEmpty = false; // At least one non-required field is filled
                        return false; // Break loop
                    }
                });

                if (allEmpty) {
                    e.preventDefault(); // Prevent submission if all non-required fields are empty
                    alert('Please fill out at least one field before submitting.');
                    return;
                }
            }

            // Log the form data to console
            // console.log('Form Data:');
            // form.find('input, textarea, select').each(function () {
            //     var field = $(this);
            //     console.log(`${field.attr('name') || 'Unnamed field'}: ${field.val()}`);
            // });

            ajax_form_submit(e, form, handler);
        });
    }

    var responseHandler = function (response) {
        // setTimeout(function () {
        //     location.reload();
        // }, 100);
    };

    // Bind forms with the corresponding response handlers
    bindFormSubmit('#personal-info', responseHandler);
    bindFormSubmit('#change-password', responseHandler);
    bindFormSubmit('#personal-work-info', responseHandler);
    bindFormSubmit('#education-info', responseHandler);
    bindFormSubmit('#certifications-info', responseHandler);
    bindFormSubmit('#preferences-info', responseHandler);
    bindFormSubmit('#work-authorization', responseHandler);
    bindFormSubmit('#social-media-info', responseHandler);

/*---------------------  Forms ------------------*/

    $(document).ready(function () {

/*--------------------- API forms ------------------*/
        var typingTimer;
        var typingDelay = 1200; // 1.2 seconds delay

        $('#pincode').on('keyup', function () {
            clearTimeout(typingTimer);
            var postalCode = $(this).val();

            if (postalCode.length === 0) {
                $('#country_name').val('');
                $('#city').val('');
                $('#state').val('');
            }


            if (postalCode.length > 0) {
                typingTimer = setTimeout(function () {
                    $.ajax({
                        url: 'https://secure.geonames.org/postalCodeSearchJSON',
                        dataType: 'json',
                        data: {
                            postalcode: postalCode,
                            country: '',
                            username: 'umair.makent'
                        },
                        success: function (data) {
                            if (data.postalCodes.length > 0) {
                                $('#country_name').val(data.postalCodes[0].countryCode).focus();
                                $('#city').val(data.postalCodes[0].adminName2).focus();
                                $('#state').val(data.postalCodes[0].adminName1).focus();
                                $('#pincode').focus();

                                // $('#placeName').val(data.postalCodes[0].placeName);

                                // Display response in a pretty format
                                var responseHtml = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
                                $('#response').html(responseHtml);
                            } else {
                                // alert('Postal code not found');
                            }
                        },
                        error: function () {
                            // alert('Error fetching data');
                        }
                    });
                }, typingDelay);
            }
        });
/*--------------------- API forms ------------------*/

        // Add row functionality
        $(document).on('click', '.add-row-certificate', function (e) {
            e.preventDefault(); // Prevent form submission
            var newRow = $('.certificate-row').first().clone(); // Clone the first row
            // Clear input values in the cloned row
            newRow.find('input').each(function () {
                $(this).val('');
            });
            newRow.find('.add_more_div').remove(); // Remove add button from the cloned row
            // newRow.find('.add-row-certificate').remove(); // Remove add button from the cloned row
            // newRow.find('.remove-row-certificate').remove(); // Remove add button from the cloned row
            newRow.append('<div class="col-md-6 d-flex gap-3 add_more_div"><button type="button" class="add_more add-row-certificate">ADD MORE +</button><button type="button" class="remove_more remove-row-certificate">REMOVE -</button></div>'); // Add new add and remove buttons
            $('.certificate-row').last().after(newRow); // Append the cloned row at the end
        });

        // Remove row functionality
        $(document).on('click', '.remove-row-certificate', function (e) {
            e.preventDefault(); // Prevent form submission
            if ($('.certificate-row').length > 1) {
                $(this).closest('.certificate-row').remove(); // Remove the closest row
            } else {
                alert('At least one row is required.'); // Alert if only one row is left
            }
        });


        // Add row for Education
        $(document).on('click', '.add-edu-row', function () {
            var newRow = $('.education-row').first().clone(); // Clone the first row
            // Clear input values in the cloned row
            newRow.find('input').each(function () {
                $(this).val('');
            });
            newRow.find('.add_more_div').remove(); // Remove|add button removing from the cloned row
            // newRow.find('.add-edu-row').remove(); // Remove add button from the cloned row
            newRow.append('<div class="col-md-12 d-flex gap-3 add_more_div"><button type="button" class="add_more add-edu-row">ADD MORE +</button><button type="button" class="remove_more remove-edu-row">REMOVE -</button></div>'); // Add new add and remove buttons
            $('.education-row').last().after(newRow); // Append the cloned row at the end
        });

        // Remove row functionality
        $(document).on('click', '.remove-edu-row', function () {
            if ($('.education-row').length > 1) {
                $(this).closest('.education-row').remove(); // Remove the closest row
            } else {
                alert('At least one row is required.'); // Alert if only one row is left
            }
        });

        // Add row for Education
        var rowIndex = $('.reference-row').length; // Initialize with the number of existing rows

        // Function to update IDs and initialize intlTelInput
        function updateIDsAndInitialize() {
            $('.reference-row').each(function(index) {
                var phoneInput = $(this).find('.reference_phone');
                phoneInput.attr('id', 'Phone' + (index + 1));
                phoneInput.intlTelInput({
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                });

                document.getElementById('Phone' + (index + 1)).addEventListener('input', function (event) {
                    this.value = this.value.replace(/[^0-9+ ]/g, '');
                });

            });
        }

        // Add row functionality for references
        $(document).on('click', '.add-reference-row', function () {
            var newRow = $('.reference-row').first().clone(); // Clone the first row
            newRow.find('input').val(''); // Clear input values in the cloned row
            newRow.find('.add_more_div').remove(); // Remove add button from the cloned row
            // newRow.find('.add-reference-row').remove(); // Remove add button from the cloned row
            newRow.append('<div class="col-md-12 add_more_div d-flex gap-3"><button type="button" class="add_more add-reference-row">ADD MORE +</button><button type="button" class="remove_more remove-reference-row">REMOVE -</button></div>');
            $('.reference-row').last().after(newRow); // Append the cloned row at the end
            rowIndex++; // Increment row index
            updateIDsAndInitialize(); // Update IDs and initialize intlTelInput
        });

        // Remove row functionality for references
        $(document).on('click', '.remove-reference-row', function () {
            if ($('.reference-row').length > 1) {
                $(this).closest('.reference-row').remove(); // Remove the closest row
                rowIndex--; // Decrement row index
                updateIDsAndInitialize(); // Update IDs and initialize intlTelInput
            } else {
                alert('At least one reference is required.'); // Alert if only one row is left
            }
        });

        updateIDsAndInitialize(); // Initial ID update and intlTelInput initialization


    });


    $('#skills-data').on('focusout', function() {
        $('#option-skills').addClass('d-none');
    });

    function skill_dropdown(){
        $('#skills-data').select2({
            placeholder: 'Select Key Relevant Skills',
            minimumInputLength: 2,
            tags: true,
            ajax: {
                url: '{{ url(route('get.skills')) }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term // search term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.name
                            }
                        })
                    };
                },
                cache: true
            }
        });
    }

    $(document).ready(function() {
        let selectedSkillsOrder = [];
        let updating = false; // Flag to prevent recursive loop

        skill_dropdown();

        $('#skills-data').on('change', function() {
            if (updating) return; // Prevent recursive call
            const selectedSkills = $(this).val() || [];
            // console.log(selectedSkills);
            selectedSkillsOrder = selectedSkillsOrder.filter(skill => selectedSkills.includes(skill));
            selectedSkills.forEach(skill => {
                if (!selectedSkillsOrder.includes(skill)) {
                    selectedSkillsOrder.push(skill);
                }
            });
            // console.log(selectedSkillsOrder);
            renderSkills();
            loadRelatedSkills(selectedSkillsOrder[selectedSkillsOrder.length - 1]);
        });

        function renderSkills() {
            updating = true; // Set flag to prevent recursive call
            const $select = $('#skills-data');
            const options = selectedSkillsOrder.map(skill => `<option value="${skill}" selected>${skill}</option>`);
            $select.html(options.join('')).trigger('change');
            updating = false; // Reset flag
        }

        function loadRelatedSkills(skill) {
            if (skill) {
                $.ajax({
                    url: '/related-skills',
                    data: { skill: skill },
                    success: function(data) {
                        let optionsHtml = '';
                        data.forEach(function(skill) {
                            optionsHtml += '<li class="list-group-item">' + skill.name + '</li>';
                        });
                        $('#option-skills').html('<ul class="list-group">' + optionsHtml + '</ul>').removeClass('d-none');
                    }
                });
            } else {
                $('#option-skills').addClass('d-none');
            }
        }

        $('#option-skills').on('click', 'li', function() {
            const skillText = $(this).text();
            if (!selectedSkillsOrder.includes(skillText)) {
                selectedSkillsOrder.push(skillText);
                renderSkills();
            }
            $('#option-skills').addClass('d-none');
            loadRelatedSkills(skillText)
        });
    });

    $(document).on('click', function(event) {
        var $optionSkills = $('#option-skills');
        if (!$optionSkills.is(event.target) && $optionSkills.has(event.target).length === 0) {
            $optionSkills.addClass('d-none');
        }
    });

</script>
<script>
    function setupDropdown({
        dropdownContainerId,
        toggleClass,
        menuClass,
        hiddenInputId,
        listId,
        hiddenListClass,
        childOptionClass,
        mainOptionClass
    }) {
        const listElement = document.getElementById(listId);
        const hiddenInput = document.getElementById(hiddenInputId);

        function processList(input) {
            listElement.innerHTML = ''; // Clear the list

            if (!input.trim()) {
                listElement.classList.add(hiddenListClass);
                return;
            }

            const items = input.split(',').map(item => item.trim());

            items.forEach(item => {
                const li = document.createElement('li');
                li.textContent = item;
                listElement.appendChild(li);
            });

            listElement.classList.remove(hiddenListClass);
        }

        $(document).ready(function () {
            // Show/hide dropdown menu
            $(toggleClass).click(function () {
                $(menuClass).toggle();
            });

            function updateMainCheckbox(mainCheckbox) {
                const hasCheckedChild = $(mainCheckbox)
                    .siblings(childOptionClass)
                    .find('input[type="checkbox"]:checked').length > 0;

                $(mainCheckbox).prop('checked', hasCheckedChild);
            }

            function updateList() {
                const selectedLabels = [];
                const selectedIds = [];

                $(`${dropdownContainerId} input[type="checkbox"]:checked`).each(function () {
                    selectedLabels.push($(this).next('label').text());
                    selectedIds.push($(this).data('id'));
                });

                hiddenInput.value = selectedIds.join(', '); // Update hidden input
                processList(selectedLabels.join(', ')); // Update the list
            }

            // Handle child checkbox changes
            $(`${dropdownContainerId}`).on('change', `${childOptionClass} input[type="checkbox"]`, function () {
                const mainCheckbox = $(this).closest(mainOptionClass).find('input[type="checkbox"]').first();
                updateMainCheckbox(mainCheckbox);
                updateList();
            });

            // Handle main checkbox changes
            $(`${dropdownContainerId}`).on('change', `${mainOptionClass} > input[type="checkbox"]`, function () {
                const isChecked = $(this).prop('checked');
                $(this).siblings(childOptionClass).find('input[type="checkbox"]').prop('checked', isChecked);
                updateList();
            });

            // Close dropdown when clicking outside
            $(document).click(function (event) {
                if (!$(event.target).closest(menuClass).length && !$(event.target).closest(toggleClass).length) {
                    $(menuClass).hide();
                }
            });

            updateList(); // Initial list update
        });
    }

    // Initialize the dropdowns
    setupDropdown({
        dropdownContainerId: '#dropdown-container',
        toggleClass: '.dropdown-toggle',
        menuClass: '.dropdown-menu',
        hiddenInputId: 'selected-values-ids',
        listId: 'list-industry',
        hiddenListClass: 'd-none',
        childOptionClass: '.child-options',
        mainOptionClass: '.option'
    });

    setupDropdown({
        dropdownContainerId: '#dropdown-container-new',
        toggleClass: '.dropdown-toggle-new',
        menuClass: '.dropdown-menu-new',
        hiddenInputId: 'selected-values-ids-new',
        listId: 'list-preferred-industry',
        hiddenListClass: 'd-none-new',
        childOptionClass: '.child-options-new',
        mainOptionClass: '.option-new'
    });
</script>

@endsection
