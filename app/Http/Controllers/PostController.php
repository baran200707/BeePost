<?php

namespace App\Http\Controllers;

use App\Models\Post;
use bootstrap\Attachment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function indexPosts() {
        return view('posts.createPost');
    }

    public function makePost(Request $request) {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->input('content');
        $post->user_id = $request->user()->id;
        $post->save();

        if($request -> hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $attachment = new Attachment();
            $attachment->post_id = $post->id;
            $attachment->file_name = $file->getClientOriginalName();
            $attachment->file_path = $path;
            $attachment->file_size = $file->getSize();
            $attachment->file_type = $file->getClientMimeType();
            $attachment->save();
        }
        return redirect('/');
    }

    public function showPosts() {
        $posts = Post::with('attachments')->latest()->paginate(5);
        return view('index', ['posts' => $posts]);
    }
}
