<?php

//Vale Ouro
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . "/../connection/Connection.php";
require __DIR__ . "/Controller.php";

function findAll() {

    $conn = new Connection();

    $pdo = $conn -> getConnection();

    $tabela = $pdo -> query("SELECT * FROM users");

    $usuarios =  $tabela -> fetchAll(PDO::FETCH_ASSOC); //transformar os dados da tabela da maneira que pedimos (transforma SQL em PHP)

    $data['titulo'] = "listar usuarios";
    $data['usuarios'] = $usuarios;

    Controller::loadView("users/list.php", $data);
}

function findUserById() {

    print "Chamou findUserById";
}

function deleteUser() {

    print "Chamou deleteUser";
}

$acao = $_GET['acao'];

switch ($acao) {
    case 'listar':
        findAll();
    break;

    case 'usuario':
        findUserById();
    break;

    case 'deletar':
        deleteUser();

    default:
        findAll();
    break;
}