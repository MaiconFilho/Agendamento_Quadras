<?php

namespace App\Controllers;

use App\Models\SchedulingModel;
use CodeIgniter\Controller;

class Scheduling extends Controller
{
    public function __construct()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth')->with('error', 'Você precisa estar logado para acessar essa página.');
        }
    }

    public function index()
    {
        $model = new SchedulingModel();

        
        if ($this->request->isAJAX() || $this->request->getHeader('accept')->getValue() === 'application/json') {
            return $this->response->setJSON($model->findAll());
        }

        
        $data['schedulings'] = $model->findAll();
        echo view('Scheduling/index', $data);
    }

    
    public function create()
    {
        
        echo view('Scheduling/create');
    }

    
    public function store()
    {
        
        $model = new SchedulingModel();
        $data = $this->request->getPost();

        if (!$model->insert($data)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Não foi possível gravar o registro. Verifique os dados e tente novamente.');
        }

        return redirect()->to('/scheduling')
            ->with('success', 'Agendamento criado com sucesso!');
    }

    
    public function edit($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/scheduling')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new SchedulingModel();
        $scheduling = $model->find($id);
        
        if (!$scheduling) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Agendamento com ID $id não encontrado.");
        }
        
        return view('Scheduling/edit', ['scheduling' => $scheduling]);
    }

    
    public function update($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/scheduling')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new SchedulingModel();
        $data = $this->request->getPost();

        if (!$model->update($id, $data)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $model->errors());
        }

        return redirect()->to('/scheduling')
            ->with('success', 'Agendamento atualizado com sucesso!');
    }

    
    public function deleteConfirm($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/scheduling')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new SchedulingModel();
        $scheduling = $model->find($id);
        
        if (!$scheduling) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Agendamento não encontrado");
        }
        
        return view('Scheduling/deleteConfirm', ['scheduling' => $scheduling]);
    }

    
    public function delete($id = null)
    {
        
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user_id'));
        
        if ($user && $user['type'] == 0) {
            return redirect()->to('/scheduling')->with('error', 'Você não tem permissão para isso.');
        }
        
        $model = new SchedulingModel();
        $model->delete($id);

        return redirect()->to('/scheduling')
            ->with('success', 'Agendamento excluído com sucesso!');
    }
}
