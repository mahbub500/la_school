<?php

namespace App\Http\Controllers\backend\Setup;

use App\Models\StudentExam;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class StudentExamController extends Controller
{
    public function ExamView(){
        $data["AllDatas"] = StudentExam::all();
        return view('backend.setup.exam.index',$data);
    }

    public function ExamAdd(){
        return view('backend.setup.exam.add_exam');
    }

    public function ExamStore(Request $request){
        $validation = $request->validate([
            'Exam' => 'required|unique:student_exams,Exam',                        
        ]);
        $data = new StudentExam();
        $data->Exam = strtoupper($request->Exam);
        $data->created_at = Carbon::now();
        $data->save();

        $notification = array(
            'message' => 'Emam Created Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.Exam.view')->with($notification);
    }
    public function ExamEdit($id){
        $data['AllData'] = StudentExam::findOrFail($id);
        return view('backend.setup.exam.edit_exam',$data);
    }
    public function ExamUpdate(Request $request,$id){
        $validation = $request->validate([
            'Exam' => 'required|unique:student_exams,Exam',                   
        ]);
        $data = StudentExam::findOrFail($id);
        $data->Exam =  strtoupper($request->Exam);
        $data->created_at = Carbon::now();
        $data->save();       

        $notification = array(
            'message' => 'Exam Updated Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.Exam.view')->with($notification);
        
    }

    public function ExamDelete($id){
        $data = StudentExam::findOrFail($id);
        $data->delete();
        $notification = array(
            'message' => 'Exam Deleted Successfully',
            'alert-type'=> 'info'
        );
        return redirect()->route('student.Exam.view')->with($notification);

    }
}
