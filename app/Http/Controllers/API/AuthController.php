<?php

namespace App\Http\Controllers\API;
 use App\Models\User;
//use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller

{
    //

    public function register(Request $request)
    {
  $data = $request->validate([
    'name'=>'required|string|max:191',
'email'=>'required|email|max:191|unique:users,email',
'password'=>'required|string',
]);
  $user = User ::create([
    'name'=>$data['name'],
    'email'=>$data['email'],
    'password'=>Hash::make($data['password']),
]);
  $token=$user->createToken('laravelapi')->plainTextToken;
  $response=[
    'user'=>$user,
    'token'=>$token,
    ];
    return response($response,201);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response(['message'=>'Loged Out succcefully.']);
    }
}
