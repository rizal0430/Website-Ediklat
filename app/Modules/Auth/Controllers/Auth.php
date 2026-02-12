<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('App\Modules\Auth\Views\login');
    }

    public function process()
    {
        $model = new UserModel();

        $user = $model->where('email', $this->request->getPost('email'))->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }

        if (!password_verify($this->request->getPost('password'), $user['password'])) {
            return redirect()->back()->with('error', 'Password salah');
        }

        session()->set([
            'user_id' => $user['id'],
            'nama'    => $user['nama'],
            'role'    => $user['role'],
            'logged'  => true,
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
