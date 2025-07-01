<?php

namespace App\Controllers;

use App\Models\CourtTypeLinkModel;
use CodeIgniter\Controller;

class CourtTypeLink extends Controller
{
    public function __construct()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth')->with('error', 'Você precisa estar logado para acessar essa página.');
        }
    }

    public function index()
    {
        $model = new CourtTypeLinkModel();

        
        if ($this->request->isAJAX() || $this->request->getHeader('accept')->getValue() === 'application/json') {
            return $this->response->setJSON($model->findAll());
        }

        
        $data['courtTypeLinks'] = $model->findAll();
        echo view('CourtTypeLink/index', $data);
    }

    
    public function create()
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/courttypelink')->with('error', 'Você não tem permissão para isso.');
        }
        
        echo view('CourtTypeLink/create');
    }

    
    public function store()
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/courttypelink')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtTypeLinkModel();
        $data = $this->request->getPost();
        
        if (!$model->insert($data)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Não foi possível gravar o registro. Verifique os dados e tente novamente.');
        }

        return redirect()->to('/courttypelink')
            ->with('success', 'Ligação criada com sucesso!');
    }

    
    public function edit($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/courttypelink')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtTypeLinkModel();
        $courtTypeLink = $model->find($id);
        
        if (!$courtTypeLink) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Ligação com ID $id não encontrada.");
        }
        
        return view('CourtTypeLink/edit', ['courtTypeLink' => $courtTypeLink]);
    }

    
    public function update($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/courttypelink')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtTypeLinkModel();
        $data = $this->request->getPost();
        
        if (!$model->update($id, $data)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $model->errors());
        }

        return redirect()->to('/courttypelink')
            ->with('success', 'Ligação atualizada com sucesso!');
    }

    
    public function deleteConfirm($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/courttypelink')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtTypeLinkModel();
        $courtTypeLink = $model->find($id);
        
        if (!$courtTypeLink) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Ligação não encontrada");
        }
        
        return view('CourtTypeLink/deleteConfirm', ['courtTypeLink' => $courtTypeLink]);
    }

    
    public function delete($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/courttypelink')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new CourtTypeLinkModel();
        $model->delete($id);

        return redirect()->to('/courttypelink')
            ->with('success', 'Ligação excluída com sucesso!');
    }
}
