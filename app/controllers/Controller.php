<?php

namespace App\Controllers;

use App\Core\App;

class Controller
{
    public function index()
    {
        $users = App::get('database')->selectAll('users');

        return view('users', compact('users'));
    }

    public function store()
    {
        App::get('database')->insert('users', [
            'name' => $_POST['name']
        ]);

        return redirect('users');
    }

    public function responderJSON($dados)
    {
        echo json_encode($dados);
    }
}
