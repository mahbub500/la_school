<?php

namespace App\Http\Controllers\backend\Setup;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class StudentClassController extends Controller
{
    public function StudentView(){
        $data['AllDatas'] = StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    }
    public function ClassAdd(){
         return view('backend.setup.student_class.add_class');
       }
    public function ClassStore(Request $request){
        $validation = $request->validate([
            'name' => 'required|unique:student_classes,name',                        
        ]);
        $data = new StudentClass();
        $data->name = $request->name;
        $data->created_at = Carbon::now();
        $data->save();

        $notification = array(
            'message' => 'Class Created Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }

    public function ClassEdit($id){
        $data['AllData'] = StudentClass::findOrFail($id);
        return view('backend.setup.student_class.edit_class',$data);
    }
    public function ClassDelete($id){
        $data = StudentClass::findOrFail($id);
        $data->delete();
        $notification = array(
            'message' => 'Class Deleted Successfully',
            'alert-type'=> 'info'
        );
        return redirect()->route('student.class.view')->with($notification);
    }
    public function ClassUpdate(Request $request,$id){
        $validation = $request->validate([
            'name' => 'required|unique:student_classes,name',                        
        ]);
        $data = StudentClass::findOrFail($id);
        $data->name = $request->name;
        $data->created_at = Carbon::now();
        $data->save();
        

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }

}
