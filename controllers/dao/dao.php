<?php

require_once "/var/www/html/controllers/dao/utils.php";
require_once "/var/www/html/controllers/database/database.php";

abstract class DAO {
    public $table = '';

    public function insert(array $element) {
        $con = DBClass::connect();

        #INSERT INTO Cliente (nome, sexo, nascimento, raca, telefone, endereco, bairro, municipio) VALUES ('Cliente 1', 'masculino', '2021-06-04', 'branca', 086999948302, 'Rua meclanche', 'cria', 'Piaui');
        $query = "INSERT INTO ". $this->table ."(". Utils::getQueryToInsertValues($element)[0] . ") VALUES (". Utils::getQueryToInsertValues($element)[1] . ')';
        
        $stmt = $con->prepare($query);
        
        $valueBind = explode(', ', Utils::getQueryToUpdateValues($element)[1]);

        for ($i=0; $i < count($valueBind); $i++) { 
            // echo print_r($valueBind[$i] . '=>' . $element[substr($valueBind[$i], 1)], true);
            $stmt->bindValue($valueBind[$i], $element[substr($valueBind[$i], 1)]);
        }
        return $stmt->execute();
    }

    public function delete(string $where, string $whereArs) {
        $con = DBClass::connect();

        #DELETE FROM NOME_DA_TABELA WHERE id = VALOR_DO_ID;
        $query = "DELETE FROM ". $this->table ." WHERE ". $where . ' = :arg';

        $stmt = $con->prepare($query);
        $stmt->bindValue(':arg', $whereArs);

        return $stmt->execute();
    }

    public function update(array $element){
        $con = DBClass::connect();

        #UPDATE nome_tabela SET CAMPO = "novo_valor" WHERE CONDIÇÃO
        $query = "UPDATE ". $this->table ." SET ". Utils::getQueryToUpdateValues($element) . " WHERE ". $this->table .".id = :id";

        $stmt = $con->prepare($query);
        $stmt->bindValue(':id', $element['id']);
        
        return $stmt->execute();
    }

    public function get(string $where, string $whereArs) {
        $con = DBClass::connect();

        #SELECT * FROM A WHERE = CONDICAO
        $query = "SELECT * FROM ". $this->table . " WHERE ". $this->table .'.'. $where ." = :arg";
        
        $stmt = $con->prepare($query);
        $stmt->bindValue(':arg', $whereArs);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll() {
        $con = DBClass::connect();

        #SELECT * FROM TABLE
        $query = "SELECT * FROM " . $this->table;

        $stmt = $con->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>