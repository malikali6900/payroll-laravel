<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = ['employee_id', 'name', 'salary_amount', 'allowance', 'bonus'];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
