<?php

namespace App\Controllers;

use App\models\Cliente;
use App\models\User;

class ClientesController extends Controller
{

    public function index()
    {
        return view('cadastro-clientes');
    }

    public function cadastrar()
    {
        $cliente = $_POST;
        $cnpj = $cliente['cnpj'];
        $cnpj = str_replace('/','',$cnpj);
        $cnpj = str_replace(' ','',$cnpj);
        $cnpj = str_replace('-','',$cnpj);
        $cnpj = str_replace('.','',$cnpj);
        $cliente['cnpj'] = $cnpj;
        $clienteId = Cliente::cadastrar($cliente);

        return $this->responderJSON($cliente);
    }

    public function administrar()
    {
        $clientes = Cliente::buscar();

        return view('administracao-clientes', compact('clientes'));
    }

    public function usuariosCliente()
    {
        $usuarios = User::encontrar($_POST);

        return $this->responderJSON($usuarios);
    }

    public function clientes()
    {
        $clientes = Cliente::buscar();
        return  $this->responderJSON($clientes);
    }

    public function update()
    {
        $cliente = $_POST;
        $cnpj = $cliente['cnpj'];
        $cnpj = str_replace('/','',$cnpj);
        $cnpj = str_replace(' ','',$cnpj);
        $cnpj = str_replace('-','',$cnpj);
        $cnpj = str_replace('.','',$cnpj);
        $cliente['cnpj'] = $cnpj;
        
        Cliente::atualizar($cliente);

        return $this->responderJSON($cliente);
    }

    public function destroy()
    {
        $cliente = $_POST['id'];
        Cliente::deletar($cliente);

        return $this->responderJSON($cliente);
    }

}
