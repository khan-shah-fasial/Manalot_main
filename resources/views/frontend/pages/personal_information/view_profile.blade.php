@extends('frontend.layouts.app')

@section('page.title', 'Manalot')

@section('page.description', 'Manalot')

@section('page.type', 'website')

@section('page.content')

@php
// var_dump($user);

// var_dump($user_detail);

// $experience_status = DB::table('experience_status')->where('status', 1)->get();

// $notice_period_list = DB::table('notice_period')->where('status', 1)->get();
// $industry = DB::table('industry')->where('status', '1')->get();
// $groupedIndustries = $industry->where('main', 1);
// $currencies = DB::table('currencies')->get(['id','symbol']);
// $references_from = DB::table('references_from')->where('status', '1')->get();

$userapproval = isset($user->approval) ? $user->approval : null;

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
// $industry_check = isset($user_detail->industry) ? $user_detail->industry : '[]';
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
// $pref_industry_check = isset($user_detail->pref_industry) ? $user_detail->pref_industry : '[]';
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

$last_college_name = '';
if (!empty($edu_data)) {
    $last_edu = end($edu_data);
    $last_college_name = $last_edu['edu_clg_name'] ?? '';
}


@endphp

<style>
@media screen and (min-width: 1200px) {

    header.d-flex.align-items-center.justify-content-between {
        width: 100%;
    }
}

body {
    background-color: #e7ecef !important;
}
.profile-page a:hover {
    color: #535353;
}

</style>

