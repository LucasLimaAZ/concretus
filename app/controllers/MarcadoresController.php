<?php

namespace App\Controllers;

use App\models\Arquivos;
use App\models\Marcadores;

class MarcadoresController extends Controller
{

    public function index()
    {
        $marcadores = Marcadores::buscar();

        return view('marcadores', compact('marcadores'));
    }

    public function trocar()
    {
        Arquivos::aletrarMarcador($_POST);

        return $this->responderJSON($_POST);
    }

    public function cadastrar()
    {
        Marcadores::cadastrar($_POST);

        return $this->responderJSON($_POST);
    }

    public function deletar()
    {
        Marcadores::deletar($_POST);

        return $this->responderJSON($_POST);
    }

}
