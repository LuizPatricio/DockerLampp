<?php
// Exemplo: /Service/Categoria-Service.php

// ATENÇÃO: Verifique se o caminho da Conexao está correto!
// require_once '../../Config/conexao.php'; 
// require_once '../Model/Categoria.php'; 

class CategoriaService {
    private $conn; // Conexao PDO
    private $categoria; // Objeto Modelo Categoria
    private $table = "Categoria"; // Nome da tabela no banco de dados

    public function __construct($conn, Categoria $categoria) {
        $this->conn = $conn;
        $this->categoria = $categoria;
    }

    public function registro() {
        $query = "
            INSERT INTO $this->table (nomeCategoria)
            VALUES (?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categoria->__get('nomeCategoria'));
        
        $stmt->execute();
        
        // Retorna o último ID inserido
        return $this->conn->lastInsertId();
    }

    public function buscaTodos() {
        $query = "SELECT * FROM $this->table ORDER BY nomeCategoria";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        // Retorna todos os resultados como objetos
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    // Você também pode adicionar métodos para atualiza, remover e buscaCodigo aqui.
}

?>