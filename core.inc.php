<?php
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
	$http_referer = @$_SERVER['HTTP_REFERER'];
}

function loggedIn() {
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
		return true;
	} else {
		return false;
	}
}

function getUserField($field = '') {
	global $conn;
	global $username;
	global $password_hash;
	$x = $_SESSION['user_id'];
	$id = $x['id'];
	$query = "SELECT `$field` FROM `users` WHERE `id` = '$id'";
	$query_run = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($query_run)) {
		foreach ($row as $key => $val) {
			return $val;
		}
	}
}
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="assets/ico/favicon.png">

	<title>UPAC Sound</title>

	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="assets/css/main.css" rel="stylesheet">


	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>