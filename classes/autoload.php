<?php
    $pathlocal = dirname(__FILE__);
	function __autoload($classe){
		$classe = str_replace('..', '', $classe);
		require_once($pathlocal."/$classe.class.php");
	}
?>