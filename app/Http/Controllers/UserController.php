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
        $request->validate(['password' => ['required', 'confirmed', 'min:8'],
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255']],
            ['password.min' => 'Пароль должен иметь от 8 символов',
                'password.required' => 'Введите пароль',
                'password.confirmed' => 'Пароли не совпадают',
                'name.required' => 'Введите имя',
                'name.max' => 'Слишком большое имя',
                'email.required' => 'Введите почту',
                'email.max' => 'Слишком большая почта',
                'email.email' => 'Введите корректную почту']);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect('/');
    }

    public function login(Request $request) {
        $user = User::getByEmail($request->input('email'));
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->withInput()->with('error', 'Пароль или почта не правильные');
        }
        Auth::login($user);
        return redirect('/');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function addAvatar(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = Auth::user();
        $avatar = $request->file('avatar');
        $user->avatar = $avatar;
        $user->save();
    }
}
