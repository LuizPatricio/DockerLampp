<?php
class ItensPedidosService {
    private $conn;
    private $ItensPedidos;
    private $table = "ItensPedidos";

    public function __construct($conn, ItensPedidos $ItensPedidos) {
        $this->conn = $conn;
        $this->ItensPedidos = $ItensPedidos;
    }

    public function registro() {
        $query = "
            INSERT INTO $this->table (codigoItensPedidos, nomeItensPedidos)
            VALUES (?, ?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->ItensPedidos->__get('codigoItensPedidos'));
        $stmt->bindValue(2, $this->ItensPedidos->__get('nomeItensPedidos'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function atualiza() {
        $query = "
            UPDATE $this->table SET
                nomeItensPedidos = ?
            WHERE
                codigoItensPedidos = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->ItensPedidos->__get('nomeItensPedidos'));
        $stmt->bindValue(2, $this->ItensPedidos->__get('codigoItensPedidos'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function remover() {
        $query = "
            DELETE FROM $this->table 
            WHERE codigoItensPedidos = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->ItensPedidos->__get('codigoItensPedidos'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaCodigo() {
        $query = "
            SELECT *
            FROM $this->table
            WHERE codigoItensPedidos = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->ItensPedidos->__get('codigoItensPedidos'));
        $stmt->execute();

        $restemp = $stmt->fetch(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaTodos() {
        $query = "SELECT * FROM $this->table ORDER BY nomeItensPedidos";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }
}
?>