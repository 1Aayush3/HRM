<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','gender','password','alt_email','dob','joined','left','phone',
        'review','designation_id','pan','cit','bank','acc','branch','image','cit_img',
        'citizenship','pan_img','contract','appointment'
    ];
    // public $dates = ['created_at', 'updated_at', 'date'];

    // public function setDateAttribute($date)
    // {
    //     $this->attributes['date'] = Carbon::createFromFormat('d/m/Y', $date);
    // }


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
    public function designation()
    {
        return $this->belongsTo('App\Designation');//second parameter is foreign key
    }
}
