<?php

namespace App\Http\Controllers\backend\Setup;

use App\Models\StudentClass;
use App\Models\StudentFeeCategory;
use App\Models\FeeAmmount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class FeeAmmountController extends Controller
{
   public function FeeAmmountView(){
       $data['AllFees'] = FeeAmmount::all();
       return view('backend.setup.fee_amount.index',$data);
    }
    public function FeeAmmountAdd(){
        $data['AllFeesCategorys'] = StudentFeeCategory::all();      
        $data['AllClasess'] = StudentClass::all();      
       return view('backend.setup.fee_amount.add_ammount',$data);
   }
   public function FeeAmmountStore(Request $request){

   }
}
