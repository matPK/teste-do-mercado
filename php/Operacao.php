<?php
	class PojoOperacao {
		
		//attribs
		private $cod_mer;
		private $nome_mer;
		private $tipo_mer;
		private $qnt;
		private $valor;
		private $tipo_neg;
		
		//getters
		public function getCod_mer(){
			return $this->cod_mer;
		}
		public function getNome_mer (){
			return $this->nome_mer;
		}
		public function getTipo_mer (){
			return $this->tipo_mer;
		}
		public function getQnt (){
			return $this->qnt;
		}
		public function getValor (){
			return $this->valor;
		}
		public function getTipo_neg (){
			return $this->tipo_neg;
		}
		
		//setters
		public function setCod_mer ($cod_mer){
			$this->cod_mer = $cod_mer;
		}
		public function setNome_mer ($nome_mer){
			$this->nome_mer = $nome_mer;
		}
		public function setTipo_mer ($tipo_mer){
			$this->tipo_mer = $tipo_mer;
		}
		public function setQnt ($qnt){
			$this->qnt = $qnt;
		}
		public function setValor ($valor){
			$this->valor = $valor;
		}
		public function setTipo_neg ($tipo_neg){
			$this->tipo_neg = $tipo_neg;
		}
	}
?>