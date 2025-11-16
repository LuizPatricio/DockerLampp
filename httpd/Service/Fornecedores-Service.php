<?php 

class FornecedorService{
    private $conn; //Conexao
    private $Fornecedor; //Modelo
    private $table = "Fornecedor"; //Tabela nome...

    public function __construct($conn, Fornecedor $Fornecedor){
        $this->conn = $conn;
        $this->Fornecedor = $Fornecedor;
    }


    public function registro(){
        $query = "
            INSERT INTO $this->table
            (codigoFornecedor, nomeFornecedor, CNPJ, Fax, telefoneFixo, telefoneCelular, site, logradouro, numero, complemento, bairro, cidade, estado, CEP)
            VALUES
            (?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->Fornecedor->__get('codigoFornecedor'));
        $stmt->bindValue(2, $this->Fornecedor->__get('nomeFornecedor'));
        $stmt->bindValue(3, $this->Fornecedor->__get('CNPJ'));
        $stmt->bindValue(4, $this->Fornecedor->__get('Fax'));
        $stmt->bindValue(5, $this->Fornecedor->__get('telefoneFixo'));
        $stmt->bindValue(6, $this->Fornecedor->__get('telefoneCelular'));
        $stmt->bindValue(7, $this->Fornecedor->__get('site'));
        $stmt->bindValue(8, $this->Fornecedor->__get('logradouro'));
        $stmt->bindValue(9, $this->Fornecedor->__get('numero'));
        $stmt->bindValue(10, $this->Fornecedor->__get('complemento'));
        $stmt->bindValue(11, $this->Fornecedor->__get('bairro'));
        $stmt->bindValue(12, $this->Fornecedor->__get('cidade'));
        $stmt->bindValue(13, $this->Fornecedor->__get('estado'));
        $stmt->bindValue(14, $this->Fornecedor->__get('CEP'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function atualiza(){
        $query = "
            UPDATE $this->table SET
                codigoFornecedor = ?, 
                nomeFornecedor= ?, 
                CNPJ= ?, 
                Fax= ?, 
                telefoneFixo= ?, 
                telefoneCelular= ?, 
                site= ?, 
                logradouro= ?, 
                numero= ?, 
                complemento= ?, 
                bairro= ?,
                cidade= ?,
                estado=?,
                CEP=?
            WHERE
                codigoFornecedor = ?;
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->Fornecedor->__get('codigoFornecedor'));
        $stmt->bindValue(2, $this->Fornecedor->__get('nomeFornecedor'));
        $stmt->bindValue(3, $this->Fornecedor->__get('CNPJ'));
        $stmt->bindValue(4, $this->Fornecedor->__get('Fax'));
        $stmt->bindValue(5, $this->Fornecedor->__get('telefoneFixo'));
        $stmt->bindValue(6, $this->Fornecedor->__get('telefoneCelular'));
        $stmt->bindValue(7, $this->Fornecedor->__get('site'));
        $stmt->bindValue(8, $this->Fornecedor->__get('logradouro'));
        $stmt->bindValue(9, $this->Fornecedor->__get('numero'));
        $stmt->bindValue(10, $this->Fornecedor->__get('complemento'));
        $stmt->bindValue(11, $this->Fornecedor->__get('bairro'));
        $stmt->bindValue(12, $this->Fornecedor->__get('cidade'));
        $stmt->bindValue(13, $this->Fornecedor->__get('estado'));
        $stmt->bindValue(14, $this->Fornecedor->__get('CEP'));
        $stmt->bindValue(15, $this->Fornecedor->__get('codigoFornecedor'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function remover(){
        $query = "
            DELETE FROM $this->table 
            WHERE
                codigoFornecedor = ?;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->Fornecedor->__get('codigoFornecedor'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaCodigo()
    { 
        $query = "
			SELECT
                *
            FROM
                $this->table
            WHERE
                codigoFornecedor= ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->Fornecedor->__get('codigoFornecedor'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaTodos()
    { 
        $query = "
			SELECT
                *
            FROM
                $this->table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }
}