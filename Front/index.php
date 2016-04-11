<?php

include 'config/options.php';

// Get the query
$q = empty($_GET['q']) ? '' : $_GET['q'];

// Routes
if($q == '')
	$page = 'home';
else if($q == 'mentionslegales')
	$page = 'mentionslegales';
else if($q == 'cgv')
	$page = 'cgv';
else
	$page = '404';

// Includes
include 'controllers/'.$page.'.php';
include 'controllers/links.php';
include 'views/partials/header.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';