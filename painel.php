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
        <h1>Painel do usuário</h1>
        <p>Administre o seu site com facilidade!</p>
      </div>
    </div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Painel do usuário</h3>
						<span class="pull-right">
							<ul class="nav panel-tabs">
								<li class="active"><a href="#perfil" data-toggle="tab">Aparência</a></li>
							</ul>
						</span>
					</div>
					<div class="panel-body">
						<div class="tab-content">
						<div class="tab-pane active" id="perfil">
							<div class="row">
								<div class="col-md-12 col-lg-12"> 
									<table class="table table-user-information">
										<tbody>
											<tr>
												<td>Tema:</td>
												<td>
													<div class="btn-group">
													  <button id="theme-current" data-theme-id="0" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
														- Padrão - <span class="caret"></span>
													  </button>
													  <ul id="theme-list" class="dropdown-menu" role="menu">
														<li><a href="#" data-theme-id="0" data-theme="">- Padrão -</a></li>
														<?php
														$themes_list = get_themes_list();
														
														foreach ($themes_list as $theme_id => $theme_name)
														{
															printf("<li><a href=\"#\" data-theme-id=\"%d\" data-theme=\"%s\">%s</a></li>", $theme_id, $theme_name, $theme_name);
														}
														
														?>
													  </ul>
													</div>
												</td>
											</tr>
										</tbody>
									</table>

									<div class="center">
										<button id="btn-salvar-painel" class="btn btn-lg btn-info" data-action="<?php printlink("salvar-painel"); ?>"><span class="fa fa-save jump-5"></span> Salvar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php require "footer.inc.php"; ?>
  </body>
</html>
