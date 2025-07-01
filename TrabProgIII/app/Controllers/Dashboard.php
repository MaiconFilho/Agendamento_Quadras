<?php

namespace App\Controllers;

use App\Models\CourtModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function __construct()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth')->with('error', 'Você precisa estar logado para acessar essa página.');
        }
    }

    public function index()
    {
        $model = new \App\Models\CourtModel();
        $data = [
            'courts' => $model->where('status', '1')->findAll(),
            'loggedUserId' => session()->get('user_id')
        ];

        return view('Dashboard/index', $data);
    }
}
