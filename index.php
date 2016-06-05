<?php

include 'config/options.php';

// Get the query
$q = empty($_GET['q']) ? '' : $_GET['q'];

// Routes
if($q == '')
	$page = 'home';
else if($q == 'home')
	$page = 'home';
else if($q == 'mentions-legales')
	$page = 'mentionslegales';
else if($q == 'cgv')
	$page = 'cgv';
else if($q == 'login')
	$page = 'login';
else if($q == 'signin')
	$page = 'signin';
else if($q == 'product')
	$page = 'product';
else if($q == 'developers')
	$page = 'developers';
else if($q == 'faq')
	$page = 'faq';
else if($q == 'contact')
	$page = 'contact';
else if($q == 'presse')
	$page = 'presse';
else if($q == 'support')
	$page = 'support';
else if($q == 'pricing')
	$page = 'pricing';
else
	$page = '404';


if($q == 'home')
	$top = 'header_home';
else if($q == '')
	$top = 'header_home';
else
	$top = 'header';

// Includes
include 'controllers/'.$page.'.php';
include 'controllers/links.php';
include 'views/partials/head.php';
include 'views/partials/'.$top.'.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';