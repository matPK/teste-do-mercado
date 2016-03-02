<?php

	include "Dao.php";
	include "Operacao.php";
	include "Conexao.php";


	$dao = DaoOperacoes::getInstance();
	$lista = $dao->Buscar();
	$c = 1;
	if(isset($lista)){
		foreach($lista as $i){
			echo "Código da operação ".$c.": ".$i->getCod_mer();
			$c++;
		}
	}else{
		echo "Não foi possível concluir a operação";
	}
?>
