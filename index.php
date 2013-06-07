<?php

$directory = getcwd();

$pagina = $_GET['p'];
$pagina = empty($pagina) ? 'home' : addslashes($pagina);

// procesando
$comandos = array(
	'stylus -c "'.$directory.'\css\style.styl"'
	,'jade -P "'.$directory.'\vista\/'.$pagina.'.jade"'
);

foreach($comandos as $comando){
	exec($comando, $output, $return_var);
	if($return_var){
		die('Error compilando: '.$comando);
	}
}

// mostrando resultados
include "vista/$pagina.html";

?>