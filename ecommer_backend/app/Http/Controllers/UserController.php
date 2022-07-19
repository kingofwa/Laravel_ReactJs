<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function register(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->save();
        return $user;
    }
    function login(Request $res)
    {
        $user = User::where('email', $res->email)->first();
        if (!$user ||!Hash::check($res->password, $user->password)) {
            return ["error"=> "Email or password is not matched"];
        } else {
            return $user;
        }
    }


}
