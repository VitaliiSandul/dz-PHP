<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use \Esensi\Model\Model;

class appuser extends Model
{   
    protected $primaryKey='userid';
    protected $table='appusers';
    protected $fillable=array('firstname','lastname','email','login','password','created_at','updated_at');
    protected $rules=[
        'firstname'=>['required','max:100'],
        'lastname'=>['required','max:100'],
        'email'=>['required','max:100','email address'],
        'login'=>['required','max:100','unique'],
        'password'=>['required','max:100']
    ];
}
