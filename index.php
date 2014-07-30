<?php
require_once "core.inc.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <?php include("header.inc.php"); ?>
  <body>

    <?php require "navbar.inc.php"; ?>

    <div class="jumbotron">
      <div class="container">
        <h1><?php printf($page_info['page_name']); ?></h1>
        <p>Descrição</p>
      </div>
    </div>

    <div class="container">
		Linha do tempo.
	</div>
	
	<?php require "footer.inc.php"; ?>
  </body>
</html>
