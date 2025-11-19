<?php
require_once __DIR__ . "/../Model/Produto-model.php";
require_once __DIR__ . "/../Service/Produto-Service.php";

class ProdutoController {
    private $conn;
    private $Produto;

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->Produto = new Produto();
    }

    public function registro($codigoProduto, $nomeProduto, $codigoFornecedor, $Foto, $codigoUnidade, $precoUnitario, $codigoCategoria) {
        $this->Produto->__set('codigoProduto', $codigoProduto)
                      ->__set('nomeProduto', $nomeProduto)
                      ->__set('codigoFornecedor', $codigoFornecedor)
                      ->__set('Foto', $Foto)
                      ->__set('codigoUnidade', $codigoUnidade)
                      ->__set('precoUnitario', $precoUnitario)
                      ->__set('codigoCategoria', $codigoCategoria);
        
        $objS = new ProdutoService($this->conn, $this->Produto);
        return $objS->registro();
    }

    public function atualiza($codigoProduto, $nomeProduto, $codigoFornecedor, $Foto, $codigoUnidade, $precoUnitario, $codigoCategoria) {
        $this->Produto->__set('codigoProduto', $codigoProduto)
                      ->__set('nomeProduto', $nomeProduto)
                      ->__set('codigoFornecedor', $codigoFornecedor)
                      ->__set('Foto', $Foto)
                      ->__set('codigoUnidade', $codigoUnidade)
                      ->__set('precoUnitario', $precoUnitario)
                      ->__set('codigoCategoria', $codigoCategoria);
        
        $objS = new ProdutoService($this->conn, $this->Produto);
        return $objS->atualiza();
    }

    public function buscaTodos() {
        $objS = new ProdutoService($this->conn, $this->Produto);
        return $objS->buscaTodos();
    }

    public function buscaCodigo($codigoProduto) {
        $this->Produto->__set('codigoProduto', $codigoProduto);
        $objS = new ProdutoService($this->conn, $this->Produto);
        return $objS->buscaCodigo();
    }

    public function remover($codigoProduto) {
        $this->Produto->__set('codigoProduto', $codigoProduto);
        $objS = new ProdutoService($this->conn, $this->Produto);
        return $objS->remover();
    }
}
?>
