<?php

	include "Dao.php";
	include "Operacao.php";
	include "Conexao.php";


	$dao = DaoOperacoes::getInstance();
	$lista = $dao->Buscar();
	$c = 1;
	if(isset($lista)){
		foreach($lista as $i){
			echo "Codigo da operacao ".$c.": ".$i->getCod_mer();
			if ($i->getTipo_neg() == 1){
				echo ", tipo da operacao: Compra.";
			}else{
				echo ", tipo da operacao: Venda.";
			}
			echo "<br>";
			$c++;
		}
	}else{
		echo "Nao foi possivel concluir a operacao";
	}
?>
