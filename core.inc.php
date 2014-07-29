<?php
session_start();
require_once "config.inc.php";
require_once "auxiliar.inc.php";
require_once "facebook.inc.php";
require_once "database.inc.php";

/* Obtém  o FBID através do subdomínio. */
$regex = "/^([a-zA-Z0-9]+)\..*$/";
preg_match($regex, $_SERVER['HTTP_HOST'], $matches);

/* Verifica os resultados. */
if (count($matches) == 2)
{
	$subdomain = $matches[1];
	$storeid = sprintf("myl_%s", $subdomain);
	
	if (!isset($_SESSION[$storeid]))
	{
		$page_fbid = $_SESSION[$storeid] = get_subdomain_user($subdomain);
	}
	else
	{
		$page_fbid = $_SESSION[$storeid];
	}
}

/* Não consegiu determinar o subdomínio, redireciona para o site principal. */
if (!isset($page_fbid))
{
	header("Location: http://www.mobyourlife.com.br");
	die();
}

?>
