<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

use App\Libraries\Hash;


class UserController extends BaseController
{
    public function registerForm()
    {
        return view('pages/auth/registerForm');
    }

    public function register()
    {
        $rules = [
            'username' => 'required|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirmPass' => 'required|min_length[6]|matches[password]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Error while registering');
            return view('pages/auth/registerForm', [
                'validation' => $this->validator,
            ]);
        }


        $validatedData = $this->validator->getValidated();

        if (empty($validatedData)) {
            session()->setFlashdata('error', 'Credentials error');
            return view('pages/auth/registerForm', [
                'validation' => $this->validator,
            ]);
        }

        $validatedData['password'] = password_hash($validatedData['password'], PASSWORD_DEFAULT);

        $model = model(User::class);
        $model->insert($validatedData);

        return redirect('user/login')->with('success', 'User Registered Successfully');
    }

    public function loginForm()
    {
        return view('pages/auth/loginForm');
    }

    public function login()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Credentials error');
            return view('pages/auth/registerForm', [
                'validation' => $this->validator,
            ]);
        }

        $validatedData = $this->validator->getValidated();

        $userModel = model(User::class)->where('email', $validatedData['email'])->first();

        if (password_verify($validatedData['password'], $userModel['password'])) {
            session()->set('userSessionId', $userModel['id']);
            return redirect()->to(base_url('/students'))->with('success', 'User Logged in successfully');
        }
    }

    public function logout($id)
    {

        if (empty($id)) {
            return redirect('/students');
        };

        session()->destroy();
        return redirect('user/login');
    }

    public function noAccess()
    {
        return view('pages/auth/noAccessPage');
    }
}
