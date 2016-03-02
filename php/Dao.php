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
		
		public function Buscar() {
			try {
				$sql = "SELECT * FROM operacoes order by cod_mer";
				$result = Conexao::getInstance()->query($sql);
				$lista = $result->fetchAll(PDO::FETCH_ASSOC);
				$f_lista = array();
				
				foreach ($lista as $l){
					$f_lista[] = $this->populaOperacao($l);
				}
				
				return $f_lista;
			} catch (Exception $e) {
				print "Ocorreu o erro: ".$e->getMessage();
			}

		}
		
		private function populaOperacao($row) {
			$pojo = new PojoOperacao;
			$pojo->setCod_mer($row['cod_mer']);
			$pojo->setNome_mer($row['nome_mer']);
			$pojo->setTipo_mer($row['tipo_mer']);
			$pojo->setQnt($row['qnt']);
			$pojo->setValor($row['valor']);
			$pojo->setTipo_neg($row['tipo_neg']);
			return $pojo;
		}
	}
?>
