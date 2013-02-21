<?
	
	function loadCSS($arquivo=null, $media='screen', $import=FALSE){
		if ($arquivo != NULL) {
			if ($import == TRUE) {
				echo '<style type="text/css">@import_url("'.BASEURL.CSSPATH.$arquivo.'.css");<style>'."\n";
			} else {
				echo '<link rel="stylesheet" type="text/css" href="'.BASEURL.CSSPATH.$arquivo.'.css" media="'.$media.'"/>'."\n";
			}		
		} 
	}
		
	function loadJS($arquivo=null, $remoto=FALSE){
		if($arquivo != null){
			if($remoto == false){
				$arquivo = BASEURL.JSPATH.$arquivo.'.js';				
			}
			echo '<script type="text/javascript" src="'.$arquivo.'"></script>'."\n";			
		}
	}
	
	function loadmodulo($modulo=null, $tela=NULL){
		if($modulo == NULL || $tela==NULL):
			echo '<p> Erro na função <strong>'.__FUNCTION__.'</strong>: faltam parâmetros para execução</p>'; 
		else:
			if(file_exists(MODULOSPATH. "$modulo.php")):
				include_once(MODULOSPATH."$modulo.php");
			else:
				echo "<p> Módulo inexistente neste sistema! </p>";
			endif;
		endif;
	}
	
	function loadmenu($menu=null){
		if($menu == NULL):
			echo '<p> Erro na função de menu <strong>'.__FUNCTION__.'</strong>: faltam parâmetros para execução</p>';
		else:
			if(file_exists(BASEPATH.INCLUDEPATH. "$menu.php")):
				include_once(BASEPATH.INCLUDEPATH."$menu.php");
			else:
				echo "<p> Menu inexistente neste sistema! </p>";
			endif;
		endif;
	}
	
	
	function loadmoduloadmin($modulo=null, $tela=NULL, $param = NULL){
		if($modulo == NULL || $tela==NULL):
			echo '<p> Erro na função <strong>'.__FUNCTION__.'</strong>: faltam parâmetros para execução</p>'; 
		else:
			if(file_exists(MODULOSPATH. "$modulo.php")):
				include_once(MODULOSPATH."$modulo.php");
			else:
				echo "<p> Módulo inexistente neste sistema! </p>". MODULOSPATH ;
			endif;
		endif;
	}
	
	function protegeArquivo($nomeArquivo, $redirPara='index.php?erro=3'){
		$url = $_SERVER["PHP_SELF"];
		if(preg_match("/$nomeArquivo/i", $url)):
			//redireciona para outro url
			redireciona($redirPara);
		endif;	
	}
	
	function redireciona($url=''){
		header("Location:".ADMURL.$url);
	}
	
	function verificaLogin(){
		$sessao = new sessao();
		if($sessao->getNvas()<=0 || $sessao->getVar('logado')!=TRUE):
			redireciona('?erro=3');
		endif;
	}
	
	
	
	
	function printMSG($msg=null, $tipo=null){
		switch ($tipo) {
			case 'alert':
				echo "<div class='alerta'>".$msg."</div>";				
				break;
				
			case 'pergunta':
				echo "<div class='pergunta'>".$msg."</div>";				
				break;
				
			case 'erro':
				echo "<div class='erro'>".$msg."</div>";				
				break;
				
			case 'sucesso':
				echo "<div class='sucesso'>".$msg."</div>";				
				break;
			
			default:
				echo "<div class='sucesso'>".$msg."</div>";	
				break;
		}
	}
	
	function isAdmin(){
		$sessao = new sessao();
		if ($sessao->getVar('administrador') == 's') {
			return TRUE;
		} else {
			echo "Você não tem permissão para acessar essa página.";
			return FALSE;
			exit;
		}		
	}
?>