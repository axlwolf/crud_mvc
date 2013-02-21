<?
		require_once dirname(dirname(dirname(__FILE__))) . "/" .CLASSESPATH. "autoload.php";
		switch ($tela){
		case 'login':
			$sessao = new sessao();
			if($sessao->getNvas()>0 || $sessao->getVar('logado')==TRUE):
				redireciona('usuarios/add');
			endif;
			if(isset($_POST['btnacao'])){
				$usuario = new usuarios();
				
				$usuario->setLogin($_POST["login"]);
				$usuario->setSenha(md5($_POST["senha"]));
				
				$usuario->doLogin($usuario);
			}
			?>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#frm_login').validate({
						rules:{
							login:{
								required:true,
								minlength:4							
							},
							senha:{
								required:true,
								rangelength:[4,10]
							}						
						},
						messages:{
							login:{
								required:"Esta campo é obrigatorio",
								minlength:"O nome deve ter no minimo 4 caracteres"
							},
							
							senha:{
								required:"Esta campo é obrigatorio",
								rangelength:"sua senha deve ter de 4 a 10 caracteres"
							}
						}					
					});				
				});
				
			</script>
			<div id="login">				
	 			<form name="frm_login" id="frm_login" method="POST" action="<? ?>">
	 				<?php
							$erro = (int)$_GET["erro"];
							switch ($erro){
								case 1:
									echo '<div class="alert msg_login">Você efetuou o logoff.</div>';
									break;
								case 2:
									echo '<div class="alert alert-error msg_login">Usuário inválido ou inativo.</div>';	
									break;
								case 3:
									echo '<div class="alert alert-error msg_login">Faça o login para acessar a página solicitada.</div>';
									break;	
							}
						?>							
					<div id="tela_login">
						
						<div class="titulo_table">Acesso restrito - Identifique-se</div>
						
						<table border="0" width="270" cellpadding="5" cellspacing="5">
							<tr height="50">
								<td class="nome_campo">Login:</td>
								<td class="campo"><input type="text" name="login" value="<? $_POST["login"]?>" maxlength="10"></td>
							</tr>
							<tr>
								<td class="nome_campo">Senha:</td>
								<td class="campo"><input type="password" name="senha" value="<? $_POST["senha"]?>"maxlength="8"></td>
							</tr>
							<tr>
								<td colspan="2" align="center"><input class="btn btn-success" type="submit" name="btnacao" value="Acessar"></td>
							</tr>
						</table>
					</div>
													
				</form>
			</div>
			<div class="clear"></div>		
			<?php		
			break;			
			case "add":
				if(isset($_POST["btnacao"])){
					$Usuario = new usuarios();
					
					$Usuario->setNome($_POST["nome"]);
					$Usuario->setEmail($_POST["email"]);
					$Usuario->setLogin($_POST["login"]);
					$Usuario->setSenha(md5($_POST["senha"]));
					$Usuario->setAtivo($_POST["ativo"] == 'on' ? 's' : 'n');
					$Usuario->setAdministrador($_POST["administrador"] == 'on' ? 's' : 'n');
					
					$Usuario->Inserir($Usuario);
					
					if($Usuario == 1){
						echo "Usuário cadastrado com sucesso.<br>";
					}
				}
				
				include "../admin/view/usuarios/add.php";

			break;
			
			case "listar":
					$Usuario = new usuarios();
					$resultado = $Usuario->SelecionaTudo($Usuario);	
					include "../admin/view/usuarios/listar.php";
			break;
			
			case "del":
				echo "valor da url2 é =". $param;
				
				$Usuario = new usuarios();
				$Usuario->setValorpk($param);
				$Usuario->Deletar($Usuario);
			break;
			
			case "editar":
				$Usuario = new usuarios();				
				$resultado = $Usuario->editar($Usuario, $param);
				
				$Usuario->setNome($resultado[0]["nome"]);
				$Usuario->setEmail($resultado[0]["email"]);
				$Usuario->setLogin($resultado[0]["login"]);
				$Usuario->setSenha($resultado[0]["senha"]);
				$Usuario->setAtivo($resultado[0]["ativo"]);
				$Usuario->setAdministrador($resultado[0]["administrador"]);
				$Usuario->setId($resultado[0]["id"]);
				
				if(isset($_POST["btnacao"])):
					echo "passou aqui";					
					$Usuario->setNome($_POST["nome"]);
					$Usuario->setId($_POST["id"]);
					
					echo $Usuario->getNome()."id". $Usuario->getId();
					
				endif;
				
				include "../admin/view/usuarios/add.php";
			break;
			
			case "logoff":
				$user = new usuarios();
				$user->dologout();
			
			break;
	}
	
		
		
?>