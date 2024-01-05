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
        'month',
        'year',
        // Add other fields as needed
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
    // Your model code here
}