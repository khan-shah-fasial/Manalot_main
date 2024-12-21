@extends('frontend.layouts.app')

@section('page.title', 'Manalot')

@section('page.description', '')

@section('page.type', 'website')

@section('page.content')

@php
// session()->forget('step');

    if(!Session::has('step')){
        Session()->put('step', 1);
    }

    $user_detail = DB::table('userdetails')
    ->where('user_id', Session::get('temp_user_id'))
    ->get()->first();

    $user = DB::table('users')
        ->where('id', Session::get('temp_user_id'))
        ->get(['email'])
        ->first();
        
    // $experience_status = DB::table('experience_status')->where('status', 1)->get();

    $employ_types = DB::table('employ_types')->where('status', 1)->get();

    $notice_period_list = DB::table('notice_period')->where('status', 1)->get();

    $years_of_exp = DB::table('years_of_exp')->where('status', '1')->get();
    // $job_title = DB::table('job_title')->where('status', '1')->get();
    
    $industry = DB::table('industry')->where('status', '1')->get();
    // $groupedIndustries = $industry->groupBy('parent_id');
    $groupedIndustries = $industry->where('main', 1);

    $skills = DB::table('skills')->where('status', '1')->get();

    $currencies = DB::table('currencies')->get(['id','symbol']);

    // $references_from = DB::table('references_from')->where('status', '1')->get();

    $fullname = isset($user_detail->fullname) ? $user_detail->fullname : null;
    $gender = isset($user_detail->gender) ? $user_detail->gender : null;
    $profile_photo = isset($user_detail->profile_photo) ? $user_detail->profile_photo : null;
    $dob = isset($user_detail->dob) ? $user_detail->dob : null;
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
    $address = isset($user_detail->address) ? $user_detail->address : null;

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

    $linkdin = isset($user_detail->linkdin) ? $user_detail->linkdin : null;
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
                            <!-- <form class="proxima_nova_font">
                                <div class="row">
                                    
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
                                    
                                    <div class="col-md-12">
                                        <label for="headline" class="form-label">Headline</label>
                                        <textarea type="text" class="form-control" id="headline" rows="1"></textarea>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="profilePhoto" class="form-label">Profile Photo</label>
                                        <input type="file" class="form-control choose_img_file" id="profilePhoto">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dob" class="form-label">Date of Birth*</label>
                                        <input type="date" class="form-control is-invalid input_text register_date_field" id="Date2" name="dob" placeholder="Date" required="">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="zipCode" class="form-label">Zip/Postal Code*</label>
                                        <input type="text" class="form-control" id="zipCode">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="city" class="form-label">City*</label>
                                        <input type="text" class="form-control" id="city">
                                    </div>
                                    
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
                                    
                                    <div class="col-md-12">
                                        <label for="address" class="form-label">Address*</label>
                                        <textarea class="form-control" id="address" rows="1"></textarea>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone*</label>
                                        <input type="tel" class="form-control" id="phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address*</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <label for="about" class="form-label">About*</label>
                                        <textarea class="form-control" id="about" rows="3"></textarea>
                                    </div>
                                    
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form> -->

                            <form id="personal-info" action="{{ url(route('account.create', ['param' => 'personal-info'])) }}"
                                method="post" enctype="multipart/form-data" class="d-flex flex-column">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="first_name" class="form-label">Full Name *</label>
                                            <input type="text" class="form-control is-invalid input_text" name="fullname"
                                                id="fullname" placeholder="Enter First Name" pattern="[A-Za-z]+" minlength="1"
                                                maxlength="255" value="{{ isset($fullname) ? $fullname : (Session::has('google_name') ? Session::get('google_name') : 'John') }}" required />
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
                                        <textarea type="text" class="form-control" id="headline" rows="1">Listed as Most Innovative Leadership Advisory Firm – APAC 2024 I Featured as a Top 10 Influential Leader...</textarea>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="formFile" class="form-label" id="profile_photo">Profile Photo {{--<span class="leble_size">(png, jpg)</span>--}}</label>
                                            @if (!empty($profile_photo) && $profile_photo != null)
                                                <!-- {{--<a class="pdf_view" target="_blank"
                                                    href="{{ asset('storage/' . $profile_photo) }}">
                                                    View
                                                </a> --}} -->
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
                                                name="dob" placeholder="Date" value="{{ $dob }}" max="{{ date('Y-m-d') }}"
                                                required />
                                        </div>
                                    </div>
                                    {{-- <!-- <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="email" class="form-label">Email Address*</label>
                                            <input type="email" class="form-control is-invalid input_text" id="email" name="email"
                                                placeholder="Enter Your Email" value="{{ $user->email }}" required />
                                        </div>
                                    </div> -->

                                    <!-- <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Phone" class="form-label">Phone*</label>
                                            <input type="number" class="form-control is-invalid input_text" id="Phone" name="phone_number"
                                                placeholder="Enter Your Phone No" pattern="[0-9]+" minlength="10" maxlength="10"
                                                value="{{ $user_detail->phone_number }}" required />
                                        </div>
                                    </div> --> --}}
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="zip_code" class="form-label">Zip/Postal Code*</label>
                                            <input type="text" class="form-control is-invalid input_text" id="pincode"
                                                name="pincode" pattern="[0-9A-Za-z]+" minlength="1" maxlength="10"
                                                placeholder="Enter Your zipcode / Pincode" value="{{ $pincode }} 400070" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="city" class="form-label">City*</label>
                                            <input type="text" class="form-control is-invalid input_text" id="city"
                                                name="city" pattern="[A-Za-z]+" minlength="3" maxlength="50"
                                                placeholder="Enter Your City" value="{{ $city }} Mumbai" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="country_name" class="form-label">Country*</label>
                                            <input type="text" value="{{ isset($country) ? $country : 'India' }}"
                                                class="form-control is-invalid input_text" id="country_name" name="country"
                                                placeholder="Enter Your country" required />
                                            {{--
                                            <select class="form-select form-control is-invalid  input_select" aria-label="Default select example"
                                                id="country_name" name="country">
                                                <option value="">Select Country</option>
                                                @foreach ($country as $row)
                                                    <option value="{{ $row->id }}" @if ($country == $row->id) selected @endif>
                                                        {{ ucfirst($row->name) }}</option>
                                                @endforeach
                                            </select>
                                            --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="State" class="form-label">State*</label>
                                            <input type="text" value="{{ isset($state) ? $state : 'Maharashtra' }}"
                                                class="form-control is-invalid input_text" id="state" name="state"
                                                placeholder="Enter Your State" required />
                                            {{--
                                            <select class="form-select form-control is-invalid  input_select" aria-label="Default select example" id="State"
                                                name="state">
                                                <option value="">Select State</option>
                                                @foreach ($state as $row)
                                                    <option value="{{ $row->id }}" @if ($user_detail->state == $row->id) selected @endif>
                                                        {{ ucfirst($row->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            --}}
                                        </div>
                                    </div>


                                    <div class="col-md-12 mb-12">
                                        <div class="position-relative form-group">
                                            <label for="address" class="form-label">Address*</label>
                                            {{-- <input type="text" class="form-control is-invalid input_text" id="address" pattern="[0-9A-Za-z]+"
                                                minlength="5" maxlength="250" name="address" placeholder="Enter your Address"
                                                value="{{ $address }}" required /> --}}

                                            <textarea class="form-control is-invalid" rows="1" name="address" id="address" pattern="[0-9A-Za-z]+" placeholder="Address">{{ $address }} 407, Avighna Park, Malad</textarea>

                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Phone" class="form-label">Phone *</label>
                                            <input type="text" class="form-control is-invalid input_text" id="Mobile"
                                                name="phone_number" placeholder="Enter your Phone Number" title="This Field is required" pattern="[0-9]+" minlength="5"
                                                maxlength="16" value="+91 987654321" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="email" class="form-label">Email Address*</label>
                                            <!-- <img src="/assets/images/email.png" alt="" class="input_icon" /> -->
                                            <input type="email" class="form-control is-invalid input_text" id="email" name="email"
                                                placeholder="Enter Your email" required {{-- @if (Session::has('google_email') && Session::get('google_login') == 1) 
                                                value="{{ Session::get('google_email') }}" readonly @endif--}} value="johndeo@gmail.com" />
                                        </div>
                                    </div>

                                    <!-- About -->
                                    <div class="col-md-12">
                                        <label for="about" class="form-label">About*</label>
                                        <textarea class="form-control" id="about" rows="3">As a versatile and dedicated human resource professional, I bring a wealth of experience as a seasoned consultant in providing global leadership advisory services. With a keen understanding of the intricate dynamics of leading...</textarea>
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




<!---------------------------------------------- Work Experience ---------------------------------------------->
                        
                        <div class="wrk_exp tab-pane fade" id="wrk_exp" role="tabpanel" aria-labelledby="wrk_exp_tab">
                            <h3 class="prsnl_info_heading">Work Experience</h3>
                            <!-- <form class="proxima_nova_font">
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
                                    
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form> -->

                            <form id="personal-work-info" action="{{ url(route('account.create', ['param' => 'personal-work-info'])) }}"
                                method="post" enctype="multipart/form-data" class="d-flex flex-column">
                                @csrf                            

                                    
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="job_title" class="form-label">Professional Title*</label>
                                            <input type="text" class="form-control is-invalid input_text" id="job_title"
                                                name="wrk_exp__title" placeholder="Enter your Job Title" pattern="[A-Za-z]+"
                                                minlength="2" maxlength="100" value="{{ $wrk_exp__title }} UI/UX Designer" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="company" class="form-label">Company Name*</label>
                                            <input type="text" class="form-control is-invalid input_text" id="company"
                                                name="wrk_exp_company_name" placeholder="Enter your Company Name" pattern="[A-Za-z]+"
                                                minlength="1" maxlength="100" value="{{ $wrk_exp_company_name }} Nexgeno Technology Pvt Ltd"
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


                                        <label for="industry" class="form-label">Industry*</label>
                                        <select class="form-select" id="industry"> 
                                            <option>Web Desing</option>
                                            <option>UI/UX Desing</option>
                                            <option>Web Developement</option>
                                        </select>

                                        <!-- <div id="list-industry" class="d-none">
                        
                                        </div> -->
                                        
                                        <!-- <div id="dropdown-container">
                                            {{-- <div id="selected-values">Selected values will be shown here.</div> --}}
                                            <input type="hidden" id="selected-values-ids" name="industry[]" value="">


                                            <div class="dropdown industry_option_dropdown">
                                                <a class="dropdown-toggle industry_option"></a>
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
                                        </div> -->


                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <div class="position-relative form-group">
                                            <label for="skills" class="form-label">Skills*</label>
                                            <input type="text" class="form-control" id="skills">
                                            {{-- <select name="skill[]" multiple="multiple"
                                                class="select2 form-select form-control is-invalid input_select"
                                                aria-label="Default select example" id="skills-data" required>
                                                <option value=""> </option>
                                                @foreach ($skills as $row)
                                                    <option value="{{ $row->name }}"
                                                        @if (in_array($row->name, json_decode($skill_check, true))) selected @endif>
                                                        {{ ucfirst($row->name) }}
                                                    </option>
                                                @endforeach
                                            </select> --}}
                                        </div>
                                    </div>

                                    <div class="d-none" id="option-skills"></div>

                                    <div class="col-md-12 pt-4">
                                        <div class="form-group">
                                            <label for="Responsibilities" class="form-label">Responsibilities/Achievements*</label>
                                            <textarea class="form-control is-invalid" rows="4" cols="45" name="wrk_exp_responsibilities"
                                                placeholder="Message" required>{{ $wrk_exp_responsibilities }}Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat </textarea>
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

                            <!-- <form class="proxima_nova_font">
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
                                        <button class="add_more" href="">ADD MORE +</button>
                                    </div>
                                    
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form> -->

                            <form id="skills-info" action="{{ url(route('account.create', ['param' => 'certifications-info'])) }}"
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

                                                @if ($index === 0)
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-success add-edu-row">Add More +</button>
                                                    </div>
                                                @else
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-danger remove-edu-row">Remove -</button>
                                                    </div>
                                                @endif
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
                                                    {{-- <input type="text" class="form-control is-invalid input_text certificate_name"
                                                        name="edu_graduation_year[]" placeholder="Enter Your Graduation Year"
                                                        pattern="[0-9A-Za-z]+" minlength="1" maxlength="100" required
                                                    /> --}}
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
                            <!-- <form class="proxima_nova_font">
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
                                    
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form> -->

                            <form id="skills-info" action="{{ url(route('account.create', ['param' => 'certifications-info'])) }}"
                                method="post" enctype="multipart/form-data" class="d-flex flex-column">
                                @csrf
                                @if (!empty($certificate_data))
                                    @foreach ($certificate_data as $index => $certificate)
                                        <div class="row certificate-row cirtificate_pdd">
                                            <div class="col-md-12 mb-4">
                                                <div class="position-relative form-group">
                                                    <label for="Certificate" class="form-label">Certificate Name</label>
                                                    <input type="text" class="form-control is-invalid input_text certificate_name"
                                                        name="certificate_name[]" placeholder="Enter Your Certificate Name"
                                                        pattern="[0-9A-Za-z]+" minlength="1" maxlength="100"
                                                        value="{{ $certificate['certificate_name'] }} Completion of Figma Mega Course " />
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="position-relative form-group">
                                                    <label for="Date Obtained*" class="form-label">Date Obtained</label>

                                                    <input type="date" class="form-control is-invalid input_text certificate_obtn_date register_date_field" max="{{ date('Y-m-d') }}"
                                                        name="certificate_obtn_date[]" placeholder="Date"
                                                        value="{{ $certificate['certificate_obtn_date'] }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="position-relative form-group">
                                                    <label for="Issuing Registration*" class="form-label">Issuing Organization</label>
                                                    <input type="text" class="form-control is-invalid input_text certificate_issuing"
                                                        name="certificate_issuing[]" placeholder="Enter your Issuing Registration"
                                                        pattern="[0-9A-Za-z]+" minlength="1" maxlength="50"
                                                        value="{{ $certificate['certificate_issuing'] }} Lorem Ipsum" />
                                                </div>
                                            </div>

                                            @if ($index === 0)                                                
                                                <div class="col-md-6 add_more_div">
                                                    <button class="add_more" href="">ADD MORE +</button>
                                                </div>   
                                            @else
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-danger remove-row">Remove -</button>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row certificate-row cirtificate_pdd">
                                        <div class="col-md-12 mb-4">
                                            <div class="position-relative form-group">
                                                <label for="Certificate" class="form-label">Certificate Name</label>
                                                <input type="text" class="form-control is-invalid input_text certificate_name"
                                                    name="certificate_name[]" placeholder="Enter Your Certificate Name"
                                                    pattern="[0-9A-Za-z]+" minlength="1" maxlength="50" value="Completion of Figma Mega Course "/>
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
                                                    pattern="[0-9A-Za-z]+" minlength="1" maxlength="50" value="Lorem Ipsum"/>
                                            </div>
                                        </div>

                                        <div class="col-md-6 add_more_div">
                                            <button class="add_more" href="">ADD MORE +</button>
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
                            <!-- <form class="proxima_nova_font">
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
                                        <button class="add_more" href="">ADD MORE +</button>
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
                                    
                                    <div class="col-md-12 purple_btn">
                                        <button type="submit" class="prsnl_inf_updt_btn">update</button>
                                    </div>
                                </div>
                            </form> -->

                            <form id="preferences-info proxima_nova_font" action="{{ url(route('account.create', ['param' => 'preferences-info'])) }}"
                                method="post" enctype="multipart/form-data" class="d-flex flex-column">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Preferred Title/Role*" class="form-label">Preferred Title/Role*</label>
                                            <input type="text" class="form-control is-invalid input_text" id="Preferred Designation / Title / Role*"
                                                name="pref_title" placeholder="Enter Your Preferred Des / Title / Role" pattern="[0-9A-Za-z]+"
                                                minlength="1" maxlength="50" value="{{ $pref_title }} UI/UX Designer" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Employment Type*" class="form-label">Employment Type*</label>
                                             <input type="text" class="form-control is-invalid input_text" id="Employment Type*"
                                                name="pref_emp_type" placeholder="Enter your Employment Type" pattern="[A-Za-z]+"
                                                minlength="1" maxlength="50" value="{{ $pref_emp_type }} Full Time" required />

                                            {{--<select class="select2 form-select form-control is-invalid input_select old-select2"
                                                aria-label="Default select example" id="pref_emp_type" name="pref_emp_type" required>
                                                <option value="">Select Employment Type</option>
                                                @foreach ($employ_types as $row)
                                                    <option value="{{ $row->id }}" @if ($pref_emp_type == $row->id) selected @endif>
                                                        {{ ucfirst($row->name) }}
                                                    </option>
                                                @endforeach
                                            </select>--}}
                                        </div>
                                    </div>


                                    


                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Desired Job Location*" class="form-label">Preferred Industry*</label>
                                            <input type="text" class="form-control is-invalid input_text" id="Preferred Industry"
                                                name="pref_location" pattern="[A-Za-z]+" minlength="1" maxlength="50"
                                                value="{{-- {{ $pref_location }} --}} IT" placeholder="Enter your Preferred Industry"
                                                required />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Employment Type*" class="form-label">Desired Job Location*</label>
                                            <input type="text" class="form-control is-invalid input_text" id="Desired Job Location*"
                                                name="pref_location" pattern="[A-Za-z]+" minlength="1" maxlength="50"
                                                value="{{ $pref_location }} Mumbai" placeholder="Enter your Desired Job Location"
                                                required />
                                            {{--<select class="select2 form-select form-control is-invalid input_select old-select2"
                                                aria-label="Default select example" id="notice_period_duration" name="notice_period_duration" required>
                                                <option value="">Select Notice Period</option>
                                                @foreach ($notice_period_list as $row)
                                                    <option value="{{ $row->id }}" @if ($notice_period_check == $row->id) selected @endif>
                                                        {{ ucfirst($row->name) }}
                                                    </option>
                                                @endforeach
                                            </select>--}}
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="State" class="form-label d-block">Expected Salary*</label>
                                            {{-- <div class="sallery_width1">
                                            
                                                 <select class="select2 form-select form-control is-invalid input_select old-select2"
                                                    aria-label="Default select example" id="pref_salary_currency" name="pref_salary_currency" required>
                                                    
                                                    @foreach ($currencies as $row)
                                                        <option value="{{ $row->id }}" @if ($pref_salary_currency == $row->id || ($row->id == '28' && $pref_salary_currency == null)) selected @endif>
                                                            <b>{{ $row->symbol }}</b>
                                                        </option>
                                                    @endforeach
                                                </select> 
                                            </div> --}}
                                            <div class="sallery_width2">
                                                <input type="text" class="form-control is-invalid input_text" id="Expected-Salary"
                                                    name="pref_salary" placeholder="Enter Your Expected Salary" pattern="[A-Za-z]+"
                                                    minlength="1" maxlength="50" value="{{ $pref_salary }} 5LPA" required />
                                            </div> 
                                        </div>
                                    </div>
                                

                                    <h3 class="prsnl_info_heading prsnl_info_heading2">References</h3>
                                    @if (!empty($references_data))
                                        @foreach ($references_data as $index => $reference)
                                            <div class="row reference-row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="position-relative form-group">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" class="form-control is-invalid input_text reference_name"
                                                            name="reference_name[]" placeholder="Enter Your Name" pattern="[A-Za-z]+"
                                                            minlength="1" maxlength="20" value="{{ $reference['reference_name'] }} Lorem Ipsum"
                                                            required />
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <div class="position-relative form-group">
                                                        <label for="Phone{{ $index + 1 }}" class="form-label">Mobile No</label>
                                                        <input type="text" class="form-control is-invalid input_text reference_phone"
                                                            name="reference_phone[]" id="Phone{{ $index + 1 }}"
                                                            placeholder="Enter your Phone Number" title="This Field is required" pattern="[0-9]+" minlength="5"
                                                            maxlength="16" value="{{ $reference['reference_phone'] }} 9865121545" required />
                                                    </div>
                                                </div>

                                                @if ($index === 0)
                                                <div class="col-md-6 add_more_div">
                                                    <button class="add_more" href="">ADD MORE +</button>
                                                </div>
                                                @else
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-danger remove-reference-row">Remove
                                                            -</button>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="row reference-row">
                                            <div class="col-md-6 mb-3">
                                                <div class="position-relative form-group">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control is-invalid input_text" id="name"
                                                        name="reference_name[]" placeholder="Enter Your Name" pattern="[A-Za-z]+"
                                                        minlength="1" maxlength="20" value="Lorem Ipsum" required />
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <div class="position-relative form-group">
                                                    <label for="Phone1" class="form-label">Mobile No</label>
                                                    <input type="text" class="form-control is-invalid input_text reference_phone"
                                                        id="Phone1" name="reference_phone[]" placeholder="Enter your Phone Number"
                                                        pattern="[0-9]+" minlength="10" maxlength="16" value="9865121545" required />
                                                </div>
                                            </div>

                                            <div class="col-md-6 add_more_div">
                                                <button class="add_more" href="">ADD MORE +</button>
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
                            <form class="proxima_nova_font">
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

                            <form id="social-media-info proxima_nova_font" action="{{ url(route('account.create', ['param' => 'social-media-info'])) }}"
                                method="post" enctype="multipart/form-data" class="d-flex flex-column">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Linkdin" class="form-label">Linkdin</label>
                                            <img src="/assets/images/linkedin_icon.svg" alt="" class="input_icon linkedin_icon">
                                            <input type="text" class="form-control is-invalid input_text" id="Linkdin"
                                                name="linkdin" placeholder="Enter Your Linkedin URL" value="{{ $linkdin }} www.linkdin.com/Johndeo"
                                                name="linkdin" pattern="https://www.linkedin.com/[a-zA-Z0-9_.]+"/>
                                            <!-- {{-- <img src="images/linkedin.png" alt="" class="input_icon" /> --}} -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Twitter" class="form-label">Twitter</label>
                                            <img src="/assets/images/twitter_icon.svg" alt="" class="input_icon twitter_icon">
                                            <input type="text" class="form-control is-invalid input_text" id="Twitter"
                                                name="twitter" placeholder="Enter Your X URL" value="{{ $twitter }} www.twitter.com/Johndeo"
                                                name="twitter" pattern="https://twitter.com/[a-zA-Z0-9_]+"/>
                                            <!-- {{-- <img src="images/x.png" alt="" class="input_icon" /> --}} -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Instagram" class="form-label">Instagram</label>
                                            <img src="/assets/images/instagram_icon.svg" alt="" class="input_icon insta_icon">
                                            <input type="text" class="form-control is-invalid input_text" id="Instagram"
                                                placeholder="Enter Your Instagram URL" value="{{ $instagram }} www.instagram.com/Johndeo"
                                                name="instagram" pattern="https://www.instagram.com/[a-zA-Z0-9_.]+">
                                            {{-- <img src="images/instagram.png" alt="" class="input_icon" /> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="position-relative form-group">
                                            <label for="Facebook" class="form-label">Facebook</label>
                                            <img src="/assets/images/facebook_icon.svg" alt="" class="input_icon facebook_icon">
                                            <input type="text" class="form-control is-invalid input_text" id="Facebook"
                                                placeholder="Enter Your Facebook URL" value="{{ $facebook }} www.facebook.com/Johndeo"
                                                name="facebook" pattern="https://www.facebook.com/[a-zA-Z0-9.]+"/>
                                            {{-- <img src="images/facebook.png" alt="" class="input_icon" /> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="position-relative form-group">
                                            <label for="others" class="form-label">Others</label>
                                            <input type="text" class="form-control is-invalid input_text" id="others"
                                                placeholder="Enter Your Other URL" value="{{ $other }} www.telegram/Johndeo"
                                                name="other" />
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