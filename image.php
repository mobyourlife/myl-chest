<?php
require_once "core.inc.php";

if (!isset($_GET) || !isset($_GET['id']))
{
	http_response_code(404);
	header("Location: ./404");
	die();
}

$image_id = $_GET['id'];

if ($image_id == "cover")
{
	$cover = get_cover($page_info['fbid']);
	
	if (isset($cover['source_url']))
	{
		header("Location: " . $cover['source_url']);
	}
}

?>
