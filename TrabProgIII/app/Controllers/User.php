<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        
        
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth')->with('error', 'Você precisa estar logado para acessar essa página.');
        }

        $model = new UserModel();

        if ($this->request->isAJAX() || $this->request->getHeader('accept')->getValue() === 'application/json') {
            return $this->response->setJSON($model->findAll());
        }

        $data['users'] = $model->findAll();
        echo view('User/index', $data);
    }

    
    public function register()
    {
        echo view('User/register');
    }

    
    public function storeRegister()
    {
        $model = new UserModel();
        $data = $this->request->getPost();
        
        
        $data['type'] = 0;

        if (!$model->insert($data)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Não foi possível gravar o registro. Verifique os dados e tente novamente.');
        }

        return redirect()->to('/auth')
            ->with('success', 'Usuário registrado com sucesso! Faça login para continuar.');
    }

    
    public function create()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth')->with('error', 'Você precisa estar logado para acessar essa página.');
        }

        
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/user')->with('error', 'Você não tem permissão para isso.');
        }
        
        echo view('User/create');
    }

    
    public function store()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth')->with('error', 'Você precisa estar logado para acessar essa página.');
        }

        
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/user')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new UserModel();
        $data  = $this->request->getPost();

        if (!$model->insert($data)) {
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Não foi possível gravar o registro. Verifique os dados e tente novamente.');
        }

        return redirect()->to('/user')
            ->with('success', 'Usuário criado com sucesso!');
    }

    
    public function edit($id = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth')->with('error', 'Você precisa estar logado para acessar essa página.');
        }

        
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/user')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new UserModel();
        $user = $model->find($id);
        
        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Usuário com ID $id não encontrado.");
        }
        
        return view('User/edit', ['user' => $user]);
    }

    
    public function update($id = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth')->with('error', 'Você precisa estar logado para acessar essa página.');
        }

        
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/user')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new UserModel();
        
        $data = $this->request->getPost();
        
        // Se a senha estiver vazia, remove do array para não atualizar
        if (empty($data['pwd'])) {
            unset($data['pwd']);
        }
        
        if (!$model->update($id, $data)) {
            return redirect()->back()->with('errors', $model->errors())->withInput();
        }

        return redirect()->to('/user')->with('success', 'Usuário atualizado com sucesso!');
    }

    
    public function deleteConfirm($id = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth')->with('error', 'Você precisa estar logado para acessar essa página.');
        }

        
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/user')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new UserModel();
        $user = $model->find($id);
        
        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Usuário não encontrado");
        }
        
        return view('User/deleteConfirm', ['user' => $user]);
    }

    
    public function delete($id = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth')->with('error', 'Você precisa estar logado para acessar essa página.');
        }

        
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/user')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new UserModel();
        $model->delete($id);
        
        return redirect()->to('/user')->with('success', 'Usuário excluído com sucesso!');
    }
}
