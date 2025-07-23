<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $data = $request->validate([
            'display_name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',

        ]);

        // Mass assign the validated request data to a new instance of the User model
        $user = User::create($data);
        $token = $user->createToken('my-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'Type' => 'Bearer'
        ]);
    }

    public function getUserData()
    {
        $userdata = auth()->user();


        return response()->json([
            'data' => $userdata
        ]);

    }

    public function checkUser(Request $request)
    {
        return $request->user();
    }

    public function editProfile(Request $request)
    {
       
        $user = auth()-> user();
    
   
        // $user->$

        $updatedData = $request->validate([
            'display_name' => ['string'],
            'email' => ['email', Rule::unique('users')->ignore($user->id)],
            'password' => ['min.8', 'confirmed'],

        ]);
    echo ($$updatedData);

        if (!empty($updatedData['password'])) {
            $updatedData['password'] = Hash::make($updatedData['password']);
        } else {
            unset($updatedData['password']);
        }


        $user->update($updatedData);


        
        return response()->json([
            'data' => $updatedData,
        ], 200);
    }

    

}
