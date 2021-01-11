<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash;
use App\User;

class ConnectController extends Controller
{
    public function getLogin() {
        return view('connect.login');
    }

    public function getRegister() {
        return view('connect.register');
    }

    public function postRegister(Request $request) {
        $rules = [
            'name' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'cPassword' => 'required|min:8|same:password'
        ];

        $messages = [
            'name.required' => 'Your name is required.',
            'lastName.required' => 'Your last name is required.',
            'email.required' => 'Your email is required.',
            'email.email' => 'Email format invalid.',
            'email.unique' => 'Email already exists.',
            'password.required' => 'Please password is required.',
            'password.min' => 'Password should be at least 8 characters.',
            'cPassword.required' => 'Is necessary confirm password.',
            'cPassword.min' => 'Password should be at least 8 characters.',
            'cPassword.same' => 'Passwords do not match'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->with('message', 'A ocurred error')->with('typeAlert', 'danger');
        } else {
            $user = new User;
            $user->name = e($request->input('name'));
            $user->last_name = e($request->input('last_name'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));

            if ($user->save()){
                return redirect('/login')->with('message', 'Your username was created, you can now login.')->with('typeAlert', 'success');
            }
        }
    }
}
