<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once "/home/lps/codes/apiMysql/controllers/dao/client_dao.php";
require_once "/home/lps/codes/apiMysql/controllers/dao/atendimento_dao.php";
require_once "/home/lps/codes/apiMysql/controllers/controller.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri );

$clientDAO = new ClientDAO();
$atendimentoDAO = new AtendimentoDAO();
$data = json_decode(file_get_contents('php://input'), true);
$controlCli = new Controller($clientDAO);
$controlAten = new Controller($atendimentoDAO);

if (isset($uri[1]) && isset($uri[2]) && $uri[1] != '') {

    if ($uri[1] == 'cliente') {
        if ($uri[2] == 'insert') {
    
            echo $controlCli->insert($data);
    
        }elseif ($uri[2] == 'delete') {
    
            echo $controlCli->delete($data);
            
        }elseif ($uri[2] == 'update') {
    
            echo $controlCli->update($data);
    
        }elseif ($uri[2] == 'get') {
    
            echo json_encode($controlCli->get($data));
    
        }elseif ($uri[2] == 'getAll') {
            
            echo json_encode($controlCli->getAll());
    
        }else echo print('f');


    } elseif ($uri[1] == 'atendimento') {
        if ($uri[2] == 'insert') {
    
            echo $controlAten->insert($data);
    
        }elseif ($uri[2] == 'delete') {
    
            echo $controlAten->delete($data);
            
        }elseif ($uri[2] == 'update') {
    
            echo $controlAten->update($data);
    
        }elseif ($uri[2] == 'get') {
    
            echo json_encode($controlAten->get($data));
    
        }elseif ($uri[2] == 'getAll') {
            
            echo json_encode($controlAten->getAll());
    
        }else echo print('f');
    }else echo 'f';
}
