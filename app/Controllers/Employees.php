<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class Employees extends BaseController
{

    protected $modelEmployee;
    public function __construct()
    {
        $this->modelEmployee = new EmployeeModel();
    }
    public function index()
    {
        $data['title'] = 'Employee List';
        $data['employees'] = $this->modelEmployee->findAll();
        return view('employee/index', $data);
    }
    public function create()
    {
        $data['title'] = 'Add New Form';
        return view('employee/create', $data);
    }

    public function store()
    {
        $model = new EmployeeModel();

        if ($this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email',
            'status' => 'required|min_length[3]|max_length[255]',
            'position' => 'required|min_length[3]|max_length[255]',
            'photo' => 'uploaded[photo]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg]|max_size[photo,300]',
        ])) {
            $photo = $this->request->getFile('photo');
            $photoName = $photo->getRandomName();
            $photo->move(WRITEPATH . 'uploads', $photoName);

            $model->save([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'status' => $this->request->getPost('status'),
                'position' => $this->request->getPost('position'),
                'photo' => $photoName,
            ]);
            return redirect()->to('/employees');
        } else {
            return view('employees/create', ['validation' => $this->validator]);
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Employee';
        $data['employee'] = $this->modelEmployee->find($id);
        return view('employee/edit', $data);
    }

    public function update($id)
    {
        $model = new EmployeeModel();

        if ($this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'status' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email',
            'position' => 'required|min_length[3]|max_length[255]',
            'photo' => 'uploaded[photo]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg]|max_size[photo,300]',
        ])) {
            $data = [
                'name' => $this->request->getPost('name'),
                'status' => $this->request->getPost('status'),
                'email' => $this->request->getPost('email'),
                'position' => $this->request->getPost('position'),
            ];

            if ($this->request->getFile('photo')->isValid()) {
                $photo = $this->request->getFile('photo');
                $photoName = $photo->getRandomName();
                $photo->move(WRITEPATH . 'uploads', $photoName);
                $data['photo'] = $photoName;
            }

            $model->update($id, $data);
            return redirect()->to('/employees');
        } else {
            return view('employees/edit', ['validation' => $this->validator, 'employee' => $model->find($id)]);
        }
    }

    public function delete($id)
    {
        $this->modelEmployee->delete($id);
        return view('/employees');
    }
}
