<?php

	$con = mysqli_connect(ip, root, "", bugtracker);

	if (!$con){
		die('Connection Failed' . mysqli_connect_error());
	}
?>