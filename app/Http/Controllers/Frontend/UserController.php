<?php

namespace App\Http\Controllers\Frontend;

use App\Models\UserWorkExperience;
use App\Models\UserDetails;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function create_account($param, Request $request){

        if($param == "change-password"){

            $rsp_msg = $this->change_password($request);

        }elseif($param == "personal-info"){

            $rsp_msg = $this->create_personal_info($request);

        }elseif($param == "personal-work-info"){

            $rsp_msg = $this->create_personal_work_info($request);

        }elseif($param == "education-info"){

            $rsp_msg = $this->create_education_info($request);

        }elseif($param == "certifications-info"){

            $rsp_msg = $this->create_certifications_info($request);

        }elseif($param == "work-authorization"){

            $rsp_msg = $this->create_work_authorization($request);

        }elseif($param == "preferences-info"){

            $rsp_msg = $this->create_preferences_info($request);

        }elseif($param == "social-media-info"){

            $rsp_msg = $this->create_social_media_info($request);

        } else {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message'] = "Invalid parameter: $param";
        }

        return response()->json(array('response_message' => $rsp_msg));
    }

    public function getSkills(Request $request)
    {
        $search = $request->input('q');
        $searchTerms = explode(' ', $search);

        $skills = DB::table('skills')
            ->where(function($query) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $query->orWhere('name', 'LIKE', "$term%");
                }
            })
            ->groupBy('name')
            ->get(['name']);

        return response()->json($skills);
    }

    public function getRelatedSkills(Request $request)
    {
        $skill = $request->input('skill');
        $searchTerms = explode(' ', $skill);

        $relatedSkills = DB::table('skills')
            ->where(function($query) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $query->orWhere('name', 'LIKE', "$term%");
                }
            })
            ->wherenot('name',$skill)
            ->limit('10')
            ->get();

        return response()->json($relatedSkills);
    }

    public function change_password($request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required|min:6',
        ]);

        // If validation fails, return the error messages
        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            return response()->json([
                'status' => 'error',
                'message' => $errors
            ], 400); // Return with status 400 for client error
        }

        // Get the user ID from the session
        $user_id = Session::get('user_id');

        // If the user_id is not set in the session, return an error response
        if (!$user_id) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found or session expired.',
            ], 404); // User not found, return 404 status
        }

        // Retrieve the user from the database
        $user = User::where('id', $user_id)->first();

        if ($user) {
            // Update the password in the database
            User::where('id', $user_id)->update([
                'password' => Hash::make($request->input('password')), // Use Hash::make for better security
            ]);

            Cache::flush();

            $rsp_msg['response'] = 'success';
            $rsp_msg['message'] = "Password updated successfully.";

            return $rsp_msg;

        } else {


            $rsp_msg['response'] = 'error';
            $rsp_msg['message'] = "User not found or something went wrong.";

            return $rsp_msg;
        }
    }

    public function create_education_info($request){

        $validator = Validator::make($request->all(), [
            'edu_degree.*' => 'required',
            'edu_clg_name.*' => 'required',
            'edu_graduation_year.*' => 'required',
            'edu_field.*' => 'required',

        ], [
            'edu_degree.*.required' => 'The Degree field is required.',
            'edu_clg_name.*.required' => 'The School/University Name field is required.',
            'edu_graduation_year.*.required' => 'The Graduation Year field is required.',
            'edu_field.*.required' => 'The Major/Field of Study field is required.',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        //---- education -------
        $edu_data = [];
        $edu_clg_name = $request->input('edu_clg_name');
        $edu_degree = $request->input('edu_degree');
        $edu_graduation_year = $request->input('edu_graduation_year');
        $edu_field = $request->input('edu_field');

        for ($i = 0; $i < count($edu_clg_name); $i++) {
            $edu_data[] = [
                'edu_clg_name' => $edu_clg_name[$i],
                'edu_degree' => $edu_degree[$i],
                'edu_graduation_year' => $edu_graduation_year[$i],
                'edu_field' => $edu_field[$i],
            ];
        }

        UserDetails::where('user_id', Session::get('user_id'))->update([
            'edu_data' => json_encode($edu_data),
        ]);

        Cache::flush();

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Education Detail Updated successfully!";

        return $rsp_msg;
    }


    public function create_certifications_info($request){

        $validator = Validator::make($request->all(), [
            'certificate_name.*' => ['required', 'min:1', 'max:100'], // Adjust length rules
            'certificate_obtn_date.*' => ['required', 'date', 'before_or_equal:' . now()->toDateString()],
            'certificate_issuing.*' => ['required', 'min:1', 'max:50'],
        ], [
            'certificate_name.*.required' => 'The Certificate Name is required.',
            'certificate_name.*.min' => 'The Certificate Name must be at least 1 character.',
            'certificate_name.*.max' => 'The Certificate Name may not be greater than 100 characters.',
            'certificate_obtn_date.*.required' => 'The Certificate Obtain Date is required.',
            'certificate_obtn_date.*.before_or_equal' => 'The Certificate Obtain Date cannot be a future date.',
            'certificate_issuing.*.required' => 'The Issuing Organization is required.',
            'certificate_issuing.*.min' => 'The Issuing Organization must be at least 1 character.',
            'certificate_issuing.*.max' => 'The Issuing Organization may not be greater than 50 characters.',
        ]);


        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        // Combine the form data into an array
        $certificate_data = [];
        $certificate_names = $request->input('certificate_name');
        $certificate_dates = $request->input('certificate_obtn_date');
        $certificate_issuings = $request->input('certificate_issuing');

        for ($i = 0; $i < count($certificate_names); $i++) {
            $certificate_data[] = [
                'certificate_name' => $certificate_names[$i],
                'certificate_obtn_date' => $certificate_dates[$i],
                'certificate_issuing' => $certificate_issuings[$i],
            ];
        }

        Userdetails::where('user_id', Session::get('user_id'))->update([
            'certificate_data' => json_encode($certificate_data),
        ]);

        Cache::flush();

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Certificate Detail Added successfully!";

        return $rsp_msg;

    }

    public function create_personal_info($request){

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|regex:/^[A-Za-z\s,.\'\/&]+$/|min:3',
            'gender' => 'required',
            'dob' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'country' => 'required',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        // Get the user_id from session
        $user_id = Session::get('user_id'); // Using user_id from session

        // If no user_id in session, return an error (just in case)
        if (!$user_id) {
            return response()->json([
                'response' => 'error',
                'message' => 'User ID not found in session',
            ]);
        }

        // Retrieve existing profile photo path
        $profile_img_path = UserDetails::where('user_id', $user_id)->value('profile_photo');

        // Handle profile photo upload if there's a new one
        if ($request->hasFile('profile_photo')) {
            // Store the new profile photo
            $path = $request->file('profile_photo')->store('user_data/profile_img', 'public');

            // If there's an existing profile photo, delete it
            if ($profile_img_path && Storage::disk('public')->exists($profile_img_path)) {
                Storage::disk('public')->delete($profile_img_path);
            }
        } else {
            // If no new profile photo, keep the old one
            $path = $profile_img_path;
        }

        // Update the user details
        UserDetails::updateOrInsert(
            ['user_id' => $user_id],
            [
                'fullname' => $request->input('fullname'),
                'gender' => $request->input('gender'),
                'profile_photo' => $path,
                'dob' => $request->input('dob'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'pincode' => $request->input('pincode'),
                'country' => $request->input('country'),
            ]
        );

        Cache::flush();

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Personal Detail Added successfully!";

        return $rsp_msg;

    }

    public function create_personal_work_info($request){
        // Get the user_id from session
        $user_id = Session::get('user_id'); // Using user_id from session

        Userdetails::where('user_id', $user_id)->update([
            'employed' => $request->input('Employed'),
        ]);

        // Update work experience entries
        $this->updateUserWorkExperienceData($request, $user_id);

        Cache::flush();

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Personal and Work Detail Updated successfully!";

        return $rsp_msg;

    }

    private function updateUserWorkExperienceData(Request $request, $user_id)
    {
        // Validate the incoming request
        $request->validate([
            'wrk_exp__title.*' => 'required|string|max:100',
            'wrk_exp_company_name.*' => 'required|string|max:100',
            'wrk_exp_responsibilities.*' => 'required|string',
            'experience_letter.*' => 'required|string',
            'industry.*' => 'required',
            'skill.*' => 'required',
        ]);

        // Get the industry data from the request
        $industryInputs = $request->input('industry');

        // Prepare the data for insertion
        $workExperiences = [];

        foreach ($request->input('wrk_exp__title') as $key => $title) {

            // Handle file upload for experience letter
            if ($request->hasFile('experience_letter') && $request->file('experience_letter')[$key]->isValid()) {

                $users_email_temp = User::where('id', $user_id)->value('email');

                $users_email_temp = str_replace(['@', '.'], '_', $users_email_temp);

                $newFileName = 'experience_letter_' . $users_email_temp . '_' . now()->format('YmdHis') . '.' . $request->file('experience_letter')->getClientOriginalExtension();
                $path = $request->file('experience_letter')->storeAs('user_data/experience_letters', $newFileName, 'public');

                $result = file_upload_od($newFileName, $path);
                if($result != 'error on uploding'){
                    if (Storage::disk('public')->exists($path)) {
                        // Storage::disk('public')->delete($path);
                    }
                    $path = $result;
                }

            } else {

                $path = null;
            }

            // Get the corresponding industries for the current work experience
            $industries = isset($industryInputs[$key]) ? $industryInputs[$key] : [];

            // Explode the string by comma and sanitize values
            $industries_t = explode(',', $industries[0]);

            // Trim spaces from each element
            $industries = array_map('trim', $industries_t);

            // Encode industries as JSON for storing in the database
            $encodedIndustries = json_encode($industries);  // Store as JSON encoded array

            // Parse and process skills
            $skills = $request->input("skill.$key", []);
            $skills = array_map('trim', $skills);

            foreach ($skills as $skill) {
                $existingSkill = DB::table('skills')->where('name', $skill)->first();
                if (!$existingSkill) {
                    DB::table('skills')->insert([
                        'name' => $skill,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // Prepare the current work experience data
            $workExperiences[] = [
                'user_id' => $user_id,
                'wrk_exp_title' => $title,
                'wrk_exp_company_name' => $request->input('wrk_exp_company_name')[$key] ?? null,
                'wrk_exp_responsibilities' => $request->input('wrk_exp_responsibilities')[$key] ?? null,
                'start_month_year' => $request->input('start_month_year')[$key] ?? null,
                'end_month_year' => $request->input('end_month_year')[$key] ?? null,
                'experience_letter' => $path ?? null,
                'industry' => $encodedIndustries ?? null, // Encode the industries array as JSON
                'skill' => json_encode($skills) ?? null, // Encode the list of skills as JSON
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Delete old entries for the user
        UserWorkExperience::where('user_id', $user_id)->delete();

        // Insert the new entries into the database
        UserWorkExperience::insert($workExperiences);

        // Clear the cache after the update
        Cache::flush();
    }


    public function create_work_authorization($request){
        $validator = Validator::make($request->all(), [
            'work_authorization_status' => 'required',
            'availability' => 'required',
            'notice_period_duration' => 'required',
        ], [
            'work_authorization_status.required' => 'The Work Authorization Status is required.',
            'availability.required' => 'The Availability field is required.',
            'notice_period_duration.required' => 'The Notice Period is required.',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }
        // Get the user_id from session
        $user_id = Session::get('user_id'); // Using user_id from session
        Userdetails::where('user_id', $user_id)->update([
            'work_authorization_status' => $request->input('work_authorization_status'),
            'availability' => $request->input('availability'),
            'notice_period_duration' => $request->input('notice_period_duration'),
        ]);

        Cache::flush();

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Work Authorization Updated successfully!";

        return $rsp_msg;
    }

    public function create_preferences_info($request){

        $validator = Validator::make($request->all(), [
            'pref_title' => ['required', 'min:1', 'max:50'],
            'pref_emp_type' => ['required', 'min:1', 'max:50'],
            'pref_industry.*' => 'required',
            'pref_location' => ['required', 'min:1', 'max:50'],
            'pref_salary' => ['required', 'string', 'regex:/^[A-Za-z0-9\s,.\/\'&]+$/i', 'min:1', 'max:100'],
            'reference_name' => [
                'required',
                function ($attribute, $value, $fail) {
                    foreach ($value as $name) {
                        // Allow numbers and the plus sign (+)
                        if (!preg_match('/^[A-Za-z+\s]+$/', $name)) {
                            $fail("The Reference Name are Rquired and must contain only Alphabetical values only.");
                        }
                    }
                }
            ],
            'reference_phone' => [
                'required',
                function ($attribute, $value, $fail) {
                    foreach ($value as $phone) {
                        // Allow numbers, plus sign (+), and spaces
                        if (!preg_match('/^[0-9+\s]+$/', $phone)) {
                            $fail("The Reference Phone are Rquired must contain only numeric values, spaces, and the plus sign (+).");
                        }

                        $digitCount = preg_match_all('/\d/', $phone);
                        if ($digitCount < 5) {
                            $fail("The Reference Phone are Rquired.");
                        }

                    }
                }
            ],
            'pref_salary_currency' => 'required',
        ], [
            'pref_title.required' => 'The Preferred Title is required.',
            'pref_title.min' => 'The Preferred Title must be at least 1 character.',
            'pref_title.max' => 'The Preferred Title may not be greater than 50 characters.',

            'pref_emp_type.required' => 'The Preferred Employment Type is required.',
            'pref_emp_type.min' => 'The Preferred Employment Type must be at least 1 character.',
            'pref_emp_type.max' => 'The Preferred Employment Type may not be greater than 50 characters.',

            'pref_industry.*.required' => 'The Preferred Industry field is required.',

            'pref_location.required' => 'The Preferred Location is required.',
            'pref_location.min' => 'The Preferred Location must be at least 1 character.',
            'pref_location.max' => 'The Preferred Location may not be greater than 50 characters.',

            'pref_salary.required' => 'The Preferred Salary is required.',
            'pref_salary.min' => 'The Preferred Salary must be at least 1 character.',
            'pref_salary.max' => 'The Preferred Salary may not be greater than 100 characters.',
            'pref_salary.regex' => 'The Preferred Salary format is invalid.',

            'reference_name.required' => 'The Reference Name is required.',

            'reference_phone.required' => 'The Reference Phone Number is required.',
            'reference_phone.numeric' => 'The Reference Phone Number must contain only numeric values.',

            'pref_salary_currency.required' => 'The Currency is required.',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        // Combine the form data into an array
        $references_data = [];
        $reference_name = $request->input('reference_name');
        $reference_phone = $request->input('reference_phone');

        for ($i = 0; $i < count($reference_name); $i++) {
            $references_data[] = [
                'reference_name' => $reference_name[$i],
                'reference_phone' => $reference_phone[$i],
            ];
        }

        $pref_industry = $request->input('pref_industry');

        $pref_industry_elements = explode(',', $pref_industry[0]);

        $pref_industry_elements = array_map('trim', $pref_industry_elements);

       Userdetails::where('user_id', Session::get('user_id'))->update([
            'pref_title' => $request->input('pref_title'),
            'pref_emp_type' => $request->input('pref_emp_type'),
            'pref_industry' => json_encode($pref_industry_elements),
            'pref_location' => $request->input('pref_location'),
            'pref_salary' => $request->input('pref_salary'),
            'pref_salary_currency' => $request->input('pref_salary_currency'),
            'references' => json_encode($references_data),
        ]);

        Cache::flush();

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Preferences Detail Added successfully!";

        return $rsp_msg;
    }

    public function create_social_media_info($request){

        $validator = Validator::make($request->all(), [
            'linkedin' => ['nullable', 'regex:/^https?:\/\/(www\.)?linkedin\.com\/.*$/i'],
            'twitter' => ['nullable', 'regex:/^https?:\/\/(www\.)?(x|twitter)\.com\/.*$/i'],
            'instagram' => ['nullable', 'regex:/^https?:\/\/(www\.)?instagram\.com\/.*$/i'],
            'facebook' => ['nullable', 'regex:/^https?:\/\/(www\.)?facebook\.com\/.*$/i'],
            'other' => 'nullable|url',
        ], [
            'linkedin.regex' => 'The LinkedIn URL must be a valid LinkedIn profile link. Use URL this format https://www.linkedin.com/',
            'twitter.regex' => 'The Twitter URL must be a valid X profile link. Use URL this format https://x.com/',
            'instagram.regex' => 'The Instagram URL must be a valid Instagram profile link. Use URL this format https://www.instagram.com/',
            'facebook.regex' => 'The Facebook URL must be a valid Facebook profile link. Use URL this format https://www.facebook.com/',
            'other.url' => 'The Other URL must be a valid URL. Use URL this format https://www.com/',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

        Userdetails::where('user_id', Session::get('user_id'))->update([
            'linkdin' => $request->input('linkdin'),
            'twitter' => $request->input('twitter'),
            'instagram' => $request->input('instagram'),
            'facebook' => $request->input('facebook'),
            'other' => $request->input('other'),
        ]);

        Cache::flush();

        $rsp_msg['response'] = 'success';
        $rsp_msg['message']  = "User Social Media Detail Updated successfully!";

        return $rsp_msg;

    }

}
