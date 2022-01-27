<?php

namespace App\Http\Controllers\backend\Setup;

use App\Models\FeeAmmount;
use App\Models\StudentClass;
use App\Models\StudentFeeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;



class FeeAmmountController extends Controller
{

    // View All Data
   public function FeeAmmountView(){
    //    $data['AllFees'] = FeeAmmount::all();
       $data['AllFees'] = FeeAmmount::select('fee_category_id')->groupBy('fee_category_id')->get();    
       return view('backend.setup.fee_amount.index',$data);
    }
    // Show Add Page
    public function FeeAmmountAdd(){
        $data['AllFeesCategorys'] = StudentFeeCategory::all();      
        $data['AllClasess'] = StudentClass::all();      
       return view('backend.setup.fee_amount.add_ammount',$data);
   }
// Data Store
   public function FeeAmmountStore(Request $request){
   
    $countClass = count($request->class_id);
    if($countClass !=NULL){
        for($i=0; $i<$countClass; $i++){

            $fee_amount = new FeeAmmount();
            $fee_amount->fee_category_id = $request->fee_category_id;
            $fee_amount->class_id = $request->class_id[$i];
            $fee_amount->amount = $request->amount[$i];
            $fee_amount->created_at = Carbon::now();
            $fee_amount->save();
            
        } //End For
    } //End If

    $notification = array(
        'message' => 'Data Inserted Successfully',
        'alert-type'=> 'success'
    );
    return redirect()->route('fee.ammount.view')->with($notification);
    
   }

//    Show Edit Page

        public function FeeAmmounteEdit($fee_category_id){
            $data['editData'] = FeeAmmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
            // dd($data['editData']->toArray()); 
            $data['AllFeesCategorys'] = StudentFeeCategory::all();      
            $data['AllClasess'] = StudentClass::all();      
            return view('backend.setup.fee_amount.edit_ammount',$data);
        }

        // Updaet done
        public function FeeAmmountUpdate(Request $request,$fee_category_id){
// dd($fee_category_id);
            if($request->class_id == NULL){
                $notification = array(
                    'message' => 'Sorry You don\'t Add Any Class Successfully',
                    'alert-type'=> 'error'
                );
                return redirect()->route('fee.amount.edit',$fee_category_id)->with($notification);
            }else{
                $countClass = count($request->class_id);
                FeeAmmount::where('fee_category_id',$fee_category_id)->delete();
                for($i=0; $i<$countClass; $i++){
                    $fee_amount = new FeeAmmount();
                    $fee_amount->fee_category_id = $request->fee_category_id;
                    $fee_amount->class_id = $request->class_id[$i];
                    $fee_amount->amount = $request->amount[$i];
                    $fee_amount->created_at = Carbon::now();
                    $fee_amount->save(); 

                } //End For
                $notification = array(
                    'message' => 'Data Updated Successfully',
                    'alert-type'=> 'success'
                );
                return redirect()->route('fee.ammount.view')->with($notification);
            } // End If
        } // End Method

        // Ammount Detail 
        public function FeeAmmountDetail($fee_category_id){
            $data['DetailDatas'] = FeeAmmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
                 
            return view('backend.setup.fee_amount.detail_ammount',$data);
        }
  
}
