<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the default "industries"
    protected $table = 'industry';

    // Specify the fillable columns for mass assignment
    protected $fillable = [
        'name',
        'sub_parent_id',
        'main_parent_id',
        'main',
        'status',
    ];
}
