<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'leaves';
    protected $fillable = ['employee_id', 'name', 'start_date', 'end_date', 'reason', 'status'];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}