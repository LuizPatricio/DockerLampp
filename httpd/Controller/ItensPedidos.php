<?php
require_once "../../Model/ItensPedidos-model.php";
require_once "../../Service/ItensPedidos-Service.php";

class ItensPedidosController {
    private $conn;
    private $ItensPedidos;

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->ItensPedidos = new ItensPedidos();
    }

    public function registro($codigoItensPedidos, $nomeItensPedidos) {
        $this->ItensPedidos->__set('codigoItensPedidos', $codigoItensPedidos)
        ->__set('nomeItensPedidos', $nomeItensPedidos);
        
        $objS = new ItensPedidosService($this->conn, $this->ItensPedidos);
        return $objS->registro();
    }

    public function atualiza($codigoItensPedidos, $nomeItensPedidos) {
        $this->ItensPedidos->__set('codigoItensPedidos', $codigoItensPedidos)
        ->__set('nomeItensPedidos', $nomeItensPedidos);
        
        $objS = new ItensPedidosService($this->conn, $this->ItensPedidos);
        return $objS->atualiza();
    }

    public function buscaTodos() {
        $objS = new ItensPedidosService($this->conn, $this->ItensPedidos);
        return $objS->buscaTodos();
    }

    public function buscaCodigo($codigoItensPedidos) {
        $this->ItensPedidos->__set('codigoItensPedidos', $codigoItensPedidos);
        $objS = new ItensPedidosService($this->conn, $this->ItensPedidos);
        return $objS->buscaCodigo();
    }

    public function remover($codigoItensPedidos) {
        $this->ItensPedidos->__set('codigoItensPedidos', $codigoItensPedidos);
        $objS = new ItensPedidosService($this->conn, $this->ItensPedidos);
        return $objS->remover();
    }
}
?>