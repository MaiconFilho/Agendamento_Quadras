<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
    {
    if (session()->get('isLoggedIn')) {
        return redirect()->to('/dashboard');
    }

    return view('Auth/login');
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $pwd   = $this->request->getPost('pwd');

        $model = new UserModel();
        $user = $model->where('email', $email)->first();

        if (!$user || !password_verify($pwd, $user['pwd'])) {
            return redirect()->back()->with('error', 'E-mail ou senha inválidos')->withInput();
        }

        session()->set([
            'user_id' => $user['id'],
            'user_name' => $user['name'],
            'isLoggedIn' => true,
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth')->with('success', 'Você foi deslogado com sucesso!');
    }
}
