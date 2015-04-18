<?php 
include_once("db.php");
include "require_login.php";

$id = empty($_GET['id']) ? 0 : $_GET['id'];
$user_id = $_SESSION['user']['user_id'];
if ($id) {
	$res = $mysqli->query("SELECT user_id FROM baneer WHERE id = ".$id);
	$authorData =  $res->fetch_assoc();
	if ($authorData['user_id'] != $user_id) die('Access denied');
}
if(!empty($_POST)){
	$label = $_POST['label'];
	$on_off = $_POST['on_off'];
	$page = $_POST['page'];
	$dt_start = strtotime($_POST['dt_start']);
	$dt_start_new = date("Y-m-d H:i:s", $dt_start);
	$dt_end = strtotime($_POST['dt_end']);
	$dt_end_new = date("Y-m-d H:i:s", $dt_end);
	$min_page = (int) $_POST['min_page'];
	$comment = $_POST['comment'];

	$sqlValuesPart = "
		SET `name`='".$mysqli->real_escape_string($label)."',
			`on_off`='$on_off',
			`page`='$page',
			`dt_start`='$dt_start_new',
		 	`dt_end`='$dt_end_new',
		 	`min_page`='$min_page',
		 	`comment`='$comment',
		 	`user_id` = $user_id
	";
	if ($id) {
		$sql = "UPDATE `baneer` $sqlValuesPart WHERE id = $id";
		$mysqli->query($sql);
	} else {
		$sql = "INSERT INTO `baneer` $sqlValuesPart";
		$mysqli->query($sql);
		header('location: ?id=' . $mysqli->insert_id);
		exit;
	}
}
if ($id) {
	$res = $mysqli->query("SELECT * FROM baneer WHERE id = ".$id);
	$row = $res->fetch_assoc();
} else {
	$row = array('name' => '', 'page' => '', 'dt_start'=>'', 'dt_end' =>'', 'comment'=>'');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<a href="index.php">Главная страница</a>
	<form method="post" action="" name="my_form" id="formBanner">
		<p>Название :</p>
		<input type="text" class="text_fild" name="label" value="<?php echo htmlspecialchars($row['name']);?>" placeholder="Название"><span style="color:red" id="ban"></span>
		<p>Включить или выключить баннер :</p>
		<input type="radio" name="on_off" value="On" checked>Вкл.
		<input type="radio" name="on_off" value="Off">Выкл.
		<p>Код страницы для отображения баннера: </p>
		<input type="text" class="text_fild" name="page" value="<?php echo $row['page']?>" />
		<p>Дата и время отображения баннера(начало и конец) :</p>
		<p>Начало :<input type="text" class="text_fild" name="dt_start" value="<?=$row['dt_start'];?>">
		Конец  :<input type="text" class="text_fild" name="dt_end" value="<?=$row['dt_end'];?>"></p>
		<p>HTML код баннера :</p>
   		<textarea name="comment" cols="40" rows="3"><?=$row['comment'];?></textarea>
   		<br><br>
	    <input type="submit" class="btn" value="Сохранить"></input>
	</form>
</body>
</html>