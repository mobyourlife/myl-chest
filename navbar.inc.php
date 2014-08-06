<div class="navbar navbar-muf navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="<?php printlink(); ?>"><?php printf($page_info['page_name']); ?></a>
	  <ul class="nav navbar-nav">
		<li<?php activelink("como-funciona"); ?>><a href="<?php printlink("sobre"); ?>">Sobre</a></li>
		<?php foreach ($page_categorias as $nome_seo => $descricao) { ?>
		<li<?php activelink("midia/" . $nome_seo); ?>><a href="<?php printlink("midia/" . $nome_seo); ?>"><?php print($descricao); ?></a></li>
		<?php } ?>
		<li<?php activelink("contato"); ?>><a href="<?php printlink("contato"); ?>">Contato</a></li>
      </ul>
	</div>
	
	<div class="navbar-collapse collapse">
	  <div class="navbar-form navbar-right">
		<?php if (!isset($fb_profile)) { ?>
		<button class="btn btn-jumbo fb-login"><span class="fa fa-facebook jump-5"></span> Entrar com Facebook</button>
		<?php } else { ?>
		<div class="btn-group">
		  <button type="button" class="btn btn-jumbo dropdown-toggle" data-toggle="dropdown">
			<span class="glyphicon glyphicon-user"></span> <?php print($fb_profile->getProperty('name')); ?> <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu" role="menu">
			<li><a href="<?php printlink("painel"); ?>">Painel do usuário</a></li>
			<li class="divider"></li>
			<li><a href="<?php printlink("sair"); ?>" class="fb-logout">Sair</a></li>
		  </ul>
		</div>
		<?php } ?>
	  </div>
	</div>
  </div>
</div>