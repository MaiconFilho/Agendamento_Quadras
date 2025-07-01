<?php

namespace App\Controllers;

use App\Models\CourtModel;
use CodeIgniter\Controller;

class Court extends Controller
{
    public function __construct()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth')->with('error', 'Você precisa estar logado para acessar essa página.');
        }
    }

    
    public function index()
    {
        $model = new CourtModel();

        
        if ($this->request->isAJAX() || $this->request->getHeader('accept')->getValue() === 'application/json') {
            return $this->response->setJSON($model->findAll());
        }

        
        $data['courts'] = $model->findAll();
        echo view('Court/index', $data);
    }

    
    public function create()
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/court')->with('error', 'Você não tem permissão para isso.');
        }
        
        echo view('Court/create');
    }

    
    public function store()
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/court')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtModel();
        $data = $this->request->getPost();
        
        if (!$model->insert($data)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Não foi possível gravar o registro. Verifique os dados e tente novamente.');
        }

        return redirect()->to('/court')
            ->with('success', 'Quadra criada com sucesso!');
    }

    
    public function edit($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/court')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtModel();
        $court = $model->find($id);
        
        if (!$court) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Quadra com ID $id não encontrada.");
        }
        
        return view('Court/edit', ['court' => $court]);
    }

    
    public function update($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/court')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtModel();
        $data = $this->request->getPost();
        
        if (!$model->update($id, $data)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $model->errors());
        }

        return redirect()->to('/court')
            ->with('success', 'Quadra atualizada com sucesso!');
    }

    
    public function deleteConfirm($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/court')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtModel();
        $court = $model->find($id);
        
        if (!$court) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Quadra não encontrada");
        }
        
        return view('Court/deleteConfirm', ['court' => $court]);
    }

    
    public function delete($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/court')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtModel();
        $model->delete($id);

        return redirect()->to('/court')
            ->with('success', 'Quadra excluída com sucesso!');
    }
}
