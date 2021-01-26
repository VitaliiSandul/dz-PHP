<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
// use \Esensi\Model\Model;

class apptask extends Model
{
    protected $primaryKey='taskid';
    protected $table='apptasks';
    protected $fillable=array('userid','title','details','creationdate','priority','status','created_at','updated_at');
    protected $rules=[
        'title'=>['required','max:100'],
        'details'=>['required','max:250'],
        'creationdate'=>['nullable','date'],
        'priority'=>['required'],
        'status'=>['required']
    ];
}
