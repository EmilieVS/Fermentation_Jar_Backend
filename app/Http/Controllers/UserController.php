<?php

namespace App\Http\Controllers;


use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{

    public function register(Request $request)
    {

        $data = $request->validate([
            'display_name' => 'required',
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

    public function getUserData()
    {

        $userdata = auth()->user();

        return response()->json([
            'user' => $userdata
        ], 200);
    }

    public function checkUser(Request $request)
    {

        return $request->user();
    }

    public function editProfile(Request $request)
    {

        $user = auth()->user();

        try {
            $updatedData = $request->validate([
                'display_name' => ['sometimes', 'string'],
                'email' => ['sometimes', 'email', Rule::unique('users')->ignore($user->id)],
                'password' => ['sometimes'],
                'bio' => ['sometimes', 'string']
            ]);
        } catch (ValidationException $erreur) {
            return response()->json([
                'erreur' => 'Erreur de validation.',
                'details' => $erreur->errors(),
            ], 422);
        }

        if (!empty($updatedData['password'])) {
            $updatedData['password'] = Hash::make($updatedData['password']);
        }

        $user->update($updatedData);

        $user->refresh();

        return response()->json([
            'user' => $user,
        ], 200);
    }


    public function deleteAccount()
    {
        $deletedUser = auth()->user();
        
        $deleteUserPost = Post::where('user_id',$deletedUser->id);

        try {
            
            $deletedUser->delete();
            $deleteUserPost ->delete();

            return response()->json([
                'message' => 'Compte supprimé avec succès',

            ], 200);
        } catch (Exception $erreur) {
            return response()->json([
                'erreur' => 'Erreur lors de la suppression.',
                'details' => $erreur,
            ], 500);
        }

    }

}