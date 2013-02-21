<?php
    require_once(dirname(__FILE__)."/autoload.php");
	//protegeArquivo(basename(__FILE__));
	
	class usuarios extends banco{
		public function __construct($campos=array()){
			parent::__construct();
			$this->tabela = "usuarios";
			/*if(sizeof($campos)<=0){
				$this->campo_valores = array(
					"nome" => null,
					"sobrenome" => null,
					"email" => NULL,
					"login" => NULL,
					"senha" => NULL,
					"ativo" => NULL,
					"administrador" =>NULL,
					"cadastro" => NULL
				);
			}else{
				$this->campo_valores = $campos;
			}*/
			
			
			$this->campopk = "id";
		}
		
		
		
		/*
		private $nome;
		private $email;
		private $login;
		private $senha;
		private $ativo;
		private $administrador;
		private $cadastro;
		*/
		
		
		public function setValorpk($valor){
			$this->valorpk = $valor;
		}
		
		public function getValorpk(){
			return $this->valorpk;
		}
		
		public function setNome($nome){
			$this->campo_valores['nome'] = $nome;
			//$this->nome = $nome;			
		}
		
		public function setId($id){
			$this->campo_valores['id'] = $id;
			//$this->nome = $nome;			
		}
		
		
		public function setEmail($email){
			$this->campo_valores['email'] = $email;
		}
		
		public function setLogin($login){
			$this->campo_valores['login'] = $login;
		}
		
		public function setSenha($senha){
			$this->campo_valores['senha'] = $senha;
		}
		
		public function setAtivo($ativo){
			$this->campo_valores['ativo'] = $ativo;
		}
		
		public function setAdministrador($admin){
			$this->campo_valores['administrador'] = $admin;
		}
		
		public function setCadastro($cadastro){
			$this->campo_valores['cadastro'] = $cadastro;
		}
		
		public function getId(){
			return $this->campo_valores["id"];
		}
		
		public function getNome(){
			return $this->campo_valores["nome"];
		}
		
		
		public function getEmail(){
			return $this->campo_valores["email"];
		}
		
		public function getLogin(){
			return $this->campo_valores["login"];
		}
		
		public function getSenha(){
			return $this->campo_valores["senha"];
		}
		
		public function getAtivo(){
			return $this->campo_valores["ativo"];
		}
		
		public function getAdministrador(){
			return $this->campo_valores["administrador"];
		}
		
		public function doLogin($objeto){
			$this->setExtraSelect(" where login = :login and senha = :senha and ativo = :ativo ");
			$dado[":login"] = $this->getLogin();
			$dado[":senha"] = $this->getSenha();
			$dado[":ativo"] = 's';
			$this->SelecionaTudo($objeto, $dado);
			
			$sessao = new sessao();
			if($this->linhasafetadas == 1):
				echo "numero de linhas = ".$this->linhasafetadas;
				$resultado = $objeto->RetornaDados();
				$sessao->setVar('nome', $resultado['0']['nome']);
				$sessao->setVar('id', $resultado['0']['id']);
				$sessao->setVar('email', $resultado['0']['email']);
				$sessao->setVar('ip', $_SERVER['REMOTE_ADDR']);
				$sessao->setVar('administrador', $resultado['0']['administrador']);
				$sessao->setVar('logado', TRUE);

				redireciona("usuarios/listar");				
				return TRUE;
			else:
				$sessao->destroy(TRUE);
				redireciona('?erro=2');
				return FALSE;
			endif;
		}
		
		public function editar($objeto, $param){
				
			$this->setExtraSelect("where id = :id");
			$dado[":id"] = $param;
		
			return $this->RetornaDados($this->SelecionaTudo($objeto, $dado));
			
		}
		

		public function dologout(){
			$sessao = new Sessao();
			$sessao->destroy(TRUE);
			redireciona('?erro=1');
		}
		
		public function existeRegistro($campo=null, $valor=null){
			if($campo!= NULL && $valor!=NULL){
				$this->extras_select = " WHERE ".$campo . " = :".$campo;
				$dado["$campo"] = $valor;
				
				$this->SelecionaTudo($this, $dado);
				if($this->linhasafetadas > 0):
					return TRUE;
				else:
					return FALSE;
				endif;
			}
		}
		
	}//fim classe cliente
?>