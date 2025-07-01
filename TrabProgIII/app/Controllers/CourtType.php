<?php

namespace App\Controllers;

use App\Models\CourtTypeModel;
use CodeIgniter\Controller;

class CourtType extends Controller
{
    public function __construct()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth')->with('error', 'Você precisa estar logado para acessar essa página.');
        }
    }

    
    public function index()
    {
        $model = new CourtTypeModel();

        
        if ($this->request->isAJAX() || $this->request->getHeader('accept')->getValue() === 'application/json') {
            return $this->response->setJSON($model->findAll());
        }

        
        $data['courtTypes'] = $model->findAll();
        echo view('CourtType/index', $data);
    }

    
    public function create()
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/courttype')->with('error', 'Você não tem permissão para isso.');
        }
        
        echo view('CourtType/create');
    }

    
    public function store()
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/courttype')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtTypeModel();
        $data = $this->request->getPost();
        
        if (!$model->insert($data)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Não foi possível gravar o registro. Verifique os dados e tente novamente.');
        }

        return redirect()->to('/courttype')
            ->with('success', 'Tipo de quadra criado com sucesso!');
    }

    
    public function edit($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/courttype')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtTypeModel();
        $courtType = $model->find($id);
        
        if (!$courtType) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Tipo de quadra com ID $id não encontrado.");
        }
        
        return view('CourtType/edit', ['courtType' => $courtType]);
    }

    
    public function update($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/courttype')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtTypeModel();
        $data = $this->request->getPost();
        
        if (!$model->update($id, $data)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $model->errors());
        }

        return redirect()->to('/courttype')
            ->with('success', 'Tipo de quadra atualizado com sucesso!');
    }

    
    public function deleteConfirm($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/courttype')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtTypeModel();
        $courtType = $model->find($id);
        
        if (!$courtType) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Tipo de quadra não encontrado");
        }
        
        return view('CourtType/deleteConfirm', ['courtType' => $courtType]);
    }

    
    public function delete($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/courttype')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtTypeModel();
        $model->delete($id);

        return redirect()->to('/courttype')
            ->with('success', 'Tipo de quadra excluído com sucesso!');
    }
}
