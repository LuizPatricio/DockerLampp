<?php
// ATENÇÃO: Verifique e ajuste o caminho (../) conforme a localização dos seus arquivos Model e Service
require_once __DIR__ . "/../Model/Fornecedor-Model.php";
require_once __DIR__ . "/../Service/Fornecedor-Service.php";


class FornecedorController{
    private $conn;
    private $Fornecedor; // Variável de classe no singular

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        // Instancia a classe Fornecedores e atribui à variável $this->Fornecedor
        $this->Fornecedor = new Fornecedores(); 
    }


    public function registro($codigoFornecedor, $nomeFornecedor, $CNPJ, $Fax, $telefoneFixo, $telefoneCelular, $site, $logradouro, $numero, $complemento, $bairro, $cidade, $estado, $CEP){
        
        $this->Fornecedor->__set('codigoFornecedor', $codigoFornecedor)
            ->__set('nomeFornecedor', $nomeFornecedor)
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
            ->__set('CEP', $CEP);

        $objS = new FornecedorService($this->conn, $this->Fornecedor);
        return $objS->registro();
    }

    public function atualiza($codigoFornecedor, $nomeFornecedor, $CNPJ, $Fax, $telefoneFixo, $telefoneCelular, $site, $logradouro, $numero, $complemento, $bairro, $cidade, $estado, $CEP){
        
        $this->Fornecedor->__set('codigoFornecedor', $codigoFornecedor)
            ->__set('nomeFornecedor', $nomeFornecedor)
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
            ->__set('CEP', $CEP);

        $objS = new FornecedorService($this->conn, $this->Fornecedor);
        return $objS->atualiza();
    }

    public function buscaTodos() {
        $objS = new FornecedorService($this->conn, $this->Fornecedor);
        return $objS->buscaTodos();
    }

    public function buscaCodigo($codigoFornecedor) {
        $this->Fornecedor->__set('codigoFornecedor', $codigoFornecedor);
        $objS = new FornecedorService($this->conn, $this->Fornecedor);
        return $objS->buscaCodigo();
    }

    public function remover($codigoFornecedor) {
        $this->Fornecedor->__set('codigoFornecedor', $codigoFornecedor);
        $objS = new FornecedorService($this->conn, $this->Fornecedor);
        return $objS->remover();
    }
}