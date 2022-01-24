<?php

namespace App\Http\Controllers\backend\Setup;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentClassController extends Controller
{
    public function StudentView(){
        $data['AllData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    }
}
