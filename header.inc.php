<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php printlink("favicon.ico"); ?>">

    <title><?php printf($page_info['page_name']); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php printlink("css/bootstrap.min.css"); ?>" rel="stylesheet">
	
	<!-- Documentation extras -->
	<link href="<?php printlink("css/docs.min.css"); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
	<?php
	if (isset($page_info) && isset($page_info['theme_name']) && $page_info['theme_name'] != null)
	{
		?>
		<link href="<?php printlink(sprintf("themes/%s/bootstrap.min.css", $page_info['theme_name'])); ?>" rel="stylesheet">
		<?php
	}
	?>
    <link href="<?php printlink("css/myl.core.css"); ?>" rel="stylesheet">
    <link href="<?php printlink("css/myl.cpanel.css"); ?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php printlink("js/ie10-viewport-bug-workaround.js"); ?>"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>