<?php
	require("config/config.php");
	require("lib/db.php");
	$conn=db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
	$sql = "INSERT INTO topic (title,description,author,created) VALUES('".$_POST['title']."', '".$_POST['description']."', '".$_POST['author']."', now())";
	$result = mysqli_query($conn, $sql);
	header('Location: http://Work/DBconn/DBconn.php');
?>
