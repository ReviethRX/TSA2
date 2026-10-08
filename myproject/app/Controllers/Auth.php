<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/tasks');
        }

        return view('auth/login', ['title' => 'Login']);
    }

    public function attempt()
    {
        if (! $this->validate(['username' => 'required', 'password' => 'required'])) {
            return redirect()->back()->withInput()->with('error', 'Username and password are required.');
        }

        $model = new UserModel();
        $user  = $model->where('username', $this->request->getPost('username'))->first();

        if ($user && ! empty($user['password'])
            && password_verify($this->request->getPost('password'), $user['password'])) {

            session()->regenerate();
            session()->set([
                'isLoggedIn' => true,
                'userId'     => $user['id'],
                'username'   => $user['username'],
            ]);

            return redirect()->to('/tasks')->with('message', 'Welcome back, ' . $user['username'] . '.');
        }

        return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('error', 'You have been logged out.');
    }
}