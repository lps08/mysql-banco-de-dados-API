<?php

require_once "/var/www/html/controllers/dao/dao.php";

class ClientDAO extends DAO{
    public $table = 'Cliente';
}

// $dao = new ClientDAO();

// $client = array('nome'=>'testeOUTRO', 'sexo'=>'masculino', 'nascimento'=>'2000-07-10', 'raca'=>'branca', 'telefone'=>'923828392', 'endereco'=>'Rua do mecdrog', 'bairro'=>'chama', 'municipio'=>'piaui');
// $clientUp = array('id'=>3, 'nome'=>'testephpT', 'sexo'=>'masculino', 'nascimento'=>'2000-07-10', 'raca'=>'branca', 'telefone'=>'923828392', 'endereco'=>'Rua do mecdrog', 'bairro'=>'chama', 'municipio'=>'piaui');

// echo print_r($dao->insert($client), true); #passou
// echo print_r($dao->delete('nome', 'testephp'), true); #passou
// echo print_r($dao->update($clientUp), true); #passou
// echo print_r($dao->get('testePHPt'), true); #passou
// echo print_r($dao->getAll(), true); #passou
?>