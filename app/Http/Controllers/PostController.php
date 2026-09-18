<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Attachment;
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
            if(count($request->file('image')) <= 4) {
                foreach ($request->file('image') as $file) {
                    $path = $file->store('images', 'public');
                    $attachment = new Attachment();
                    $attachment->post_id = $post->id;
                    $attachment->file_name = $file->getClientOriginalName();
                    $attachment->file_path = $path;
                    $attachment->file_size = $file->getSize();
                    $attachment->file_type = $file->getClientMimeType();
                    $attachment->save();
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Максимальное количесвто приложенных изображений 4');
            }
        }
        return redirect('/');
    }

    public function showPosts() {
        $posts = Post::with('attachments')->latest()->paginate(5);
        return view('index', ['posts' => $posts]);
    }

    public function deletePost(Request $request) {
        $post = Post::findOrFail($request->id);
        $post->delete();
        return redirect('/');
    }
}
