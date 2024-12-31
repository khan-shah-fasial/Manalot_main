<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural form of the model name
    protected $table = 'countries';

    // Specify the primary key if it's not `id`
    protected $primaryKey = 'id';

    // Disable timestamps if not needed
    public $timestamps = false;

    // Fillable attributes for mass assignment
    protected $fillable = [
        'code',
        'name',
    ];
}
