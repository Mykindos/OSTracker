<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller {

    public function registerUser(Request $request){
        $user = new User();
        //var_dump($request);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->api_token = str_random(60);
        $user->save();

        return response()->json(["message" => "User created"], 201);
    }

}
