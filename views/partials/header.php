<body>
	<div class="container header">
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
                        <li><a href="<?= URL ?>signin" class="menu_inc button-effect2">Inscription</a></li>
                        <li><a href="<?= URL ?>login" class="menu_co button-effect1">Connection</a></li>
                    </ul>
    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>