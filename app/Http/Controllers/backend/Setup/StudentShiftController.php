<?php

namespace App\Http\Controllers\backend\Setup;

use App\Models\StudentShift;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class StudentShiftController extends Controller
{
    public function ShiftView(){
        $data["AllDatas"] = StudentShift::all();
        return view('backend.setup.shift.index',$data);
    }

    public function ShiftAdd(){
        return view('backend.setup.shift.add_shift');
    }

    public function ShiftStore(Request $request){
        $validation = $request->validate([
            'shift' => 'required|unique:student_shifts,shift',                        
        ]);
        $data = new StudentShift();
        $data->shift = strtoupper($request->shift);
        $data->created_at = Carbon::now();
        $data->save();

        $notification = array(
            'message' => 'Shift Created Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.Shift.view')->with($notification);
    }
    public function ShiftEdit($id){
        $data['AllData'] = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift',$data);
    }
    public function ShiftUpdate(Request $request,$id){
        $validation = $request->validate([
            'shift' => 'required|unique:student_shifts,shift',                     
        ]);
        $data = StudentShift::findOrFail($id);
        $data->shift =  strtoupper($request->shift);
        $data->created_at = Carbon::now();
        $data->save();       

        $notification = array(
            'message' => 'Shift Updated Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.Shift.view')->with($notification);
        
    }

    public function ShiftDelete($id){
        $data = StudentShift::findOrFail($id);
        $data->delete();
        $notification = array(
            'message' => 'Shift Deleted Successfully',
            'alert-type'=> 'info'
        );
        return redirect()->route('student.Shift.view')->with($notification);

    }
}
