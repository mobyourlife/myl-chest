<?php
require_once "core.inc.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

$enviado = false;

$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "From: " . $email . "\r\n";
$headers .= "Return-Path: " . $email . "\r\n"; // return-path

if (mail($email_suporte, "Mensagem de suporte do site", $mensagem, $headers, "-r".$email))
{
	$enviado = true;
}

$ret = array(
	"enviado" => $enviado
);

header("Content-type: application/json");
print(json_encode($ret));

?>
