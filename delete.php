<?php 

	include_once("db.php");
	session_start();
	$id = $_GET['id'];
	$res = $mysqli->query("SELECT * FROM baneer WHERE id = ".$id);
	$row = $res->fetch_assoc();
	$res = (int)$_SESSION['user']['user_id'];
	if($res == $row['user_id']){
		$mysqli->query("DELETE FROM `baneer` WHERE id = $id");
		header("location: index.php");
	}