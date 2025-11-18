<?php
// Exemplo: /Controller/Categoria-Controller.php

include_once("../../Config/conexao.php");
include_once("../Model/Categoria.php");
include_once("../Service/Categoria-Service.php");

class CategoriaController {
    private $service;
    private $modelo;

    public function __construct() {
        $conexao = new Conexao();
        $this->modelo = new Categoria();
        $this->service = new CategoriaService($conexao->conectar(), $this->modelo);
    }

    public function registro($nome) {
        $this->modelo->__set('nomeCategoria', $nome);
        return $this->service->registro();
    }

    public function buscaTodos() {
        return $this->service->buscaTodos();
    }
    
    // Métodos para atualizar, remover, etc., que você deve adicionar.
}

// ----------------------------------------------------
// Lógica de Roteamento (como nos seus outros controllers)
// ----------------------------------------------------

$controller = new CategoriaController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nomeCategoria'])) {
        $controller->registro($_POST['nomeCategoria']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Categoria cadastrada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">A Categoria não pode ser cadastrada!!</div>";
    }
}
// Adicione a lógica para GET (listar), PUT (atualizar) e DELETE (remover) aqui.

?>