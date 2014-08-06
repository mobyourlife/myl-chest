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
        <h1>Contato</h1>
        <p>Entre em contato direto conosco!</p>
      </div>
    </div>

    <div class="container">
		<div class="row">
		  <div class="col-md-8 col-md-offset-2">
			<div class="well well-sm">
			  <form id="mail-form" class="form-horizontal" action="<?php printlink("enviar-email"); ?>" method="post">
			  <fieldset>
				<legend class="text-center">Fale conosco</legend>
		
				<!-- Name input-->
				<div class="form-group">
				  <label class="col-md-3 control-label" for="name">Nome</label>
				  <div class="col-md-9">
					<input id="name" name="name" type="text" placeholder="Seu nome" class="form-control">
				  </div>
				</div>
		
				<!-- Email input-->
				<div class="form-group">
				  <label class="col-md-3 control-label" for="email">E-mail</label>
				  <div class="col-md-9">
					<input id="email" name="email" type="text" placeholder="Seu endereço de e-mail" class="form-control">
				  </div>
				</div>
		
				<!-- Message body -->
				<div class="form-group">
				  <label class="col-md-3 control-label" for="message">Mensagem</label>
				  <div class="col-md-9">
					<textarea class="form-control" id="message" name="message" placeholder="Digite a sua mensagem aqui" rows="5"></textarea>
				  </div>
				</div>
		
				<!-- Form actions -->
				<div class="form-group">
				  <div class="col-md-12 text-right">
					<button type="submit" class="btn btn-info btn-lg">Enviar</button>
				  </div>
				</div>
			  </fieldset>
			  </form>
			</div>
		  </div>
		</div>
	</div>
	
	<?php require "footer.inc.php"; ?>
  </body>
</html>
