<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_id',
        'name',
        'total_present',
        'total_absent',
        'total_days',
        // Add other fields as needed
    ];

    // Your model code here
}