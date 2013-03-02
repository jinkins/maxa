<?php

function chargerClasse($classe)
{
	require($classe.'.class.php');
}

spl_autoload_register('chargerClasse');

$bdd = new PDO('mysql:host=localhost;dbname=agency' , 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

session_start();
?>