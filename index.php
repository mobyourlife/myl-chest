<?php
require_once "core.inc.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <?php include("header.inc.php"); ?>
  <body>

    <?php require "navbar.inc.php"; ?>

    <div class="jumbotron" style="background-image: url('<?php printlink("image?id=cover"); ?>'); ">
      <div class="container">
        <h1><?php printf($page_info['page_name']); ?></h1>
        <p>Descrição</p>
      </div>
    </div>

    <div class="container">
		As postagens na linha do tempo serão exibidas aqui.
	</div>
	
	<?php require "footer.inc.php"; ?>
  </body>
</html>
