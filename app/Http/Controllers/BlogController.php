<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // create blog controller
    public function createPost() {
        return view('createPost');
    }

    public function storePost(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        Post::create($incomingFields);
        return redirect("/");
    }

    public function viewSinglePost(Post $post){
        $title = $post->title;
        $body = $post->body;
        return view('singlePost', ['title' => $title, 'body' => $body]);
    }

}