<div class="profile-page pb-5 proxima_nova_font ">
    <div class="container">
        <div class="image-profile box_shadows">
            <div class="bg-profile-cover">
            <img class="img-fluid" src="/assets/images/user_profile_banner.png"/>
            </div>

            <div class="bg-profile-content">
                <img class="user_img" src="/assets/images/anil_rajkundra.png"/>
                <div class="profile_content_main_div">
                    <div class="profile-content">
                        <h3>{{$fullname}}
                            @if($userapproval)
                                <img class="verified" src="/assets/images/verified.svg">
                            @endif
                        </h3>
                        <p> - </p>
                        <span>{{$city}}, {{$state}}, {{$country}}.</span>
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
                    <div class="col-lg-12 d-flex flex-column gap-lg-0 gap-lg-4 gap-2 pe-md-3">
                        <div class="profile_manalot_div d-flex align-items-center gap-2 mb-lg-3 mb-1">
                            <img class="profile_study_logo" src="/assets/images/favicon3.png">
                            <span>Manalot</span>
                        </div>
                        <div class="mngmnt_school d-flex align-items-center gap-2">
                            <img class="profile_study_logo" src="/assets/images/welingkar_institute_logo2.png">
                            <span>{{ $last_college_name }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="user-profile-social-links">
                @if($userapproval)
                <div class="bg_verified_main">
                    <img class="bg_verified_img" src="/assets/images/verified.svg">
                    <p class="bg_verified_text">Background Verified with MLN</p>
                </div>
                @endif
                <div class="bg_verified_main">
                    <img class="bg_verified_img" src="/assets/images/search_user.svg">
                    <p class="bg_verified_text">Looking for : <span class="bg_verified_bold_text">{{$pref_title}}</span></p>
                </div>
                <div class="bg_verified_main">
                    <img class="bg_verified_img" src="/assets/images/desired.svg">
                    <p class="bg_verified_text">Desired Job Location : <span class="bg_verified_bold_text">{{$pref_location}}</span></p>
                </div>
                <div class="user-social-links">
                    <a href="{{$linkedin}}" target="_blank" class="linkedin">
                        <img class="user_social" src="/assets/images/linkedin_img.svg">
                    </a>
                    <a href="{{$instagram}}" target="_blank" class="instagram">
                        <img class="user_social" src="/assets/images/instagram_img.svg">
                    </a>
                    <a href="{{$twitter }}" target="_blank" class="twitter">
                        <img class="user_social" src="/assets/images/x-twitter_img.svg">
                    </a>
                    <a href="{{$facebook}}" target="_blank" class="facebook">
                        <img class="user_social" src="/assets/images/facebook_img.svg">
                    </a>
                    <a href="{{$other}}" target="_blank" class="globe">
                        <img class="user_social" src="/assets/images/globe_img.svg">
                    </a>
                </div>
            </div>
        </div>



        <div class="about_main_div profile-information box_shadows mt-35 padd-40">
            <div class="about_heading_div">
                <img class="user_icon" src="/assets/images/user_icon.svg">
                <h4 class="about_heading">About</h4>
            </div>
            <div class="about_para_div">

            </div>
        </div>

        <div class="profile-information box_shadows mt-35 padd-40 work_exp">
            <div class="about_heading_div">
                <img class="user_icon" src="/assets/images/suitcase_icon.svg">
                <h4 class="about_heading">Work Experience</h4>
            </div>
            @foreach ($user->workExperiences as $experience)
            <div class="col-12">
                <div class="d-flex align-items-start">
                    <img class="education_certification_logo" src="/assets/images/favicon.svg" alt="Company Logo">
                    <div class="ms-3">
                        <h5 class="mb-1">{{ $experience->wrk_exp_title }}</h5>
                        <p>
                            {{ $experience->wrk_exp_company_name }} .
                            {{ $years_of_exp[$experience->wrk_exp_years] ?? 'N/A' }}
                        </p>
                        <p class="work_exp_details_text">
                            {{ $experience->wrk_exp_responsibilities }}
                            <b class="bold_see_more"> </b>
                        </p>

                        <div class="industry_main_div">
                            <strong class="industry_main_div_heading">Industry :</strong>
                            <div class="industry_div_list">
                                @foreach ($industries as $industry)
                                <div class="bg_verified_main">
                                    <img class="bg_verified_img" src="/assets/images/right_mark.svg">
                                    <p class="bg_verified_text">{{ $industry }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="skills_main_div">
                            <strong class="skills_main_div_heading">Skills :</strong>
                            <div class="industry_div_list">
                                @foreach ($skills as $skill)
                                <div class="bg_verified_main">
                                    <img class="bg_verified_img" src="/assets/images/right_mark.svg">
                                    <p class="bg_verified_text">
                                        @php
                                        echo $skill;
                                        @endphp
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="profile-information box_shadows mt-35 padd-40 education_main_div mb-md-0 mb-4">
            <!-- Education Section -->
            <div class="about_heading_div">
                <img class="user_icon" src="/assets/images/education_icon.svg">
                <h4 class="about_heading">Education</h4>
            </div>
            <div class="d-flex flex-md-row flex-row flex-column flex-wrap pb-md-4 pb-3 education_div">

                @if (!empty($edu_data))
                    @foreach($edu_data as $edu)
                        @php
                            $collegeName = $edu['edu_clg_name'] ?? 'Unknown College';
                            $degree = $edu['edu_degree'] ?? 'Unknown Degree';
                            $graduationYear = $edu['edu_graduation_year'] ?? 'Unknown Year';
                            $field = $edu['edu_field'] ?? 'Unknown Field';
                        @endphp

                        <div class="col-md-6 col-12 mb-3">
                            <div class="d-flex pb-md-3 align-items-md-center">
                                <img class="education_certification_logo" src="/assets/images/logo-welingkar.png" alt="Welingkar Logo">
                                <div class="ms-3">
                                    <h5 class="mb-1">{{ htmlspecialchars($collegeName) }}</h5>
                                    <p class="mb-0">{{ htmlspecialchars($degree) }} - {{ htmlspecialchars($field) }} - {{ htmlspecialchars($graduationYear) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- Certifications Section -->
            <div class="about_heading_div">
                <img class="user_icon" src="/assets/images/certificate_icon.svg">
                <h4 class="about_heading">Certifications</h4>
            </div>
            <div class="d-flex flex-md-row flex-column certification_div">
                @foreach($certificate_data as $certificate)
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-md-center">
                            <img class="education_certification_logo" src="/assets/images/ma_foi.jpeg" alt="Certification Logo">
                            <div class="ms-3">
                                <h5 class="mb-1">{{ $certificate['certificate_name'] }}</h5>
                                <p class="mb-0">
                                    {{ $certificate['certificate_issuing'] }}
                                    Issued
                                    {{ \Carbon\Carbon::parse($certificate['certificate_obtn_date'])->format('M Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="maple_consulting_div d-lg-block d-none">
            <h5 class="maple_consluting text-center">
                © Maple Consulting and Services
            </h5>
        </div>

    </div>
</div>


@endsection
