<?php

namespace App\Http\Controllers\backend\Setup;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\StudentSubject;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class AssignSubjectController extends Controller
{
    public function AssignSubjectView(){
        // $data['AllDatas'] = AssignSubject::all();
        $data['AllDatas'] = AssignSubject::select('class_id')->groupBy('class_id')->get();   
        return view('backend.setup.assign.index',$data);
    }
    public function AssignSubjectAdd(){
        // Student Class Model
        $data['StudentClasses'] = StudentClass::all();
         // Student Subject Model
        $data['StudentSubjects'] = StudentSubject::all();
        return view('backend.setup.assign.add_assign',$data);

    }
    public function AssignSubjectStore(Request $request){

        $SubjectCount = count($request->subject_id);
        if($SubjectCount !=NULL){
            for($i=0; $i<$SubjectCount; $i++){
    
                $fee_amount = new AssignSubject();
                $fee_amount->class_id = $request->class_id;
                $fee_amount->subject_id = $request->subject_id[$i];
                $fee_amount->full_mark = $request->full_mark[$i];
                $fee_amount->pass_mark = $request->pass_mark[$i];
                $fee_amount->subjective_mark = $request->subjective_mark[$i];
                $fee_amount->created_at = Carbon::now();
                $fee_amount->save();
                
            } //End For
        } //End If
    
        $notification = array(
            'message' => 'Data Inserted Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('Assign.Subject.view')->with($notification);
    }

    public function AssignSubjectEdit($class_id){
        $data['editData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        // dd($data['editData']->toArray()); 
        // Student Class Model
        $data['classes'] = StudentClass::all();
         // Student Subject Model
        $data['subjects'] = StudentSubject::all();    
        return view('backend.setup.assign.edit_assign',$data);
    }
    public function AssignSubjectUpdate(Request $request,$class_id){
        if($request->subject_id == NULL){
            $notification = array(
                'message' => 'Sorry You don\'t Add Any Class Successfully',
                'alert-type'=> 'error'
            );
            return redirect()->route('Assign.Subject.edit',$class_id)->with($notification);
        }else{
            $countClass = count($request->subject_id);
            AssignSubject::where('class_id',$class_id)->delete();
            for($i=0; $i<$countClass; $i++){
                $fee_amount = new AssignSubject();
                $fee_amount->class_id = $request->class_id;
                $fee_amount->subject_id = $request->subject_id[$i];
                $fee_amount->full_mark = $request->full_mark[$i];
                $fee_amount->pass_mark = $request->pass_mark[$i];
                $fee_amount->subjective_mark = $request->subjective_mark[$i];
                $fee_amount->created_at = Carbon::now();
                $fee_amount->save();

            } //End For
            $notification = array(
                'message' => 'Assign Subject Updated Successfully',
                'alert-type'=> 'success'
            );
            return redirect()->route('Assign.Subject.view')->with($notification);
        } // End If

    }
    public function AssignSubjectDetail($class_id){
        $data['AllDatas'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        return view('backend.setup.assign.detail_assign',$data);
    }

}
