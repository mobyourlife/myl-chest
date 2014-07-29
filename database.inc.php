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

?>
