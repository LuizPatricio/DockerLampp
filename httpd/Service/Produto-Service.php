<?php
class ProdutoService {
    private $conn;
    private $Produto;
    private $table = "Produto";

    public function __construct($conn, Produto $Produto) {
        $this->conn = $conn;
        $this->Produto = $Produto;
    }

    public function registro() {
        $query = "
            INSERT INTO $this->table (
                codigoProduto, nomeProduto, codigoFornecedor, 
                Foto, codigoUnidade, precoUnitario, codigoCategoria
            )
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->Produto->__get('codigoProduto'));
        $stmt->bindValue(2, $this->Produto->__get('nomeProduto'));
        $stmt->bindValue(3, $this->Produto->__get('codigoFornecedor'));
        $stmt->bindValue(4, $this->Produto->__get('Foto'));
        $stmt->bindValue(5, $this->Produto->__get('codigoUnidade'));
        $stmt->bindValue(6, $this->Produto->__get('precoUnitario'));
        $stmt->bindValue(7, $this->Produto->__get('codigoCategoria'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function atualiza() {
        $query = "
            UPDATE $this->table SET
                nomeProduto = ?,
                codigoFornecedor = ?,
                Foto = ?,
                codigoUnidade = ?,
                precoUnitario = ?,
                codigoCategoria = ?
            WHERE
                codigoProduto = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->Produto->__get('nomeProduto'));
        $stmt->bindValue(2, $this->Produto->__get('codigoFornecedor'));
        $stmt->bindValue(3, $this->Produto->__get('Foto'));
        $stmt->bindValue(4, $this->Produto->__get('codigoUnidade'));
        $stmt->bindValue(5, $this->Produto->__get('precoUnitario'));
        $stmt->bindValue(6, $this->Produto->__get('codigoCategoria'));
        $stmt->bindValue(7, $this->Produto->__get('codigoProduto'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function remover() {
        $query = "DELETE FROM $this->table WHERE codigoProduto = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->Produto->__get('codigoProduto'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaCodigo() {
        $query = "
            SELECT p.*, 
                   f.nomeFornecedor,
                   c.nomeCategoria,
                   u.descricaoUnidade
            FROM $this->table p
            LEFT JOIN Fornecedor f ON p.codigoFornecedor = f.codigoFornecedor
            LEFT JOIN Categoria c ON p.codigoCategoria = c.codigoCategoria
            LEFT JOIN Unidade u ON p.codigoUnidade = u.codigoUnidade
            WHERE p.codigoProduto = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->Produto->__get('codigoProduto'));
        $stmt->execute();

        $restemp = $stmt->fetch(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaTodos() {
        $query = "
            SELECT p.*, 
                   f.nomeFornecedor,
                   c.nomeCategoria,
                   u.descricaoUnidade
            FROM $this->table p
            LEFT JOIN Fornecedor f ON p.codigoFornecedor = f.codigoFornecedor
            LEFT JOIN Categoria c ON p.codigoCategoria = c.codigoCategoria
            LEFT JOIN Unidade u ON p.codigoUnidade = u.codigoUnidade
            ORDER BY p.nomeProduto
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }
}
?>
