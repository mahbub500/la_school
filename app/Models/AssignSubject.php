<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    public function student_class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
        }
    public function student_subject(){
        return $this->belongsTo(StudentSubject::class,'subject_id','id');
        }
}
