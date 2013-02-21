<?php
	require_once(dirname(__FILE__)."/autoload.php");
	//protegeArquivo(basename(__FILE__));
    abstract class banco{
    	//propriedades    	
		public $opcoes = array(PDO::ATTR_PERSISTENT => true, 
						PDO::ATTR_CASE => PDO::CASE_LOWER);
		public $porta			= "3306";				
		public $banco			= "mysql";				
    	public $servidor		= DBHOST;
    	public $usuario			= DBUSER;
    	public $senha			= DBPASS;
    	public $nomebanco		= DBNAME;
    	public $conexao			= NULL;
    	public $dataset			= NULL;
    	public $linhasafetadas	= NULL;
		
		protected 	$valorpk 			= NULL;
		private 	$extras_select 		= "";
		
		//metodos
		public function __construct(){
			$this->conecta();
		}
		public function __destruct(){
			if($this->conexao != NULL){
				$this->conexao = NULL;
			}
		}	
		public function conecta(){
			$dsn = $this->banco .":host=". $this->servidor .";post=".$this->porta.";dbname=".$this->nomebanco;						
			try{
				$this->conexao = new PDO($dsn, $this->usuario, $this->senha, $this->opcoes);
			}catch(PDOException $e){
				echo 'Erro:' . $e->getMessage();	
			}
		}//conecta
		
		
		public function setExtraSelect($sql = null){
			$this->extras_select = $sql;
		}
		
		public function getExtraSelect(){
			return $this->extras_select;
		}
				
		public function Inserir($objeto){
			
			$sql = "INSERT INTO ".$objeto->tabela." (";
			for($i=0; $i<count($objeto->campo_valores); $i++){
				$sql .= key($objeto->campo_valores);
				if($i < (count($objeto->campo_valores)-1)){
					$sql .= ", ";
				}else{
					$sql .= ") values (";
				}
				next($objeto->campo_valores);
			}
			reset($objeto->campo_valores);
			for($i=0; $i<count($objeto->campo_valores); $i++){
				$sql .= ":".key($objeto->campo_valores);
				
				$dado[":".key($objeto->campo_valores)] = $objeto->campo_valores[key($objeto->campo_valores)];				
				if($i < (count($objeto->campo_valores)-1)){
					$sql .= ", ";
				}else{
					$sql .= ") ";
				}				
				next($objeto->campo_valores);
			}
			return $this->executaSQL($sql, $dado);
		}
		
		public function atualizar($objeto){			
			
			$sql = "UPDATE ".$objeto->tabela." SET ";
			for($i=0; $i<count($objeto->campo_valores); $i++){
				$sql .= key($objeto->campo_valores)." = ";
				
				$sql .= ":".key($objeto->campo_valores);
				
				$dado[":".key($objeto->campo_valores)] = $objeto->campo_valores[key($objeto->campo_valores)];

				if($i < (count($objeto->campo_valores)-1)){
					$sql .= ", ";
				}else{
					$sql .= " ";
				}
				next($objeto->campo_valores);
			}
			$sql .= "Where ".$objeto->campopk."=";
			$sql .= ":".$objeto->campopk;
			$dado[":".$objeto->campopk] = $objeto->valorpk;
			reset($objeto->campo_valores);
			echo $sql;
			echo "<pre>";
			print_r($dado);
			echo "</pre>";
			return $this->executaSQL($sql, $dado);
		}
		
		public function Deletar($objeto){
			
			$sql = "DELETE FROM ".$objeto->tabela;
			$sql .= " Where ".$objeto->campopk."=";
			$sql .= ":".$objeto->campopk;
			$dado[":".$objeto->campopk] = $objeto->valorpk;	
			
			echo $sql;
			print_r($dado);		
			return $this->executaSQL($sql, $dado);			
		}
		
		public function SelecionaTudo($objeto, $dado=NULL){
			$sql = "select * from ". $objeto->tabela;
			if($this->extras_select != NULL){
				$sql .= " " .$this->extras_select;
			}
			
			//echo $sql;
			//print_r($dado);
			
			return $this->executaSQL($sql, $dado);
			
		}//seleciona
	
		public function executaSQL($sql, $dado=null){
			$executa = $this->conexao->prepare($sql);
			$executa->execute($dado);
			$this->linhasafetadas = $executa->rowCount();
			
			if(substr(trim(strtolower($sql)),0 ,6)=='select'){
				$this->dataset = $executa;
				return $executa;
				
			}else{
				return $this->linhasafetadas;
			}
			echo $sql;
		}
			
		public function RetornaDados($tipo=null){
			//return $this->dataset->fetch(PDO::FETCH_ASSOC);
			return $this->dataset->fetchAll(PDO::FETCH_ASSOC);
			
		}//RETORNA DADOS
		

		public function trataerro($arquivo=null, $rotina=null, $numero=NULL, $msg=null, $geraexcept=FALSE){
			
		}//trataerro
    }
?>