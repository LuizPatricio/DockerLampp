<?php
require_once __DIR__ . "/../Model/Unidade-model.php";
require_once __DIR__ . "/../Service/Unidade-Service.php";

class UnidadeController {
    private $conn;
    private $Unidade;

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->Unidade = new Unidade();
    }

    public function registro($codigoUnidade, $descricaoUnidade) {
        $this->Unidade->__set('codigoUnidade', $codigoUnidade)
        ->__set('descricaoUnidade', $descricaoUnidade);
        
        $objS = new UnidadeService($this->conn, $this->Unidade);
        return $objS->registro();
    }

    public function atualiza($codigoUnidade, $descricaoUnidade) {
        $this->Unidade->__set('codigoUnidade', $codigoUnidade)
        ->__set('descricaoUnidade', $descricaoUnidade);
        
        $objS = new UnidadeService($this->conn, $this->Unidade);
        return $objS->atualiza();
    }

    public function buscaTodos() {
        $objS = new UnidadeService($this->conn, $this->Unidade);
        return $objS->buscaTodos();
    }

    public function buscaCodigo($codigoUnidade) {
        $this->Unidade->__set('codigoUnidade', $codigoUnidade);
        $objS = new UnidadeService($this->conn, $this->Unidade);
        return $objS->buscaCodigo();
    }

    public function remover($codigoUnidade) {
        $this->Unidade->__set('codigoUnidade', $codigoUnidade);
        $objS = new UnidadeService($this->conn, $this->Unidade);
        return $objS->remover();
    }
}
?>