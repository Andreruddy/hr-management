<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data['title'] = 'User List';
        $data['users'] = $this->userModel->findAll();
        return view('user/user', $data);
    }
    public function create()
    {
        $data['title'] = 'Add New Form';
        return view('user/create', $data);
    }

    public function store()
    {
        $model = new UserModel();

        if ($this->validate([
            'username' => 'required|min_length[3]|max_length[255]',
            'password' => 'required|min_length[8]|max_length[255]',
            'name'    => 'required|min_length[3]|max_length[255]',
        ])) {
            $model->save([
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'name'    => $this->request->getPost('name'),
            ]);
            return redirect()->to('/users');
        } else {
            return view('user/create', ['validation' => $this->validator]);
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit';
        $data['data'] = $this->userModel->find($id);
        return view('user/edit', $data);
    }

    public function update($id)
    {

        if ($this->validate([
            'username' => 'required|min_length[3]|max_length[255]',
            'name'    => 'required|min_length[3]|max_length[255]',
            'password' => 'required|min_length[8]|max_length[255]'
        ])) {
            $this->userModel->update($id, [
                'username' => $this->request->getPost('username'),
                'password'    => $this->request->getPost('password'),
                'name'    => $this->request->getPost('name'),
            ]);
            return redirect()->to('/users');
        } else {
            return view('users/edit', ['validation' => $this->validator, 'user' => $this->userModel->find($id)]);
        }
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/users');
    }
}
