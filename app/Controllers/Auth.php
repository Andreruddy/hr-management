<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $user = $builder->where('username', $username)->get()->getRow();
        $pswrd = $user->password;
        if ($user) {
            if ($password == $pswrd) {
                session()->set('username', $username);
                return redirect()->to('/users');
            } else {
                return redirect()->back()->with('error', 'Login failed! Invalid username or password.');
            }
        }
        return redirect()->back()->with('error', 'Login failed! Invalid username or password.');
    }

    public function logout()
    {
        session_destroy();
        return redirect()->to('/login');
    }
}
