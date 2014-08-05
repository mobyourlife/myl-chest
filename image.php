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
	
	if (isset($cover['image_fbid']) && isset($cover['source_url']) && isset($cover['is_downloaded']))
	{
		$image_fbid = $cover['image_fbid'];
		$source_url = $cover['source_url'];
		$is_downloaded = $cover['is_downloaded'];
	}
}

if (isset($image_fbid) && isset($source_url) && isset($is_downloaded))
{
	if (!file_exists("cdn"))
	{
		mkdir("cdn", 0777, true);
	}
	
	if (!file_exists(sprintf("cdn/%s", $page_info['fbid'])))
	{
		mkdir(sprintf("cdn/%s", $page_info['fbid']), 0777, true);
	}

	$image_path = sprintf("cdn/%s/%s.jpg", $page_info['fbid'], $image_fbid);
	
	if ($is_downloaded == false)
	{
		if (downloadFile($source_url, $image_path))
		{
			set_cover_downloaded($image_fbid);
		}
		else
		{
			$image_path = $source_url;
		}
	}

	header("Location: " . $image_path);
}

?>
