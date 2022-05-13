<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once "/var/www/html/controllers/dao/client_dao.php";
require_once "/var/www/html/controllers/dao/atendimento_dao.php";
require_once "/var/www/html/requester.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri );

// dao's list
$dao_list = [new ClientDAO(), 
             new AtendimentoDAO()];
             
// get the data come from requesition
$data = json_decode(file_get_contents('php://input'), true);

$tableName = $uri[1];
$operation = $uri[2];

if (isset($tableName) && isset($operation) && $tableName != '' && $operation != '') {
    $requester = new Requester($dao_list);
    $requester->buildRequest($tableName, $operation, $data);
} else echo print('error');

?>
