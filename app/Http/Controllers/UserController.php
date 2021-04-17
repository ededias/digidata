<?php

namespace App\Http\Controllers;

// use GuzzleHttp\Psr7\Request as Psr7Request;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    

    public function getAllUsers(Request $request) 
    {
        $users = User::all();
        return view('templates.index', compact('users'));
    }

    public function createUser() {
        return view('templates.create');
    }

    public function saveUser(Request $request) 
    {
        $user = new User();

        $user->name = $request->nome;
        $user->login = $request->login;
        $user->senha = Hash::make($request->senha, [
            'rounds' => 12
        ]);
        $user->status = $request->status;
        $user->save();
        return new JsonResponse("Cadastro realizado com sucesso", 200, ['charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    function findUser(Request $request) {
        $users = User::where('name', $request->nome)->where('status', $request->status)->get();
        return view('templates.index', compact("users"));
    }

    function getOneUser($id) 
    {
        $user = User::query()->find($id);
        return view('templates.edit', compact('user'));
    }

    function editUser(Request $request, $id) 
    {
        $user = User::query()->find($id);
        $user->name = $request->nome;
        $user->login = $request->login;
        $user->status = $request->status;
        $user->senha = Hash::make($request->senha, [
            'rounds' => 12
        ]);
        $user->save();
        return new JsonResponse("Edição realizada com sucesso", 200, ['charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    public function delete(Request $request) {
        User::destroy($request->id);
        return redirect('/');
    }

}
