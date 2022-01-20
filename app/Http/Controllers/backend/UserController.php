<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function UserView(){
        // dd('view user');
    //    $allData =  User::all();
       $data['AllDatas'] =  User::all();
       return view('backend.user.index',$data);

    }
    public function UserAdd(){
        return view('backend.user.add_user');
    }
    public function UserStore(Request $request){


        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'UserRole' => 'required',
            'password' => 'required|min:6',
        ]);

        $data = new User();
        $data->usertype = $request->UserRole;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'User Created Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('user.view')->with($notification);
    }
    public function UserDelete($id){
        $data = User::findOrFail($id);
        $data->delete();
        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type'=> 'warning'
        );
        return redirect()->route('user.view')->with($notification);

    }
    public function UserEdit($id){
        $data['AllData'] = User::findOrFail($id);
        return view('backend.user.edit_user',$data);
    }
    public function UserUpdate (Request $request, $id){
        // $validation = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'UserRole' => 'required',
            
        // ]);

        $data = User::findOrFail($id);
        $data->usertype = $request->UserRole;
        $data->name = $request->name;
        $data->email = $request->email;
        // $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('user.view')->with($notification);
    }
}
