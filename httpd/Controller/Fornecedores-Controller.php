<?php
require_once "../../Model/Fornecedor-Model.php";
require_once "../../Service/Fornecedor-Service.php";


class FornecedorController{
    private $conn;
    private $Fornecedor;

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->Fornecedor = new Fornecedor();
	}


    public function registro($codigoFornecedor, $nomeFornecedor, $CNPJ, $Fax, $telefoneFixo, $telefoneCelular, $site, $logradouro, $numero, $complemento, $bairro, $cidade, $estado, $CEP){
        
        $this->Fornecedor->__set('nomeFornecedor', $nomeFornecedor)
            ->__set('codigoFornecedor', $codigoFornecedor)
            ->__set('CNPJ', $CNPJ)
            ->__set('Fax', $Fax)
            ->__set('telefoneFixo', $telefoneFixo)
            ->__set('telefoneCelular', $telefoneCelular)
            ->__set('site', $site)
            ->__set('logradouro', $logradouro)
            ->__set('numero', $numero)
            ->__set('complemento', $complemento)
            ->__set('bairro', $bairro)
            ->__set('cidade', $cidade)
            ->__set('estado', $estado)
            ->__set('CEP', $CEP)

        $objS = new FornecedorService($this->conn, $this->Fornecedor);
        return $objS->registro();
    }

    public function atualiza($codigoFornecedor, $nomeFornecedor, $CNPJ, $Fax, $telefoneFixo, $telefoneCelular, $site, $logradouro, $numero, $complemento, $bairro, $cidade, $estado, $CEP){
        
        $this->Fornecedor->__set('codigoFornecedor', $codigoFornecedor)
            ->__set('codigoFornecedor', $codigoFornecedor)
            ->__set('CNPJ', $CNPJ)
            ->__set('Fax', $Fax)
            ->__set('telefoneFixo', $telefoneFixo)
            ->__set('telefoneCelular', $telefoneCelular)
            ->__set('site', $site)
            ->__set('logradouro', $logradouro)
            ->__set('numero', $numero)
            ->__set('complemento', $complemento)
            ->__set('bairro', $bairro)
            ->__set('cidade', $cidade)
            ->__set('estado', $estado)
            ->__set('CEP', $CEP)

        $objS = new FornecedorService($this->conn, $this->Fornecedor);
        return $objS->atualiza();
    }

    public function remover($codigoFornecedor){
        $this->Fornecedor->__set('codigoFornecedor', $codigoFornecedor);
        $objS = new FornecedorService($this->conn, $this->Fornecedor);
        return $objS->remover();
    }

    public function buscaCodigo($codigoFornecedor){
        $this->Fornecedor->__set('codigoFornecedor', $codigoFornecedor);
        $objS = new FornecedorService($this->conn, $this->Fornecedor);
        $tarefa = $objS->buscaCodigo();
        return $tarefa['0'];
    }

    public function buscaTodos(){
        $objS = new FornecedorService($this->conn, $this->Fornecedor);
        return $objS->buscaTodos();
    }

}