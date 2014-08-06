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

/* Consulta as informações da página. */
$page_info = get_page_info($page_fbid);

/* Consulta as categorias de mídia. */
$page_categorias = get_categorias($page_fbid);

/* Verifica se está autenticado. */
if (isset($fb_session) && isset($fb_profile) && isset($_SESSION['FB_ACCESS_TOKEN']))
{
	/* Verifica se é o administrador que está logado. */
	if ($fb_profile->getProperty('id') == $page_info['admin_uid'])
	{
		/* Armazena o access token atualizado no banco de dados. */
		update_access_token($page_info['fbid'], $_SESSION['FB_ACCESS_TOKEN']);
	
		/* Verifica se é uma fanpage. */
		$type = get_account_type($fb_profile->getProperty('id'));
		if ($type == "fanpage")
		{
			$fbid = get_page_fbid($fb_profile->getProperty('id'));
			$accounts = fb_get_accounts()->asArray();
			
			foreach($accounts as $acc)
			{
				if($acc->id == $fbid)
				{
					save_page_info($acc);
				}
			}
		}
	}
}

?>
