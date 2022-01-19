<?php

namespace App\Controllers;

use App\models\User;
use App\models\Cliente;
use App\models\Arquivos;
use App\models\Marcadores;

class UsersController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $usuario = User::login();

        if(!empty($usuario)){
            return $this->responderJSON(true);
        }else{
            return $this->responderJSON(false);
        }
    }

    public function logout()
    {
        User::logout();

        header("Location: home");
    }

    public function cadastrar()
    {
        $usuario = $_POST;
        $usuarioId = User::cadastrar($usuario);

        return $this->responderJSON($usuario);
    }

    public function cadastro()
    {
        $clientes = Cliente::buscar();
        return view("cadastro-usuarios", compact("clientes"));
    }

    public function administrar()
    {
        $usuarios = User::buscar();
        $clientes = Cliente::buscar();
        return view('administracao-usuarios', compact('usuarios','clientes'));
    }

    public function update()
    {
        $usuario = $_POST;
        User::atualizar($usuario);

        return $this->responderJSON($usuario);
    }

    public function destroy()
    {
        $usuario = $_POST['id'];
        User::deletar($usuario);

        return $this->responderJSON($usuario);
    }

    public function perfil()
    {
        return view("perfil");
    }

    public function recuperarSenha()
    {
        return view('recuperar-senha');
    }

    public function atualizarSenha()
    {
        $usuario = $_POST;
        
        $dados['senha'] = $_POST['senha'];
        $dados['id'] = $_POST['userId'];

        User::atualizar($dados);

        return $this->responderJSON($usuario);
    }

    public function simular()
    {
        $usuario = User::encontrar($_POST);

        $clienteId['id'] = $usuario[0]->clienteId;

        $dados['clienteId'] = $usuario[0]->clienteId;
        $marcadores = Marcadores::encontrar($dados);

        $cliente = Cliente::encontrar($clienteId);

        $arquivos = Arquivos::buscar();

        foreach($arquivos as $arquivo){
            foreach($marcadores as $marcador){
                if($marcador->id == $arquivo->marcadorId){
                    $arquivo->marcador = $marcador->nome;
                }
            }
        }

        return view('simulacao', compact('arquivos', 'cliente', 'usuario', 'marcadores'));
    }

    public function cadastrarEmail()
    {
        $dados['email'] = $_POST['email'];
        $dados['id'] = $_SESSION['id'];

        User::atualizar($dados);

        $_SESSION['email'] = $dados['email'];

        return $this->responderJSON($dados['email']);
    }

}
