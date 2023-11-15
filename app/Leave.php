<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'leaves';
    protected $fillable = ['employee_id', 'start_date', 'end_date', 'reason'];
}
