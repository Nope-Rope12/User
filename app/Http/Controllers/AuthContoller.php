<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthContoller extends Controller
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
            'email'=>'required',
            'password'=>'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
             return redirect()->route('profile')->with('success','Login successful');
        }

        return redirect()->route('form.login')->with('error', 'Invalid login credentials');
    }
    
    function signup(Request $request) {
        $request->validate([
            'username'=>'required|string|max:12',
            'email'=>'required|email|max:30|unique:users,email',
            'password'=>'required|max:30|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirm_password'=>'required|same:password',
            'phone_no'=>'required', 
            'image'=>'required|mimes:png,jpg|max:2048',
        ],[
            'username.required'=>'This field is required',
            'password.regex'=>'In the password field you need one (special character, number, uppercase and lowecase character',
        ]);

        $data = new User();
        $data->name=$request->username;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);
        $data->phone_no=$request->phone_no;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('upload');
            $image->move($destination,$filename);
            $imageurl = 'upload/'.$filename;
            $data->image = $imageurl;
        }
        //$data->boi=$request->boi;

        $data->save();

        return redirect()->route('form.login')->with('success', 'Registration successful! Please log in.');
    }

    function profile() {
        $data = Auth::user();
        return view('profile',compact('data'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('form.login')->with('success', 'You have been logged out');
    }
}