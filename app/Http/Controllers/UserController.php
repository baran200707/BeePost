<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function indexLogin() {
        return view('auth.login');
    }

    public function indexRegister() {
        return view('auth.register');
    }

    public function indexProfile() {
        return view('profile');
    }

    public function register(Request $request) {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $request->validate(['password' => ['required', 'confirmed', 'min:8']]);
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect('/');
    }

    public function login(Request $request) {
        $user = User::getByEmail($request->input('email'));
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['errors' => 'Email нету да такой и пароль'], 404);
        }
        Auth::login($user);
        return redirect('/');
    }
}
