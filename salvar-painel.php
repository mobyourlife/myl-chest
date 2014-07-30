<?php
require_once "core.inc.php";

salvar_tema($page_fbid, $_POST['theme_id']);

$ret = array(
	"salvo" => true
);

header("Content-type: application/json");
print(json_encode($ret));

?>
