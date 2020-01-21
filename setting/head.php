<title>Aplikasi Manajemen Surat</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"> 
	<link rel="stylesheet" type="text/css" href="assets/css/native-css/css-setting/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/native-css/css-setting/footer.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/materializes.css">
	<link rel="icon" href="img/ico.ico">
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/materialize.min.css"> -->
	<script type="text/javascript" src="assets/js/pace.min.js"></script>
	<!-- Loading Screen on top -->
	<style type="text/css">
		.pace {
		  -webkit-pointer-events: none;
		  pointer-events: none;

		  -webkit-user-select: none;
		  -moz-user-select: none;
		  user-select: none;
		}

		.pace-inactive {
		  display: none;
		}

		.pace .pace-progress {
		  background: #bbdefb;
		  position: fixed;
		  z-index: 2000;
		  top: 0;
		  right: 100%;
		  width: 100%;
		  height: 2px;
		}
	</style>


<?php 
// error_reporting(0);
session_start();

include "conn.php";

// require "vendor/autoload.php";
// use Medoo\Medoo;
// $db = new Medoo([
// 	'database_type' => 'mysql',
//     'database_name' => 'persuratan_disdukcapil',
//     'server' => 'localhost',
//     'username' => 'root',
//     'password' => '',		

//     ])
?>