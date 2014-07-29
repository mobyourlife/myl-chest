<?php

/* Configurações do aplicativo no Facebook. */
$app_id = "{app_id}";
$app_secret = "{app_secret}";

/* Endereço do website. */
$website_ssl = true;
$website_proto = ($website_ssl == true ? "https" : "http");
$website_host = $_SERVER["HTTP_HOST"];
$website_root = "";

/* Dados de conexão ao banco de dados. */
$mysql_hostname = "{mysql_hostname}";
$mysql_database = "{mysql_database}";
$mysql_username = "{mysql_username}";
$mysql_password = "{mysql_password}";

/* Endereço de email do suporte. */
$email_suporte = "suporte@mobyourlife.com.br";

?>