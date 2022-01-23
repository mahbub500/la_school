<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Auth;

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

        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|unique:users',
            'address' => 'required|min:6',
            'gender' => 'required',
            'image' => 'required|mimes:jpg,bmp,png',
        ]);
        $data = User::findOrFail(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if($request->file('image')){
            $file = $request->file('image');
          
            @unlink(public_path('backend/new/'.$data->image));
            $filename = date('YmdHi').('.') .$file->getClientOriginalExtension();
            // dd($filename);
            $file->move(public_path('backend/new'),$filename);
            // $file->move_uploaded_file(public_path('backend/new',$filename));
            
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

    public function PasswordView(){
        return view('backend.user.edit_password');
    }
    public function PasswordUpdate(Request $request){
        $validation = $request->validate([
            'OldPassword' => 'required',
            'password' => 'required|confirmed',            
        ]);
        $hashePassword = Auth::user()->password;
        // $CurrentPassword = Hash::make($request->OldPassword);
        // // dd($CurrentPassword);
        // if($hashePassword== $CurrentPassword){
        //     dd('hello');
        // }       
       

        if(Hash::check($request->OldPassword,$hashePassword)){
            // return "Hello";
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back();

        }

        return view('backend.user.edit_password');
    }

}
