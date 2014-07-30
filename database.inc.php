<?php

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
	
	$sql = sprintf("SELECT is_fanpage, page_name FROM myl_profiles WHERE admin_uid = %s;", $page_fbid);
	$res = mysqli_query($db, $sql);
	$info = array();
	
	if (mysqli_num_rows($res) != 0)
	{
		$row = mysqli_fetch_assoc($res);
		$info['fbid'] = $page_fbid;
		$info['is_fanpage'] = $row['is_fanpage'];
		$info['page_name'] = $row['page_name'];
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

?>
