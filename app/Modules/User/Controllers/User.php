<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('App\Modules\Auth\Views\login');
    }

    public function login()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $model = new UserModel();
        $user  = $model->where('email', $email)->first();

        // CEK USER
        if ($user && $password === $user['password']) {

            session()->set([
                'user_id'  => $user['id'],
                'nama'     => $user['nama'],
                'email'    => $user['email'],
                'role'     => $user['role'],
                'isLogin'  => true
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
