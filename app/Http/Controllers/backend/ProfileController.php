<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function ProfileView(){
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('backend.user.view_profile',compact('user'));

    }
    public function ProfileEdit(){
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('backend.user.edit_profile',compact('user'));

    }
    public function ProfileStore(Request $request){
        $data = User::findOrFail(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if($request->file('image')){
            $file = $request->file('image');
          
            @unlink(public_path('backend/images/'.$data->image));
            $filename = date('YmdHi'). ('.') .$file->getClientOriginalExtension();
            // dd($filename);
            $file->move(public_path('backend/new/',$filename));
            
            // dd($file);
            $data['image']= $filename;
             
        }
        $data->save();
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('Profile.view')->with($notification);
    }
}
