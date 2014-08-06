<?php
require_once "core.inc.php";

$midia_params = get_midia_params($_SERVER['PATH_INFO']);

/* anotando a descrição completa do nome da categoria */
$midia_categ = $midia_params['categoria'];
foreach ($page_categorias as $nome_seo => $descricao)
{
	if ($nome_seo == $midia_params['categoria'])
	{
		$midia_categ = $descricao;
		break;
	}
}

$midia_items = get_midia_items($page_info['fbid'], $midia_params['categoria']);

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
		<?php if (count($midia_items) > 0) { ?>
		Af
		<?php } else { ?>
		<div class="alert alert-warning" role="alert">
			<p>Oops! Ainda não tem nenhum item na página de <?php printf(strtolower($midia_categ)); ?>.</p>
			<p>Por favor volte novamente mais tarde para conferir as novidades. :)</p>
		</div>
		<?php } ?>
	</div>
	
	<?php require "footer.inc.php"; ?>
  </body>
</html>
