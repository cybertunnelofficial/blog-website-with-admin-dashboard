<?php

	$serverhost = "localhost";
	$serveruser = "root";
	$serverpassword = "";
	$serverdatabasename = "idense";

	$connection = mysqli_connect($serverhost,$serveruser,$serverpassword,$serverdatabasename,) or die("Critical Error: Error Establishing Database Connection!");

?>