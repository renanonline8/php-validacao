<?php
/*
Titulo: Validacao
Autor: Renan Santos Gomes
Email: renanonline8@gmail.com
-----------------------------------------------------
* Função ValidacaoRetorna
Retorna um array de erros. Ela recebe um array com os campos e um array com as validações.

O array de campos deve conter em cada objeto, nome do campo e valor
Ex:
{ campo1:valor1, campo2:valor2 }

O array de validação deve ter o objeto o nome do campo e no valor suas validações. As validações devem ser expressa em array onde cada indice deve receber o nome da validação
e um valor, alguns podem ter parametros adicionais que deve sem expressos em array
Ex:
{ campo1: {validacao1:'',validacao2:{parametro1:''}}}

-----------------------------------------------------
* Função ValidaObrigatorio
Retorna um array com erro caso o campo esteja em branco

No array de validação para validar deve estar:
{ campo1: {'obrigatorio':''}

-----------------------------------------------------

* Função ValidaTamanho
Retorna um array com erro caso o campo tenha uma quantidade de caracter maior que o permitido

No array de validação para validar deve estar:
{ campo1: {'tamanho':{'qtde':'30'}}

-----------------------------------------------------
* Função ValidaData
Retorna um array com erro caso o campo não seja uma data

No array de validação para validar deve estar:
{ campo1: {'data':''}

-----------------------------------------------------
* Função ValidaEmail
Retorna um array com erro caso o campo não seja um email

No array de validação para validar deve estar:
{ campo1: {'email':''}

-----------------------------------------------------
*/

function ValidacaoRetorna($campos, $validacao) {
	$erros = array();
	reset($validacao);
	while(list($indice, $valor) = each($validacao)) {
		reset($campos);
		while(list($indiceCampos, $valorCampos) = each($campos)){
			if ($indice == $indiceCampos) {
				//echo "Campo $indiceCampos encontrado! validacoes:\n";
				reset($valor);
				while(list($indiceVal, $valorVal) = each($valor)){
					//echo "$indiceVal,\n";
					switch($indiceVal) {
						case 'obrigatorio':
							$erros = ValidaObrigatorio($indiceCampos, $campos[$indiceCampos], $erros);
							break;
						case 'data':
							$erros = ValidaData($indiceCampos, $campos[$indiceCampos], $erros);
							break;
						case 'email':
							$erros = ValidaEmail($indiceCampos, $campos[$indiceCampos], $erros);
							break;
						case 'tamanho':
							$erros = ValidaTamanho($indiceCampos, $campos[$indiceCampos], $erros, (int)$valorVal['qtde']);
							break;
						default:	
					}
				}
				//echo "<br />";
			}
		}
	}
	return $erros;
}

function ValidaObrigatorio($campo, $valor, $array){
	$arrayResposta = $array;
	if (trim($valor) == ''){
		array_push($arrayResposta, array($campo=>'Campo Obrigatorio'));
	}
	return $arrayResposta;
}

function ValidaData($campo, $valor, $array, $formato = 'Y-m-d'){
	$arrayResposta = $array;
	$d = DateTime::createFromFormat($formato, $valor);
	if (!($d && $d->format($formato) == $valor)) {
		array_push($arrayResposta, array($campo=>'Data Invalida'));
	}
	return $arrayResposta;
}

function ValidaTamanho($campo, $valor, $array, $tamanho) {
	$resposta = $array;
	if (strlen(trim($valor)) > $tamanho){
		array_push($resposta, array($campo=>"Qtde de caracteres maior que o permitido, maximo permitido $tamanho"));
	}
	return $resposta;
}

function ValidaEmail($campo, $valor, $array){
	$resposta = $array;
	if (!(filter_var($valor, FILTER_VALIDATE_EMAIL))) {
		array_push($resposta, array($campo=>"Email invalido"));
	}
	return $resposta;
}
?>