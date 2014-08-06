<footer class="bs-docs-footer" role="contentinfo">
	<div class="container">
		<ul class="bs-docs-footer-links muted">
			<li><a href="<?php printlink(); ?>">Início</a></li>
			<?php foreach ($page_categorias as $nome_seo => $descricao) { ?>
			<li>&middot;</li>
			<li><a href="<?php printlink("midia/" . $nome_seo); ?>"><?php print($descricao); ?></a></li>
			<?php } ?>
			<li>&middot;</li>
			<li><a href="<?php printlink("contato"); ?>">Contato</a></li>
		</ul>
		
		<p>Produzido por <a href="http://www.mobyourlife.com.br" target="_blank">Mob Your Life</a> &copy; 2014 - Todos os direitos reservados</p>
	</div>
</footer>

<div id="fb-root"></div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php printlink("js/bootstrap.min.js"); ?>"></script>
<script src="<?php printlink("js/facebook.sdk.js"); ?>"></script>
<script src="<?php printlink("js/facebook.login.js"); ?>"></script>
<script src="<?php printlink("js/myl.events.js"); ?>"></script>
<script src="<?php printlink("js/chest.painel.js"); ?>"></script>
<script type="text/javascript">$('body').data('url-painel', '<?php printlink("painel"); ?>');</script>