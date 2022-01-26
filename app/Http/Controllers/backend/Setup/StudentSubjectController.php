<?php

namespace App\Http\Controllers\backend\Setup;

use Illuminate\Http\Request;
use App\Models\StudentSubject;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class StudentSubjectController extends Controller
{
    public function SubjectView(){
        $data["AllDatas"] = StudentSubject::all();
        return view('backend.setup.subject.index',$data);
    }

    public function SubjectAdd(){
        return view('backend.setup.subject.add_subject');
    }

    public function SubjectStore(Request $request){
        $validation = $request->validate([
            'Subject' => 'required|unique:student_subjects,Subject',                        
        ]);
        $data = new StudentSubject();
        $data->Subject = strtoupper($request->Subject);
        $data->created_at = Carbon::now();
        $data->save();

        $notification = array(
            'message' => 'Subject Created Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.Subject.view')->with($notification);
    }
    public function SubjectEdit($id){
        $data['AllData'] = StudentSubject::findOrFail($id);
        return view('backend.setup.subject.edit_subject',$data);
    }
    public function SubjectUpdate(Request $request,$id){
        $validation = $request->validate([
            'Subject' => 'required|unique:student_subjects,Subject',                   
        ]);
        $data = StudentSubject::findOrFail($id);
        $data->Subject =  strtoupper($request->Subject);
        $data->created_at = Carbon::now();
        $data->save();       

        $notification = array(
            'message' => 'Subject Updated Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.Subject.view')->with($notification);
        
    }

    public function SubjectDelete($id){
        $data = StudentSubject::findOrFail($id);
        $data->delete();
        $notification = array(
            'message' => 'Subject Deleted Successfully',
            'alert-type'=> 'info'
        );
        return redirect()->route('student.Subject.view')->with($notification);

    }
}
