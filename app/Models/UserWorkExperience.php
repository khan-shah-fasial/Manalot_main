<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWorkExperience extends Model
{
    use HasFactory;

    protected $table = 'user_work_experience'; // Explicitly define the table name if necessary

    protected $fillable = [
        'user_id',
        'wrk_exp_title',
        'wrk_exp_company_name',
        'start_month_year',
        'end_month_year',
        'wrk_exp_responsibilities',
        'experience_letter'
    ];

    // Optionally, define the relationship to the User model (assuming you have a User model)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
