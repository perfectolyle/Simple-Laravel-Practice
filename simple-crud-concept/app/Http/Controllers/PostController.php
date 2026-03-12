<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request){
        $incommingField = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incommingField['title'] = strip_tags($incommingField['title']);
        $incommingField['body'] = strip_tags($incommingField['body']);
        $incommingField['user_id'] = auth()->id();

        Post::create($incommingField);
        return redirect()->route('home');
    }

    public function editPost(Post $post){
        if(auth()->id() != $post->user_id){
            return redirect()->route('home');
        }

        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Post $post, Request $request){
        if(auth()->id() != $post->user_id){
            return redirect('/home');
        }

        $incommingField = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incommingField['title'] = strip_tags($incommingField['title']);
        $incommingField['body'] = strip_tags($incommingField['body']);

        $post->update($incommingField);
        return redirect()->route('home');
    }

    public function deletePost(Post $post){
        if(auth()->id() != $post->user_id){
            return redirect()->route('home');
        }

        $post->delete();
        return redirect()->route('home');
    }
}
