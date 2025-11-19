<?php
class UnidadeService {
    private $conn;
    private $Unidade;
    private $table = "unidade";

    public function __construct($conn, Unidade $Unidade) {
        $this->conn = $conn;
        $this->Unidade = $Unidade;
    }

    public function registro() {
        $query = "
            INSERT INTO $this->table (codigoUnidade, descricaoUnidade)
            VALUES (?, ?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->Unidade->__get('codigoUnidade'));
        $stmt->bindValue(2, $this->Unidade->__get('descricaoUnidade'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function atualiza() {
        $query = "
            UPDATE $this->table SET
                descricaoUnidade = ?
            WHERE
                codigoUnidade = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->Unidade->__get('descricaoUnidade'));
        $stmt->bindValue(2, $this->Unidade->__get('codigoUnidade'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function remover() {
        $query = "
            DELETE FROM $this->table 
            WHERE codigoUnidade = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->Unidade->__get('codigoUnidade'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaCodigo() {
        $query = "
            SELECT *
            FROM $this->table
            WHERE codigoUnidade = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->Unidade->__get('codigoUnidade'));
        $stmt->execute();

        $restemp = $stmt->fetch(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaTodos() {
        $query = "SELECT * FROM $this->table ORDER BY descricaoUnidade";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }
}
?>