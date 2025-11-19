<?php
// Exemplo: /Controller/Categoria-Controller.php

require_once "../../Model/Categoria-model.php";
require_once "../../Service/Categoria-Service.php";

class CategoriaController {
    private $conn;
    private $Categoria;

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->Categoria = new Categoria();
    }

    public function registro($codigoCategoria, $nomeCategoria) {
        $this->Categoria->__set('codigoCategoria', $codigoCategoria)
                        ->__set('nomeCategoria', $nomeCategoria);
        
        $objS = new CategoriaService($this->conn, $this->Categoria);
        return $objS->registro();
    }

    public function atualiza($codigoCategoria, $nomeCategoria) {
        $this->Categoria->__set('codigoCategoria', $codigoCategoria)
                        ->__set('nomeCategoria', $nomeCategoria);
        
        $objS = new CategoriaService($this->conn, $this->Categoria);
        return $objS->atualiza();
    }

    public function buscaTodos() {
        $objS = new CategoriaService($this->conn, $this->Categoria);
        return $objS->buscaTodos();
    }

    public function buscaCodigo($codigoCategoria) {
        $this->Categoria->__set('codigoCategoria', $codigoCategoria);
        $objS = new CategoriaService($this->conn, $this->Categoria);
        return $objS->buscaCodigo();
    }

    public function remover($codigoCategoria) {
        $this->Categoria->__set('codigoCategoria', $codigoCategoria);
        $objS = new CategoriaService($this->conn, $this->Categoria);
        return $objS->remover();
    }
}
?>