<?php 
	include_once("db.php");
	$id = $_GET['id'];
	$mysqli->query("DELETE FROM `baneer` WHERE id = $id");
	header("location: index.php");