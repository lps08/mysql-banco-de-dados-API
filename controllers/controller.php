<?php

require_once "/var/www/html/controllers/dao/dao.php";

class Controller {

    private $dao;

    public function __construct(DAO $daoInput) {
        $this->dao = $daoInput;
    }

    public function insert($data) {
        if ($this->dao->insert($data)) return 'success';
        else return 'failed';
    }

    public function delete($data) {
        if ($this->dao->delete($data['where'], $data['whereArgs'])) return 'success';
        else return 'failed';
    }

    public function update($data) {
        if ($this->dao->update($data)) return 'success';
        else return 'failed'; 
    }

    public function get($data) {
        return $this->dao->get($data['where'], $data['whereArgs']);
    }

    public function getAll() {
        return $this->dao->getAll();
    }
    
}

?>