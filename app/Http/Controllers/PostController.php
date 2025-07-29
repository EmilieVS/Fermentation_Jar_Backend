<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller {

    public function createPost(Request $request) {

        $user = auth()->user();

        $validated = $request->validate([
            'description' => ['required', 'min:20', 'max:300'],
        ]);

        $post = Post::create([
            'user_id' => $user->id,
            'description' => $validated['description'],
        ]);
        

        return response()->json([
            'message' => 'Thanks for sharing',
            'data' => [
                'description' => $post->description,
                'display_name' => $user->display_name,
                'username' => $user->username,
                'created_at' => $post->created_at,
            ],
        ], 200);
    }

    public function getUserPost() {

        $user = auth()->user();
        $user_id = $user->id;

        $posts = Post::where('user_id', $user_id)->get();

        $response = $posts->map(function ($post) {
            return [
                'description' => $post->description,
                'display_name' => $post->user->display_name,
                'username' => $post->user->username,
                'created_at' => $post->created_at,
            ];
        });

        return response()->json($response, 200);
    }

    public function getAllPosts() {
        
        $posts = Post::all();

        $response = $posts->map(function ($post) {
            return [
                'description' => $post->description,
                'display_name' => $post->user->display_name,
                'username' => $post->user->username,
                'created_at' => $post->created_at,
            ];
        });

        return response()->json($response, 200);
    }

}