<?
	require dirname(dirname(__FILE__))."/include/config.php";
	require_once  BASEPATH. INCLUDEPATH. "funcoes.php";
	
		
	$m 		= $_GET["m"];
	$url 	= explode("/", $m);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>index</title>
		<meta name="author" content="Lucas" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="http://developer.locaweb.com.br/assets/0.44.0/locastyle.css">
		<script type="text/javascript" src="http://developer.locaweb.com.br/assets/0.44.0/locastyle.js"></script>		
		<?
			loadCSS("style_admin");
		?>
	</head>
	<body>
		<div id="header_admin">
			<header class="headerPrincipal">
				<div class="limite">
					<h1 class="serviceName"><a href="/">Painel Adminitrativo</a></h1>
				</div>
				<?
				session_start();
				IF($_SESSION['logado']== 1){
				?>
				<menu id="menuPrincipal">
					<ul>
						<li><a href="<?echo ADMURL?>usuarios/" class="ico-home">a</a></li>
						<li><a href="<?echo ADMURL?>usuarios/listar">usuário</a></li>
						<!--<li <?= $_GLOBALS["cliente"] ?>><a href="#settings">Meios de pagamento</a></li>-->
						<li class="btMenu"><a href="<?echo ADMURL?>usuarios/logoff">Sair</a></li>
					</ul>
				</menu>
				<?}?>							
			</header>		
		</div>
		<div class="clear"></div>
		<!--<div class="<?= $_SESSION['tipo']?>">
				<?= $_SESSION['msg']?>teset				
		</div>-->
		<div id="geral">
			
			<div id="content_admin">
				<?
					if(!isset($_GET['m'])):
						loadmoduloadmin('usuarios', 'login');
					else:
						loadmoduloadmin($url[0], $url[1], $url[2]);
					endif;	
					
								
				?>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		
			<footer id="rodape">
			    <div class="footerTop">
			        <div class="limite">
			            <nav>
			                <h6>Atendimento</h6>
			                <ul>
			                    <li class="ico-helpDesk"><a href="#">HelpDesk</a></li>
			                    <li class="ico-Chat"><a href="#">Chat</a></li>
			                    <li class="ico-Telefone"><a href="#">Telefone</a></li>
			                </ul>
			                <a href="#" class="lnkSeta lnkSetaWhite fright">Ver todas as formas de atendimento</a>
			            </nav>
			        </div>
			    </div>
			    <div class="subfooter">
			        <div class="limite">
			            <span class="lastAccess"><strong>Último acesso:</strong> 7/8/2011 22:35:49   <strong>IP:</strong> 201.87.65.217 <a href="#" class="icoInterroga">?</a></span>
			 
			            <p class="copyRight fright">Copyright © <?= date("Y") ?> Lucas Maestro Carlos.</p>
			        </div>
			    </div>
			</footer>
		
	</body>
</html>
