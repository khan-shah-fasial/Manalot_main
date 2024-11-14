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
            // \Log::info('Export started');

            // Fetch all users with the related user details
            // $alluser_data = User::all();

            // Fetch all users excluding role_id 1 with the related user details
            $alluser_data = User::where('role_id', '!=', 1)->get();

            // Fetch industry data once and map them by ID
            $industries = DB::table('industry')->pluck('name', 'id');

            // Fetch currency symbols once and map them by ID
            $currencySymbols = DB::table('currencies')->pluck('symbol', 'id');

            // Fetch all years_of_exp data once to avoid repeated queries in the loop
            $yearsOfExp = DB::table('years_of_exp')->where('status', 1)->pluck('year_range', 'id');

            // Fetch all years_of_exp data once to avoid repeated queries in the loop
            $employTypes = DB::table('employ_types')->where('status', 1)->pluck('name', 'id');

            // Fetch all years_of_exp data once to avoid repeated queries in the loop
            $noticePeriod = DB::table('notice_period')->where('status', 1)->pluck('name', 'id');

            // Create a new Xlsx writer
            $writer = WriterEntityFactory::createXLSXWriter();
            $response = new StreamedResponse(function () use ($writer, $alluser_data, $industries, $currencySymbols, $yearsOfExp, $employTypes, $noticePeriod) {
                // Open the writer and write headers
                $writer->openToBrowser('user_details.xlsx');

                // Define header row
                $header = [
                    'User ID',
                    'Username',
                    'Email',
                    'Phone',
                    'Resume CV',
                    'Full Name',
                    'Gender',
                    'Profile Photo',
                    'Phone Number',
                    'Date of Birth',
                    'Pincode',
                    'City',
                    'Country',                    
                    'State',
                    'Address',
                    'Work Experience Title',
                    'Company Name',
                    'Experience Years',
                    'Experience Letter',
                    'Industry',
                    'Employed',
                    'Skills',
                    'Responsibilities',
                    'Education (Name, Degree, Graduation Year, Field of Study)',
                    // 'College Name',
                    // 'Degree',
                    // 'Graduation Year',
                    // 'Field of Study',
                    'Certifications (Name, Date, Issuing)',
                    // 'Certificate Name',
                    // 'Certificate Date',
                    // 'Certificate Issuing',
                    'Preferred Title',
                    'Preferred Employment Type',
                    'Preferred Location',
                    'Notice Period Duration',
                    'Current Salary',
                    'Preferred Salary',
                    'Preferred Industry',
                    'Current Salary Currency',
                    'Preferred Salary Currency',
                    'Reference (Name, Phone)',
                    // 'Reference Name',
                    // 'Reference Phone',
                    'Work Authorization Status',
                    'Availability',
                    'LinkedIn',
                    'Twitter',
                    'Instagram',
                    'Facebook',
                    'Other',
                    'Approval',
                    'Created At'
                ];

                // Convert header to RowEntity and add to writer
                $headerRow = WriterEntityFactory::createRowFromArray($header);
                $writer->addRow($headerRow);

                function formatapprovalBoolean($value)
                {
                    return $value ? 'Approved' : 'Not Approved';
                }

                function formatBoolean($value)
                {
                    return $value ? 'Yes' : 'No';
                }

                // Write data for each user
                foreach ($alluser_data as $user) {
                    $userdetails = DB::table('userdetails')->where('user_id', $user->id)->first();

                    if ($userdetails) {
                        // Decode education, certificate, and references data
                        $educationData = json_decode($userdetails->edu_data, true) ?? [];
                        $certificateData = json_decode($userdetails->certificate_data, true) ?? [];
                        $referencesData = json_decode($userdetails->references, true) ?? [];

                        // Process education data
                        // $collegeNamesStr = implode(', ', array_column($educationData, 'edu_clg_name'));
                        // $degreesStr = implode(', ', array_column($educationData, 'edu_degree'));
                        // $graduationYearsStr = implode(', ', array_column($educationData, 'edu_graduation_year'));
                        // $fieldsOfStudyStr = implode(', ', array_column($educationData, 'edu_field'));

                        // Process education data
                        $educationDetails = [];
                        foreach ($educationData as $index => $education) {
                            // Check if all necessary fields are not empty before adding the education entry
                            if (!empty($education['edu_clg_name']) && !empty($education['edu_degree']) && !empty($education['edu_graduation_year']) && !empty($education['edu_field'])) {
                                $educationDetails[] = ($index + 1) . ". College Name: " . $education['edu_clg_name']
                                    . ", Degree: " . $education['edu_degree']
                                    . ", Graduation Year: " . $education['edu_graduation_year']
                                    . ", Field of Study: " . $education['edu_field'];
                            }
                        }

                        // Concatenate education data with a semicolon and a newline after each entry
                        $educationStr = !empty($educationDetails) ? implode(";\n", $educationDetails) . ";" : ''; // Ensure it's empty if no data


                        // Process certificate data
                        // $certificateNamesStr = implode(', ', array_column($certificateData, 'certificate_name'));
                        // $certificateObtainDatesStr = implode(', ', array_column($certificateData, 'certificate_obtn_date'));
                        // $certificateIssuingStr = implode(', ', array_column($certificateData, 'certificate_issuing'));

                        // // Concatenate certificates data into a single string
                        // $certificateDetails = [];
                        // foreach ($certificateData as $certificate) {
                        //     $certificateDetails[] = $certificate['certificate_name'] . ' (' . $certificate['certificate_obtn_date'] . ') - Issued by ' . $certificate['certificate_issuing'];
                        // }
                        // $certificateStr = implode("\n", $certificateDetails); // Concatenate certificates with newline

                        // Format certificates data as "Certificate X: Name, Date: Date, Issuer: Issuer"
                        $certificateDetails = [];
                        foreach ($certificateData as $index => $certificate) {
                            // Check if all necessary fields are not empty before adding the certificate
                            if (!empty($certificate['certificate_name']) && !empty($certificate['certificate_obtn_date']) && !empty($certificate['certificate_issuing'])) {
                                $certificateDetails[] = ($index + 1) . ". Certificate Name: " . $certificate['certificate_name']
                                    . ", Date: " . $certificate['certificate_obtn_date']
                                    . ", Issuer: " . $certificate['certificate_issuing'];
                            }
                        }

                        // Concatenate certificates with a semicolon and a newline after each entry
                        $certificateStr = !empty($certificateDetails) ? implode(";\n", $certificateDetails) . ";" : ''; // Ensure it's empty if no data

                        // Process reference data
                        // $referenceNamesStr = implode(', ', array_column($referencesData, 'reference_name'));
                        // $referencePhonesStr = implode(', ', array_column($referencesData, 'reference_phone'));

                        // Process references data
                        $referenceDetails = [];
                        foreach ($referencesData as $index => $reference) {
                            // Check if all necessary fields are not empty before adding the reference
                            if (!empty($reference['reference_name']) && !empty($reference['reference_phone'])) {
                                $referenceDetails[] = ($index + 1) . ". Name: " . $reference['reference_name']
                                    . ", Phone: " . $reference['reference_phone'];
                            }
                        }

                        // Concatenate references with semicolon and newline after each entry
                        $referenceStr = !empty($referenceDetails) ? implode(";\n", $referenceDetails) . ";" : ''; // Ensure it's empty if no data

                        // Process industry data (for current and preferred industry)
                        $industryIds = json_decode($userdetails->industry, true) ?? [];
                        $industry_names = [];
                        foreach ($industryIds as $industryId) {
                            if (isset($industries[$industryId])) {
                                $industry_names[] = $industries[$industryId];
                            }
                        }
                        $industry_names_str = implode(', ', $industry_names);

                        // Process preferred industry data
                        $prefIndustryIds = json_decode($userdetails->pref_industry, true) ?? [];
                        $preferred_industry_names = [];
                        foreach ($prefIndustryIds as $industryId) {
                            if (isset($industries[$industryId])) {
                                $preferred_industry_names[] = $industries[$industryId];
                            }
                        }
                        $preferred_industry_names_str = implode(', ', $preferred_industry_names);

                        // Process skills
                        $skills = json_decode($userdetails->skill, true);
                        $skill_list = implode(', ', $skills ?? []);

                        // Fetch the work experience year range from preloaded $yearsOfExp data
                        $wrkExpYearsId = $userdetails->wrk_exp_years; // Single ID for work experience years
                        $wrkExpYearRange = $yearsOfExp[$wrkExpYearsId] ?? ''; // Get the year range if exists

                        // Fetch the employee type from preloaded $employTypes data
                        $preEmpType = $userdetails->pref_emp_type; // Single ID for work experience years
                        $preEmpTypeName = $employTypes[$preEmpType] ?? ''; // Get the year range if exists


                        // Fetch the employee type from preloaded $noticePeriod data
                        $noticePeriodDuration = $userdetails->notice_period_duration; // Single ID for work experience years
                        $notice_period_duration = $noticePeriod[$noticePeriodDuration] ?? ''; // Get the year range if exists

                        // Process experience letter URL
                        $experience_letter_url = !empty($userdetails->experience_letter)
                            ? (strpos($userdetails->experience_letter, 'my.sharepoint.com') !== false
                                ? $userdetails->experience_letter
                                : asset('storage/' . $userdetails->experience_letter))
                            : '';

                        // Check if profile photo exists and is set
                        $profileImageUrl = isset($userdetails->profile_photo) && !empty($userdetails->profile_photo)
                            ? asset('storage/' . $userdetails->profile_photo)
                            : ''; // Default to empty string if not set

                        $gender = $userdetails->gender == 1 ? 'Male' : ($userdetails->gender == 2 ? 'Female' : 'Other');

                        // Create the row data
                        $row = [
                            $user->id,
                            $user->username,
                            $user->email,                    
                            $userdetails->phone_number,
                            $userdetails->resume_cv,
                            $userdetails->fullname,
                            $gender,
                            $profileImageUrl,
                            $userdetails->phone_number,
                            $userdetails->dob,
                            $userdetails->pincode,
                            $userdetails->city,
                            $userdetails->country,                            
                            $userdetails->state,
                            $userdetails->address,
                            $userdetails->wrk_exp__title,
                            $userdetails->wrk_exp_company_name,
                            $wrkExpYearRange,
                            $experience_letter_url,
                            $industry_names_str,
                            $userdetails->employed,
                            $skill_list,
                            $userdetails->wrk_exp_responsibilities,
                            $educationStr,
                            // $collegeNamesStr,
                            // $degreesStr,
                            // $graduationYearsStr,
                            // $fieldsOfStudyStr,
                            $certificateStr,
                            // $certificateNamesStr,
                            // $certificateObtainDatesStr,
                            // $certificateIssuingStr,
                            $userdetails->pref_title,
                            $preEmpTypeName,
                            // $userdetails->pref_emp_type,
                            $userdetails->pref_location,
                            $notice_period_duration,
                            $userdetails->current_salary,
                            $userdetails->pref_salary,
                            $preferred_industry_names_str,
                            $currencySymbols[$userdetails->current_salary_currency] ?? '',
                            $currencySymbols[$userdetails->pref_salary_currency] ?? '',
                            $referenceStr,
                            // $referenceNamesStr,
                            // $referencePhonesStr,
                            formatBoolean($userdetails->work_authorization_status),
                            formatBoolean($userdetails->availability),
                            $userdetails->linkdin,
                            $userdetails->twitter,
                            $userdetails->instagram,
                            $userdetails->facebook,
                            $userdetails->other,
                            formatapprovalBoolean($user->approval),
                            $user->created_at->toDateTimeString(),
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
