<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost (Request $request) {

     $user = auth()->user();
     $display_name = $user->display_name;
     $username = $user->username;

     $descriptionRules = $request -> validate([
        'description' => 'required','min:50','max:300',
     ]);
        
        $postContent = Post::create([
            'display_name' => $display_name,
            'username' => $username,
            'description' => $descriptionRules['description']
              
        ]);
   
        return response()->json([
            'message' => 'Thanks for sharing',
            'data' => $postContent,
        ], 200);
    }


    public function getUserPost () {

        $user = auth()->user();
        $username = $user->username;

        $post = Post::where('username', $username)
            ->get();

        $postContent = $post->pluck('description');

        $postList = Post::wherein('description', $postContent)
            ->get();

        return response()->json($postList);
    }



}
