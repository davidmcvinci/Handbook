<?php
	$serverName = "localhost";
	$dBUsername = "root";
	$dBPassword = "";
	$dBName = "login";
	
	//it has to be in that order//
	$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName) or die("Oh, no");