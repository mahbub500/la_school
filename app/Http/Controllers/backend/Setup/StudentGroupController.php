<?php

namespace App\Http\Controllers\backend\Setup;

use App\Models\StudentGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class StudentGroupController extends Controller
{
    public function GroupView(){
        $data["AllDatas"] = StudentGroup::all();
        return view('backend.setup.group.index',$data);
    }

    public function GroupAdd(){
        return view('backend.setup.group.add_group');
    }

    public function GroupStore(Request $request){
        $validation = $request->validate([
            'group' => 'required|unique:student_groups,group',                        
        ]);
        $data = new StudentGroup();
        $data->group = strtoupper($request->group);
        $data->created_at = Carbon::now();
        $data->save();

        $notification = array(
            'message' => 'Group Created Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    public function GroupEdit($id){
        $data['AllData'] = StudentGroup::find($id);
        return view('backend.setup.group.edit_group',$data);
    }
    public function GroupUpdate(Request $request,$id){
        $validation = $request->validate([
            'group' => 'required|unique:student_groups,group',                        
        ]);
        $data = StudentGroup::findOrFail($id);
        $data->group =  strtoupper($request->group);
        $data->created_at = Carbon::now();
        $data->save();       

        $notification = array(
            'message' => 'Group Updated Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
        
    }

    public function GroupDelete($id){
        $data = StudentGroup::findOrFail($id);
        $data->delete();
        $notification = array(
            'message' => 'Group Deleted Successfully',
            'alert-type'=> 'info'
        );
        return redirect()->route('student.group.view')->with($notification);

    }
}
