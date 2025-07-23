<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function editProfile($request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'display_name' => 'required|max:25:users,display_name,' .$user->id,
            'username' => 'required|username|max:25|unique:users,username,' .$user->id,
            'email' => 'required|email|max:25|unique:users,email,' .$user->id,
            'password' => 'nullable|min:8|confirmed|:users,password,' .$user->id,

        ]);

        /**
         * storing the input fields name & email in variable $input
         * type array
         **/
        $newUserData = $request->only('display_name', 'username', 'email', 'password');

        /**
         * Accessing the update method and passing in $input array of data
         **/
        $user->update($newUserData);

        /**
         * after everything is done return them pack to /profile/ uri
         **/
        return back();
    }


}
