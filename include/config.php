<?php
//diretorio do sistema
    define("BASEPATH", dirname(dirname(__FILE__))."/");
	define("BASEURL", "http://localhost/eletrico_uniao/");
	define("ADMURL", BASEURL."admin/");
	//define("ADMURL", BASEURL."admin/inicial.php");
	define("CLASSESPATH", "classes/");
	define("INCLUDEPATH", "include/");
	define("MODULOSPATH", BASEPATH."admin/controller/");
	define("CSSPATH", "css/");
	define("JSPATH", "js/");
	
//banco de dados
	define("DBHOST", "localhost");
	define("DBUSER", "root");
	define("DBPASS", "");
	define("DBNAME", "painel_adm");
	define("TITLE", "Área Administrativa");
?>