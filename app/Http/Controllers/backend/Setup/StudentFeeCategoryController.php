<?php

namespace App\Http\Controllers\backend\Setup;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\StudentFeeCategory;
use App\Http\Controllers\Controller;

class StudentFeeCategoryController extends Controller
{
    public function FeeCategoryView(){
        $data["AllDatas"] = StudentFeeCategory::all();
        return view('backend.setup.fee_category.index',$data);
    }

    public function FeeCategoryAdd(){
        return view('backend.setup.fee_category.add_fee_category');
    }

    public function FeeCategoryStore(Request $request){
        $validation = $request->validate([
            'FeeCategory' => 'required|unique:student_fee_categories,FeeCategory',                        
        ]);
        $data = new StudentFeeCategory();
        $data->FeeCategory = strtoupper($request->FeeCategory);
        $data->created_at = Carbon::now();
        $data->save();

        $notification = array(
            'message' => 'Fee Category Created Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.FeeCategory.view')->with($notification);
    }
    public function FeeCategoryEdit($id){
        $data['AllData'] = StudentFeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_category',$data);
    }
    public function FeeCategoryUpdate(Request $request,$id){
        $validation = $request->validate([
            'FeeCategory' => 'required|unique:student_fee_categories,FeeCategory',                    
        ]);
        $data = StudentFeeCategory::findOrFail($id);
        $data->FeeCategory =  strtoupper($request->FeeCategory);
        $data->created_at = Carbon::now();
        $data->save();       

        $notification = array(
            'message' => 'Fee Category Updated Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('student.FeeCategory.view')->with($notification);
        
    }

    public function FeeCategoryDelete($id){
        $data = StudentFeeCategory::findOrFail($id);
        $data->delete();
        $notification = array(
            'message' => 'Fee Category Deleted Successfully',
            'alert-type'=> 'info'
        );
        return redirect()->route('student.FeeCategory.view')->with($notification);

    }
}
