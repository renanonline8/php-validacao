<?php
include_once('validacao/valida.php');
$campos = array(
	'nome'   =>'', 
	'dt_nasc'=>'2017-07-23', 
    'cidade' =>'Santo André', 
    'estado' =>'SP', 
    'bio'    =>'testando e andando', 
    'email'  =>'', 
    'senha'  =>'teste123'
);

$validacao = array(
    'nome'   =>array('obrigatorio'=>'','tamanho'=>array('qtde'=>'30')),
    'dt_nasc'=>array('data'=>''),
    'cidade' =>array('tamanho'=>array('qtde'=>'30')),
    'estado' =>array('tamanho'=>array('qtde'=>'2')),
    'email'  =>array('obrigatorio'=>'','email'=>''),
    'senha'  =>array('obrigatorio'=>'','tamanho'=>array('qtde'=>'30'))
);

$erros = ValidacaoRetorna($campos, $validacao);
echo json_encode($erros);
?>