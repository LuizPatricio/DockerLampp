<?php
class CategoriaService {
    private $conn;
    private $categoria;
    private $table = "Categoria";

    public function __construct($conn, Categoria $categoria) {
        $this->conn = $conn;
        $this->categoria = $categoria;
    }

    public function registro() {
        $query = "
            INSERT INTO $this->table (codigoCategoria, nomeCategoria)
            VALUES (?, ?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categoria->__get('codigoCategoria'));
        $stmt->bindValue(2, $this->categoria->__get('nomeCategoria'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function atualiza() {
        $query = "
            UPDATE $this->table SET
                nomeCategoria = ?
            WHERE
                codigoCategoria = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categoria->__get('nomeCategoria'));
        $stmt->bindValue(2, $this->categoria->__get('codigoCategoria'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function remover() {
        $query = "
            DELETE FROM $this->table 
            WHERE codigoCategoria = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categoria->__get('codigoCategoria'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaCodigo() {
        $query = "
            SELECT *
            FROM $this->table
            WHERE codigoCategoria = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categoria->__get('codigoCategoria'));
        $stmt->execute();

        $restemp = $stmt->fetch(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaTodos() {
        $query = "SELECT * FROM $this->table ORDER BY nomeCategoria";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }
}
?>