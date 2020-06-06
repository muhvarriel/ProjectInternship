<?php
 	if (!isset($_SESSION)) {
		session_start();
	}
	
	require "connection.php";
	include 'assets/header.php';

	$pages_dir = 'pages';
	if(!empty($_GET['p'])){
		$pages = scandir($pages_dir, 0);
		unset($pages[0], $pages[1]);

		$p = $_GET['p'];
		if(in_array($p.'.php', $pages)){
			include($pages_dir.'/'.$p.'.php');
		} else {
			include($pages_dir.'/error.php');
		}
	} else {
		include($pages_dir.'/home.php');
	}

	include 'assets/footer.php';
?>