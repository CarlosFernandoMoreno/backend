<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
class UserController extends Controller
{
   
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
        'name'=>'required|string|max:255',
        'email'=>'required|string|email|max:255|unique:users',
        'password'=>'required|string|min:5']);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = new User();
        $user->name = $request->name; 
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['data'=>$user,'accecss_token'=>$token,'token_type'=>'Bearer',]);
    }

    
    public function login(Request $request)
    {
        $val = $request->only('email','password');
        if(!Auth::attempt($val)){
            return response()->json(['message' => $val], 401);
        } 
        
        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['accessToken'=>$token,'token_type'=>'Bearer','user'=>$user]); 
    }


    
    public function destroy($id)
    {
        $user = User::findORFail($id);
        $user->delete();
        return response()->json(['message'=>'Usuario Eliminado']);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message'=>'cerraste sesion']);
    }
}
