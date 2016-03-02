<?php
	
	class DaoOperacoes {
		
		public static $instance;
		

		private function __construct(){
			//
		}
		
		public static function getInstance(){
			if(!isset(self::$instance)){
				self::$instance = new DaoOperacoes();
			}
			return self::$instance;
		}
		
		public function Inserir(PojoOperacao $operacao){
			try{
				$sql = "INSERT INTO operacoes (
					cod_mer,
					tipo_mer,
					nome_mer,
					qnt,
					valor,
					tipo_neg
					) VALUES (
					:cod_mer,
					:tipo_mer,
					:nome_mer,
					:qnt,
					:valor,
					:tipo_neg)";
					
				$p_sql = Conexao::getInstance()->prepare($sql);
				
				$p_sql->bindValue(":cod_mer",$operacao->getCod_mer());
				$p_sql->bindValue(":tipo_mer",$operacao->getTipo_mer());
				$p_sql->bindValue(":nome_mer",$operacao->getNome_mer());
				$p_sql->bindValue(":qnt",$operacao->getQnt());
				$p_sql->bindValue(":valor",$operacao->getValor());
				$p_sql->bindValue(":tipo_neg",$operacao->getTipo_neg());
				
				return $p_sql->execute();
				
			}catch(Exception $e){
				echo "Ocorreu o erro: ".$e->getMessage().", tente novamente.";
				
			}
		}
	
	}
?>