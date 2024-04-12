<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showForm(){
        return view('create-post');
    }

    public function createNewPost(Request $request){
        $payload = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $payload['title'] = strip_tags($payload['title']);
        $payload['body'] = strip_tags($payload['body']);
        $payload['user_id'] = auth()->id();

        Post::create($payload);
        return 'create new post';
    }
}
