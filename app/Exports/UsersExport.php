<?php

namespace App\Exports;

use App\Models\User;
use Box\Spout\Writer\XLSX\Writer;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\DB;

class UsersExport
{
    /**
     * Generate and download the users data as an Excel file.
     *
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function download()
    {
        try {
            \Log::info('Export started');
            
            // Fetch all users
            $alluser_data = User::all();

            // Create a new Xlsx writer
            $writer = WriterEntityFactory::createXLSXWriter();
            $response = new StreamedResponse(function() use ($writer, $alluser_data) {
                // Open the writer and write headers
                $writer->openToBrowser('user_details.xlsx');
                
                // Define header row
                $header = [
                    'User ID', 'Username', 'Email', 'Approval', 'Status', 'Role ID', 'Completed Status', 'Full Name', 'Profile Photo', 'Gender', 'Phone Number', 'Date of Birth', 'Address',
                    'State', 'City', 'Pincode', 'Country', 'Industry', 'Work Experience Title',
                    'Work Experience Company Name', 'Work Experience Years', 'Employed', 'Experience Letter', 'Education Clg Name', 'Education Degree', 'Education Graduation Year', 'Education Field',
                    'Certificate Name', 'Certificate Obtain Date', 'Certificate Issuing',
                    'LinkedIn', 'Twitter', 'Instagram', 'Facebook', 'Other', 'Created At'
                ];
                
                // Convert header to RowEntity and add to writer
                $headerRow = WriterEntityFactory::createRowFromArray($header);
                $writer->addRow($headerRow);

                // Write data for each user
                foreach ($alluser_data as $user) {
                    $userdetails = DB::table('userdetails')->where('user_id', $user->id)->first();
// Prepare the dynamic fields before adding them to the row
$industry = json_decode($userdetails->industry, true);
$industry_names = [];
foreach ($industry as $industry_id) {
    $industry_name = DB::table('industry')->where('id', $industry_id)->first(['name']);
    $industry_names[] = $industry_name->name ?? '';
}

$skills = json_decode($userdetails->skill, true);
$skill_list = implode(", ", $skills ?? []);

$experience_letter_url = '';
if (!empty($userdetails->experience_letter)) {
    if (strpos($userdetails->experience_letter, 'my.sharepoint.com') !== false) {
        $experience_letter_url = $userdetails->experience_letter;
    } else {
        $experience_letter_url = asset('storage/' . $userdetails->experience_letter);
    }
}

$edu_data = json_decode($userdetails->edu_data, true);
$certificate_data = json_decode($userdetails->certificate_data, true);

                    if ($userdetails) {
                        $row = [
                            $user->id,
                            $user->username,
                            $user->email,
                            $user->approval,
                            $user->status,
                            $user->role_id,
                            $userdetails->fullname,
                            {{ asset('storage/' . $usersdetails->profile_photo) }},
                            if($usersdetails->gender == 1){
                                Male  
                            }elseif($usersdetails->gender == 2){
                                Female   
                            }elseif($usersdetails->gender == 3) {
                                Other
                            },
                            $userdetails->phone_number,
                            $userdetails->dob,
                            $userdetails->address,
                            $userdetails->state,
                            $userdetails->city,
                            $userdetails->pincode,
                            $userdetails->country,
                            $userdetails->industry //store in format like [industry1, industry2, industry3,...] 
                            @php 
                            $industry =  json_decode($usersdetails->industry, true); 
                            @endphp
                            @if(count($industry) != 0)
                                @foreach ($industry as $row)
                                    @php 
                                        $industry_name =  DB::table('industry')->where('id', $row)->first(['name', 'sub_parent_id', 'main_partent_id', 'main']);
                                    @endphp
                                    <p>{{ $industry_name->name }}</p>
                                @endforeach
                            @endif
                            
                            ,
                            $userdetails->wrk_exp__title,
                            $userdetails->wrk_exp_company_name,
                            $userdetails->wrk_exp_years,
                            $userdetails->employed,
                            
                            @if(!is_null($usersdetails->experience_letter) && !empty($usersdetails->experience_letter))
                                @if (strpos($usersdetails->experience_letter, 'my.sharepoint.com') !== false)
                                    <a target="_blank" href="{{ $usersdetails->experience_letter }}" class="btn btn-success main_button" target="_blank">View Experience Letter</a>
                                @else
                                    <a target="_blank" href="{{ asset('storage/' . $usersdetails->experience_letter) }}" class="btn btn-success main_button" target="_blank">View Experience Letter</a>
                                @endif
        
                            @endif
                            
                            ,
                            
                            $edu_data =  json_decode($usersdetails->edu_data, true);
                            $edu_data->edu_clg_name,
                            $edu_data->edu_degree,
                            $edu_data->edu_graduation_year,
                            $edu_data->edu_field,

                            @if(!is_null($usersdetails->skill) && !empty($usersdetails->skill))
                                @php $skills = json_decode($usersdetails->skill, true); @endphp
                                @foreach ($skills as $row)
                                    <li>{{ $row }}</li>
                                @endforeach
                            @endif
                            ,

                            $cert_data =  json_decode($userdetails->certificate_data, true);
                            $cert_data->certificate_name
                            $cert_data->certificate_obtn_date
                            $cert_data->certificate_issuing
                            ,

                            $userdetails->pref_title,
                            $employ_types = DB::table('employ_types')->where('status', 1)->where('id', $userdetails->pref_emp_type)->get();,

                            @php $prefindustry =  json_decode($userdetails->pref_industry, true); @endphp //store in format like [industry1, industry2, industry3,...] 
                            @if(count($prefindustry) != 0)
                                @foreach ($prefindustry as $row)

                                    @php 
                                        $prefindustry_name =  DB::table('industry')->where('id', $row)->first(['name', 'sub_parent_id', 'main_partent_id', 'main']);
                                    @endphp

                                        <p>{{ $prefindustry_name->name }}</p>
                                    

                                @endforeach
                            @endif
                            ,

                            $usersdetails->pref_location,
                            $usersdetails->pref_salary,
                            $usersdetails->current_salary,
                            
                            $current_salary_currency = DB::table('currencies')->where('id', $usersdetails->current_salary_currency)->get(['id','symbol']);
                            // print symbol
                            ,
                            $pref_salary_currency = DB::table('currencies')->where('id', $usersdetails->pref_salary_currency)->get(['id','symbol']);
                            // print symbol
                            ,

                           
                            $references_data = json_decode($usersdetails->references, true);
                            $references_data->reference_name,
                            $references_data->reference_phone,

                            @if($usersdetails->work_authorization_status == 1) Yes  @elseif($usersdetails->work_authorization_status == 0) No @endif 
                            @if($usersdetails->availability == 1) Yes  @elseif($usersdetails->availability == 0) No @endif
                            @if($usersdetails->notice_period == 1) Yes  @elseif($usersdetails->notice_period == 0) No @endif

                            $notice_period_due = DB::table('notice_period')->where('status', 1)->where('id', $userdetails->notice_period_duration)->get();
                            

                            $userdetails->linkdin,
                            $userdetails->twitter,
                            $userdetails->instagram,
                            $userdetails->facebook,
                            $userdetails->other,
                            $user->created_at,
                        ];
                        
                        // Convert data row to RowEntity and add to writer
                        $dataRow = WriterEntityFactory::createRowFromArray($row);
                        $writer->addRow($dataRow);
                    }
                }

                // Close the writer
                $writer->close();
            });

            // Set headers for Excel file download
            $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            $response->headers->set('Content-Disposition', 'attachment; filename="user_details.xlsx"');

            return $response;

        } catch (\Exception $e) {
            \Log::error('Export error: ' . $e->getMessage());
            return response()->json(['error' => 'Export failed'], 500);
        }
    }
}
