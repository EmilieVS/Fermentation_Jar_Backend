<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller {

    public function register(Request $request) {

        $data = $request->validate([
            'displayName' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'bio' => 'nullable|string',
        ]);

        // Mass assign the validated request data to a new instance of the User model
        $user = User::create($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }
    
    public function getUserData() {

        $userdata = auth()->user();

        return response()->json([
            'user' => $userdata
        ], 200);
    }

    public function checkUser(Request $request) {

        return $request->user();
    }

    public function editProfile(Request $request) {

        $user = auth()->user();

        try {
            $updatedData = $request->validate([
                'displayName' => ['sometimes', 'string', 'max:255'],
                'email' => ['sometimes', 'email', Rule::unique('users')->ignore($user->id)],
                'password' => ['sometimes', 'nullable', 'min:7']
            ]);
        }
        catch (ValidationException $erreur) {
            return 'erreur';
        }

        if (!empty($updatedData['password'])) {
            $updatedData['password'] = Hash::make($updatedData['password']);
        }

        $user->update($updatedData);

        return response()->json([
            'data' => $updatedData,
        ], 200);
    }

}