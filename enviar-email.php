<?php
require_once "core.inc.php";

$enviado = false;

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['mensagem']))
{
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];
	$email_admin = get_email_admin($page_info['fbid']);

	$headers = "MIME-Version: 1.1\r\n";
	$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
	$headers .= "From: " . $email . "\r\n";
	$headers .= "Return-Path: " . $email . "\r\n"; // return-path

	if (mail($email_admin, "Mob Your Life - Mensagem do site", $mensagem, $headers, "-r".$email))
	{
		$enviado = true;
	}
}

$ret = array(
	"enviado" => $enviado,
	"fbid" => $page_info['fbid'],
	"email" => $email_admin
);

header("Content-type: application/json");
print(json_encode($ret));

?>
