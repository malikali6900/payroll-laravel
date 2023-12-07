<?php

namespace App;
// namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'role', 'user_img', 'designation',
    ];
    protected $attributes = [
        'name' => '', // Add default value for the 'name' field
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function salary()
    {
        return $this->hasOne(Salary::class, 'employee_id');
    }

}
