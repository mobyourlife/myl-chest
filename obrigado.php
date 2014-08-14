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
        <h1>Contato</h1>
        <p>Obrigado pelo seu email!</p>
      </div>
    </div>

    <div class="container">
		<div class="row">
		  <div class="col-md-8 md-offset-2">
			<h2>Obrigado pelo contato!</h2>
			<p>A nossa equipe irá lhe responder o mais breve possível.</p>
			<p><a href="<?php printlink(); ?>" class="btn btn-lg btn-primary">Continuar 
			navegando</a></p>
		  </div>
		</div>
	</div>
	
	<?php require "footer.inc.php"; ?>
  </body>
</html>
