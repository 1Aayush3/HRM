<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    public $table = "designations";
    protected $fillable = ['designation'];
    public function user()
    {
        return $this->belongsTo('App\User','designation_id');//second parameter is foreign key
    }
}
