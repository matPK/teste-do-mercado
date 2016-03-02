<?php

	include "Dao.php";
	include "Operacao.php";
	include "Conexao.php";
	
	$nome_mer	= $_POST['nome_mer'];
	$cod_mer	= $_POST['cod_mer'];
	$tipo_mer 	= $_POST['tipo_mer'];
	$valor		= $_POST['valor'];
	$qnt 		= $_POST['qnt'];
	$tipo_neg	= 1;//Compra é 1, venda é 0.
	if(isset($_POST['venda']) && $_POST['venda'] == '0'){
		$tipo_neg = 0;
	}
	
	if(empty($nome_mer) || empty($cod_mer) || empty($tipo_mer) || empty($valor)){
		header('Location: ../index.html');
		echo "Há um erro no preenchimento dos campos!";
	}else{
		$dao = DaoOperacoes::getInstance();
		$pojoOp = new PojoOperacao();
		$pojoOp->setCod_mer($cod_mer);
		$pojoOp->setNome_mer($nome_mer);
		$pojoOp->setTipo_mer($tipo_mer);
		$pojoOp->setQnt($qnt);
		$pojoOp->setValor($valor);
		$pojoOp->setTipo_neg($tipo_neg);
		if($dao->Inserir($pojoOp)){
			echo "Inserido com sucesso!";
		}else{
			echo "Não foi possível concluir a operação!"
		}
	}
?>
