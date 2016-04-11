<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="<?= URL ?>src/css/init/reset.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= URL ?>src/css/premproject/style.css">
	<link rel="stylesheet" href="<?= URL ?>src/css/premproject/responsive.css">
</head>
<body>
	<div class="container header">
		<div class="gradient"></div>
			<div class="menu">
				<div class="col-md-4 logo">
					<a href="<?= URL ?>home">
						<img src="<?= URL ?>src/images/logos/logo.png" alt="PremProject">
					</a>
				</div>
			</div>

		<nav class="navbar navbar-default header_nav">
  			<div class="container-fluid">
   
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div>

  
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     				<ul class="nav navbar-nav navbar-right menu_top">
                       	<li><a href="<?= URL ?>product" class="menu_link">Produit</a></li>
                        <li><a href="<?= URL ?>abonnement" class="menu_link">Abonnement</a></li>
                        <li><a href="<?= URL ?>support" class="menu_link">Support</a></li>
                        <li><a href="<?= $navBlog ?>" class="menu_link">Blog</a></li>
                        <li><a href="<?= $navSignin ?>" class="menu_inc button-effect2">Inscription</a></li>
                        <li><a href="<?= $navLogin ?>" class="menu_co button-effect1">Connection</a></li>
                    </ul>
    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>

		<div class="page_title">	
			<div class="row">
				<div class="col-md-12">
					<?= $sectionTitle ?>
				</div>
			</div>
		</div>
	</div>