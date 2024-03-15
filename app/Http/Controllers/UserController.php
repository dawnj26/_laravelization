<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function show_registration() {
        return view('register');
    }

    public function show_login(Request $request) {
        $messages = [
            'name.required' => 'Name is empty',
            'email.required' => 'Email is empty',
            'password.required' => 'Password is empty',
            'name.max' => 'Name exceeded 10 characters',
            'password.min' => 'Password is below 6 characters',
            'email.email' => 'Your email is not an email',
        ];


        $validator = Validator::make($request->all(), [
            'name' => 'required|max:10',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Session::put('name', $request->input('name'));
        Session::put('email', $request->input('email'));
        Session::put('password', $request->input('password'));

        return view('login');
    }

    public function show_reg(Request $request) {
        if (!$request->session()->has('email')){
            return redirect('/register')->withErrors(['not_reg' => 'Register first']);
        }


        return view('login');
    }

    public function show_index() {
        if (!session()->has('email')) {
            return redirect('/register')->withErrors(['invalid' => 'Please register']);
        }

        return view('index');
    }

    public function logout() {
        Session::flush();

        return redirect('/register');
    }
}
