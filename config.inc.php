<?php

/* Configurações do aplicativo no Facebook. */
$app_id = "675062689245409";
$app_secret = "2884c251aa55fdd1b2ef9147a48cde98";

/* Endereço do website. */
$website_ssl = false;
$website_proto = ($website_ssl == true ? "https" : "http");
$website_host = $_SERVER["HTTP_HOST"];
$website_root = "/myl";

/* Dados de conexão ao banco de dados. */
$mysql_hostname = "localhost";
$mysql_database = "mobyourlife";
$mysql_username = "root";
$mysql_password = "eugenia";

/* Endereço de email do suporte. */
$email_suporte = "suporte@mobyourlife.com.br";

?>
