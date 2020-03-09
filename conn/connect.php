<?php
	$host="127.0.0.1";
	$user="root";
	$pass="";
	$db="test";

	$connect=new mysqli($host, $user, $pass, $db) or die("error" . msqli_errno($connect));

 ?>
