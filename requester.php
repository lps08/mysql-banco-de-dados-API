<?php

require_once "controllers/dao/dao.php";
require_once "controllers/controller.php";

class Requester {

    public $daos_list;

    public function __construct(array $daos_list)
    {
        $this->daos_list = $daos_list;
    }

    // get the table name from a resquester url
    private function getControllerRequested(string $tableName) {
        for ($i=0; $i < count($this->daos_list); $i++) { 
            
            if ($this->daos_list[$i]->$tableName == $tableName) {
                $daoRequested = $this->daos_list[$i];
                $controllerResquested = new Controller($daoRequested);

                return $controllerResquested;
            }

            else {
                return null;
            }
        }
    }

    // build CRUD operations
    public function buildRequest(string $tableName, string $operation, $data) {
        $controllerResquested = $this->getControllerRequested($tableName);

        if ($controllerResquested == null) return 'error';

        if ($operation == 'insert') {
    
            echo $controllerResquested->insert($data);
    
        }elseif ($operation == 'delete') {
    
            echo $controllerResquested->delete($data);
            
        }elseif ($operation == 'update') {
    
            echo $controllerResquested->update($data);
    
        }elseif ($operation == 'get') {
    
            echo json_encode($controllerResquested->get($data));
    
        }elseif ($operation == 'getAll') {
            
            echo json_encode($controllerResquested->getAll());
    
        }else echo print('error');
    }
}

?>