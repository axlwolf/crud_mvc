<?php
    require_once(dirname(__FILE__)."/autoload.php");
	//protegeArquivo(basename(__FILE__));
	abstract class base extends banco{
		
		public $tabela = "";
		public $campo_valores = array();
		public $campopk = NULL;
		//public $valorpk = NULL;
		//public $extras_select = "";
		
		//metodos 
		
		public function addCampo($campo=null, $valor=NULL){
			if($campo != NULL){
				$this->campo_valores["$campo"] = $valor; 
			}
		}
		
		public function delCampo($campo=null){
			if(array_key_exists($campo, $this->campo_valores)){
				unset($this->campo_valores[$campo]);
			}
		}
		
		public function setValor($campo=Null, $valor=NULL){
			if($campo != null && $valor != NULL){
				$this->campo_valores[$campo] = $valor;
			}
		}
		
		public function getValor($campo=null){
			if($campo != null && array_key_exists($campo, $this->campo_valores)){
				return $this->campo_valores[$campo];
			}else{
				return false;				
			}			
		}		
	}
?>