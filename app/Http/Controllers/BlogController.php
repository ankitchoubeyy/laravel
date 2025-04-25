<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // create blog controller
    public function createPost()
    {
        return view('createPost');
    }

    public function storePost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        $newPost = Post::create($incomingFields);
        return redirect("/post/{$newPost->id}");
    }

    public function viewSinglePost(Post $post)
    {
        if ($post->user_id === auth()->user()->id) {
            $post['body'] = Str::markdown($post->body);
            return view('singlePost', ['post' => $post]);
        } else {
            return "you're not a valid author";
        }

    }

    public function deletePost(Post $post){
        $post -> delete();
        return redirect('/profle'. auth()->user()->username);
    }

}
