<?php

use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\Entities\AccessToken;
use Facebook\FacebookSDKException;

/* Conecta-se ao banco de dados. */
function db_conectar()
{
	global $mysql_hostname, $mysql_username, $mysql_password, $mysql_database;
	$db = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password);
	mysqli_select_db($db, $mysql_database);
	return $db;
}

function get_subdomain_user($subdomain)
{
	$db = db_conectar();
	
	$sql = sprintf("SELECT page_fbid FROM myl_subdomains WHERE subdomain = '%s';", $subdomain);
	$res = mysqli_query($db, $sql);
	$page_fbid = 0;
	
	if (mysqli_num_rows($res) != 0)
	{
		$row = mysqli_fetch_assoc($res);
		$page_fbid = $row['page_fbid'];
	}
	
	mysqli_close($db);
	
	return $page_fbid;
}

function get_page_info($page_fbid)
{
	$db = db_conectar();
	
	$sql = sprintf("SELECT p.is_fanpage, p.page_name, t.theme_name FROM myl_profiles AS p LEFT JOIN myl_themes AS t ON t.theme_id = p.theme_id WHERE admin_uid = %s;", $page_fbid);
	$res = mysqli_query($db, $sql);
	$info = array();
	
	if (mysqli_num_rows($res) != 0)
	{
		$row = mysqli_fetch_assoc($res);
		$info['fbid'] = $page_fbid;
		$info['is_fanpage'] = $row['is_fanpage'];
		$info['page_name'] = $row['page_name'];
		$info['theme_name'] = $row['theme_name'];
	}
	
	mysqli_close($db);
	
	return $info;
}

function get_themes_list()
{
	$db = db_conectar();
	
	$sql = "SELECT theme_id, theme_name FROM myl_themes ORDER BY theme_name ASC;";
	$res = mysqli_query($db, $sql);
	$themes = array();
	
	if (mysqli_num_rows($res) != 0)
	{
		while ($row = mysqli_fetch_assoc($res))
		{
			$themes[$row['theme_id']] = $row['theme_name'];
		}
	}
	
	mysqli_close($db);
	
	return $themes;
}

function salvar_tema($page_fbid, $theme_id)
{
	$db = db_conectar();
	
	$sql = sprintf("UPDATE myl_profiles SET theme_id = %s WHERE admin_uid = %s;", (($theme_id != 0) ? "$theme_id" : "NULL"), $page_fbid);
	mysqli_query($db, $sql);
	
	mysqli_close($db);
}

function get_cover($page_fbid)
{
	$cover = array();
	$cover['image_fbid'] = null;
	$cover['source_url'] = null;
	$cover['is_downloaded'] = false;
	
	$db = db_conectar();
	
	$sql = sprintf("SELECT image_fbid, source_url, is_downloaded FROM myl_covers WHERE page_fbid = %s ORDER BY updated_time DESC LIMIT 1;", $page_fbid);
	$res = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($res) == 1)
	{
		$row = mysqli_fetch_assoc($res);
		$cover['image_fbid'] = $row['image_fbid'];
		$cover['source_url'] = $row['source_url'];
		$cover['is_downloaded'] = $row['is_downloaded'];
	}
	else
	{
		if (isset($_SESSION['FB_ACCESS_TOKEN']))
		{
			$session = new FacebookSession($_SESSION['FB_ACCESS_TOKEN']);
			
			/* consulta o id da capa */
			$request = new FacebookRequest($session, 'GET', sprintf('/%s?fields=cover', $page_fbid));
			$response = $request->execute();
			$object = $response->getGraphObject();
			
			/* pega o id da capa */
			$cover['image_fbid'] = $object->getProperty('cover')->getProperty('id');
			$cover_offset_y = $object->getProperty('cover')->getProperty('offset_y');
			$updated_time = tosqldate($object->getProperty('updated_time'));
			
			/* consulta mais detalhes sobre a capa */
			$request = new FacebookRequest($session, 'GET', sprintf('/%s?fields=images,updated_time', $cover['image_fbid']));
			$response = $request->execute();
			$object = $response->getGraphObject();
			
			/* atribui os dados da capa */
			$cover_details = $object->getProperty('images')->asArray()[0];
			$cover['source_url'] = $cover_details->source;
			
			/* insere a imagem no banco de dados */
			$sql = sprintf("INSERT INTO myl_covers (image_fbid, page_fbid, updated_time, source_url, width, height, offset_y, is_downloaded) VALUES(%s, %s, '%s', '%s', %d, %d, %d, %d) ON DUPLICATE KEY UPDATE updated_time = '%s';"
						, $cover['image_fbid'], $page_fbid, $updated_time, $cover['source_url'], $cover_details->width, $cover_details->height, $cover_offset_y, 0, $updated_time);
			mysqli_query($db, $sql);
		}
	}
	
	mysqli_close($db);
	return $cover;
}

function set_cover_downloaded($cover_id)
{
	$db = db_conectar();
	
	$sql = sprintf("UPDATE myl_covers SET is_downloaded = %d WHERE image_fbid = %s;", 1, $cover_id);
	mysqli_query($db, $sql);
	
	mysqli_close($db);
}

function get_email_admin($admin_uid)
{
	$db = db_conectar();
	
	$sql = sprintf("SELECT admin_email FROM myl_accounts WHERE admin_uid = %s;", $admin_uid);
	$res = mysqli_query($db, $sql);
	$admin_email = null;
	
	if (mysqli_num_rows($res) != 0)
	{
		$row = mysqli_fetch_assoc($res);
		$admin_email = $row['admin_email'];
	}
	
	mysqli_close($db);
	
	return $admin_email;
}

function get_categorias($page_fbid)
{
	$db = db_conectar();
	
	$sql = sprintf("SELECT nome_seo, nome_categoria FROM myl_categorias WHERE page_fbid = %s ORDER BY nome_categoria ASC;", $page_fbid);
	$res = mysqli_query($db, $sql);
	$categorias = array();
	
	if (mysqli_num_rows($res) != 0)
	{
		while ($row = mysqli_fetch_assoc($res))
		{
			$categorias[$row['nome_seo']] = $row['nome_categoria'];
		}
	}
	
	mysqli_close($db);
	
	return $categorias;
}

?>
