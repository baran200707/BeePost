<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showPosts() {
        $posts = Post::with('attachments')->latest()->paginate(5);
        return view('admin.adminPosts', ['posts' => $posts]);
    }

    public function showUsers() {
        $users = User::latest()->paginate(5);
        return view('admin.adminUsers', ['users' => $users]);
    }

    public function deleteUser(Request $request) {
        $user = User::findOrFail($request->id);
        $posts = $user->posts;
        foreach ($posts as $post) {
            $post->attachments()->delete();
            $post->delete();
        }
        Storage::disk('public')->deleteDirectory($user->avatar);
        $user->delete();
        return redirect('/admin/users');
    }
}
