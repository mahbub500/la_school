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
    public function UserStore(Requests $request){


        $validation = $request->validate([
            'email' => 'required|unique.users',
            'name' => 'required',
            'password' => 'required',
        ]);

        $data = new User();
        $data->userType = $request->userType;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redorect()->route('user.view');



    }
}
