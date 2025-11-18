<?php
// Exemplo: /Model/Categoria.php

class Categoria {
    private $codigoCategoria;
    private $nomeCategoria;

    // Métodos mágicos para acesso às propriedades
    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}

?>