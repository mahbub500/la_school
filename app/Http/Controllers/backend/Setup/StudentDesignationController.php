<?php

namespace App\Http\Controllers\backend\Setup;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class StudentDesignationController extends Controller
{
    public function DesignationView(){
        $data["AllDatas"] = Designation::all();
        return view('backend.setup.designation.index',$data);
    }

    public function DesignationAdd(){
        return view('backend.setup.designation.add_designation');
    }

    public function DesignationStore(Request $request){
        $validation = $request->validate([
            'designation' => 'required|unique:designations,designation',                        
        ]);
        $data = new Designation();
        $data->designation = strtoupper($request->designation);
        $data->created_at = Carbon::now();
        $data->save();

        $notification = array(
            'message' => 'Designation Created Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('Designation.view')->with($notification);
    }
    public function DesignationEdit($id){
        $data['AllData'] = Designation::findOrFail($id);
        return view('backend.setup.designation.edit_designation',$data);
    }
    public function DesignationUpdate(Request $request,$id){
        $validation = $request->validate([
            'designation' => 'required|unique:designations,designation',                 
        ]);
        $data = Designation::findOrFail($id);
        $data->designation =  strtoupper($request->designation);
        $data->created_at = Carbon::now();
        $data->save();       

        $notification = array(
            'message' => 'Designation Updated Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('Designation.view')->with($notification);
        
    }

    public function DesignationDelete($id){
        $data = Designation::findOrFail($id);
        $data->delete();
        $notification = array(
            'message' => 'Designation Deleted Successfully',
            'alert-type'=> 'info'
        );
        return redirect()->route('Designation.view')->with($notification);

    }
}
