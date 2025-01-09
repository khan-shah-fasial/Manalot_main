<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    // Specify the table name (if different from pluralized model name)
    protected $table = 'userdetails';

    // Specify the primary key (if not 'id')
    protected $primaryKey = 'id';

    // Indicate whether the primary key is auto-incrementing
    public $incrementing = true;

    // Specify the data type of the primary key
    protected $keyType = 'int';

    // Allow mass assignment for the specified fields
    protected $fillable = [
        'user_id', 'fullname', 'profile_photo', 'gender', 'phone_number', 'dob',
        'address', 'state', 'city', 'pincode', 'country', 'resume_cv', 'job_title',
        'industry', 'experience_Status', 'wrk_exp__title', 'wrk_exp_company_name',
        'wrk_exp_years', 'wrk_exp_responsibilities', 'employed', 'experience_letter',
        'edu_degree', 'edu_clg_name', 'edu_graduation_year', 'edu_field', 'edu_data',
        'skill', 'certificate_data', 'pref_title', 'pref_emp_type', 'pref_industry',
        'pref_location', 'pref_salary', 'current_salary', 'current_salary_currency',
        'pref_salary_currency', 'references', 'work_authorization_status', 'availability',
        'notice_period', 'notice_period_duration', 'linkdin', 'twitter', 'instagram',
        'facebook', 'other'
    ];

    // Indicate whether the model should use timestamps
    public $timestamps = true;

    // Define relationships (if applicable)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
