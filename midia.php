<?php
require_once "core.inc.php";

$midia = get_midia_params($_SERVER['PATH_INFO']);

?>
<!DOCTYPE html>
<html lang="pt-br">
  <?php include("header.inc.php"); ?>
  <body>

    <?php require "navbar.inc.php"; ?>

    <div class="jumbotron" style="background-image: url('<?php printlink("image?id=cover"); ?>'); ">
      <div class="container">
        <h1>Mídia</h1>
        <p>Descrição</p>
      </div>
    </div>

    <div class="container">
		<?php var_dump($midia); ?>
	</div>
	
	<?php require "footer.inc.php"; ?>
  </body>
</html>
