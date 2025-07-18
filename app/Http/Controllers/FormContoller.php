<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FormContoller extends Controller
{
    //
    function loginView() {
        return view('login');
    }

    function signupView() {
        return view('signup');
    }

    function login(Request $request) {
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $data = User::where('name', $request->username)
                ->first();

        return redirect()->route('profile');
    }
    
    function signup(Request $request) {
        $request->validate([
            'username'=>'required|string|max:12',
            'email'=>'required|email|max:30|unique:users,email',
            'password'=>'required|max:30|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirm_password'=>'required|same:password',
            'phone_no'=>'required', 
            'image'=>'required|mimes:png,jpg|max:2048'
        ],[
            'username.required'=>'This field is required',
            'password.regex'=>'In the password field you need one (special character, number, uppercase and lowecase character',
        ]);

        $data = new User();
        $data->name=$request->username;
        $data->email=$request->email;
        $data->password=$request->password;
        $data->phone_no=$request->phone_no;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('upload');
            $image->move($destination,$filename);
            $imageurl = 'upload/'.$filename;
            $data->image = $imageurl;
        }

        $data->save();

        return redirect()->route('form.login');
    }

    function profile() {
        $data = User::where('id',2)->first();
        return view('profile',compact('data'));
    }
}