<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login() {
        return view('templates.login');
    }
    public function loginValidade(Request $request) {
        $user = User::where('login', $request->login)->where('status', "ativo")->first();
        if($user == null){
            return view('templates.login');
        }
        $isValid = Hash::check($request->senha, $user->senha,[
            'rounds' => 12
        ]);
        if ($isValid == false) {
            return view('templates.login');
        }
        Auth::login($user);

        return redirect('/');
    } 
}
