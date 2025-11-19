<?php
class Produto {
    private $codigoProduto;
    private $nomeProduto;
    private $codigoFornecedor;
    private $Foto;
    private $codigoUnidade;
    private $precoUnitario;
    private $codigoCategoria;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
        return $this;
    }
}
?>
