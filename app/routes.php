<?php

$folder = 'laudos';

$router->post("$folder/login", 'UsersController@login');
$router->get("$folder/logout", 'UsersController@logout');

$router->get("$folder/recuperar-senha", 'UsersController@recuperarSenha');

$router->post("$folder/marcar-lido", 'ArquivosController@marcarLido');
$router->post("$folder/arquivar", 'ArquivosController@arquivar');
$router->post("$folder/desarquivar", 'ArquivosController@desarquivar');
$router->post("$folder/excluir", 'ArquivosController@excluir');

$router->post("$folder/enviar-email", 'EmailController@enviar');
$router->post("$folder/atualizar-senha", 'UsersController@atualizarSenha');

$router->get("$folder/perfil", 'UsersController@perfil');

$router->post("$folder/trocar-marcador", 'MarcadoresController@trocar');

$router->post("$folder/cadastrar-email", 'UsersController@cadastrarEmail');

if(isset($_SESSION['hierarquia']) && $_SESSION['hierarquia'] == 'user'){

    $router->get("$folder", 'HomeController@userIndex');
    $router->get("$folder/home", 'HomeController@userIndex');

    $router->get("$folder/user-arquivados", 'ArquivosController@userArquivados');

    $router->post("$folder/cadastrar-marcadores", 'MarcadoresController@cadastrar');
    $router->post("$folder/deletar-marcador", 'MarcadoresController@deletar');

}else{

    $router->get("$folder", 'HomeController@index');
    $router->get("$folder/home", 'HomeController@index');
    
    $router->get("$folder/cadastro-clientes", 'ClientesController@index');
    $router->get("$folder/administracao-clientes", 'ClientesController@administrar');
    $router->post("$folder/cadastrar-cliente", 'ClientesController@cadastrar');
    $router->get("$folder/clientes", 'ClientesController@clientes');
    $router->post("$folder/atualiza-cliente", 'ClientesController@update');
    $router->post("$folder/deletar-cliente", 'ClientesController@destroy');
    $router->post("$folder/usuarios-cliente", 'ClientesController@usuariosCliente');
    
    $router->get("$folder/tela-login", 'UsersController@index');
    $router->get("$folder/cadastro-usuarios", 'UsersController@cadastro');
    $router->post("$folder/cadastrar-usuario", 'UsersController@cadastrar');
    $router->get("$folder/administrar-usuarios", 'UsersController@administrar');
    $router->post("$folder/atualiza-usuario", 'UsersController@update');
    $router->post("$folder/deletar-usuario", 'UsersController@destroy');
    $router->post("$folder/simular-usuario", 'UsersController@simular');
    $router->get("$folder/simular-arquivados", 'UsersController@simularArquivados');
    
    $router->get("$folder/arquivos", 'ArquivosController@index');
    $router->get("$folder/listar-arquivos", 'ArquivosController@lista');
    $router->get("$folder/arquivados", 'ArquivosController@arquivados');

    $router->get("$folder/marcadores", 'MarcadoresController@index');
    $router->post("$folder/cadastrar-marcadores", 'MarcadoresController@cadastrar');
    $router->post("$folder/deletar-marcador", 'MarcadoresController@deletar');

}