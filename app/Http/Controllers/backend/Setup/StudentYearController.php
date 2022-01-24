<?php

namespace App\Http\Controllers\backend\Setup;

use App\Models\StudentYear;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class StudentYearController extends Controller
{
    public function YearView(){
        $data["AllDatas"] = StudentYear::all();
        return view('backend.setup.year.index',$data);
    }
    public function YearAdd(){
        return view('backend.setup.year.add_year');
    }

    public function YearStore(Request $request){
        $validation = $request->validate([
            'year' => 'required|numeric|unique:student_years,year',                        
        ]);
        $data = new StudentYear();
        $data->year = $request->year;
        $data->created_at = Carbon::now();
        $data->save();

        $notification = array(
            'message' => 'Class Created Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }

    public function YearEdit($id){
        $data['AllData'] = StudentYear::findOrFail($id);
        return view('backend.setup.year.year_edit',$data);

    }
    public function YearUpdate(Request $request, $id){
        $validation = $request->validate([
            'year' => 'required|numeric|unique:student_years,year',                        
        ]);
        $data = StudentYear::findOrFail($id);
        $data->year = $request->year;
        $data->created_at = Carbon::now();
        $data->save();
        

        $notification = array(
            'message' => 'Year Updated Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }
    public function YearDelete($id){
        $data = StudentYear::findOrFail($id);
        $data->delete();
        $notification = array(
            'message' => 'Year Deleted Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }



}
