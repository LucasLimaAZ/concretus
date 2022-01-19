<?php

namespace App\Controllers;

use App\models\Cliente;
use App\models\Arquivos;
use App\models\User;
use App\models\Marcadores;

class HomeController
{

    public function index()
    {
        $clientes = Cliente::numero('clientes');

        $arquivos = Arquivos::buscar();

        $usuarios = User::buscar();

        return view('index', compact('clientes', 'arquivos', 'usuarios'));
    }

    public function userIndex()
    {
        $arquivos_atuais = Arquivos::listaPasta();

        $arquivos_salvos = Arquivos::buscarSirius();

        $dados['clienteId'] = $_SESSION['clienteId'];
        $marcadores = Marcadores::encontrar($dados);

        $arquivos = [];

        foreach($arquivos_salvos as $arquivo){
            array_push($arquivos, $arquivo->nome);
        }

        $nao_cadastrados = array_diff($arquivos_atuais, $arquivos);

        foreach ($nao_cadastrados as $nao_cadastrado){
            $file['nome'] = $nao_cadastrado;
            $file['sirius'] = $_SESSION['sirius'];
            $file['status'] = 'entrada';
            $file['lido'] = 0;

            Arquivos::cadastrar($file);
        }

        $arquivos = Arquivos::buscar();

        if($_SESSION['email'] == ''){
            return view('cadastrar-email');
        }

        foreach($arquivos as $arquivo){
            foreach($marcadores as $marcador){
                if($marcador->id == $arquivo->marcadorId){
                    $arquivo->marcador = $marcador->nome;
                }
            }
        }

        return view("user-index", compact('arquivos', 'marcadores'));
    }

}
