<?php 
include_once("db.php");
include "require_login.php";

$id = empty($_GET['id']) ? 0 : $_GET['id'];
if(!empty($_POST)){
	$label = $_POST['label'];
	$on_off = $_POST['on_off'];
	$page = $_POST['page'];
	$dt_start = strtotime($_POST['dt_start']);
	$dt_start_new = date("Y-m-d H:i:s", $dt_start);
	$dt_end = strtotime($_POST['dt_end']);
	$dt_end_new = date("Y-m-d H:i:s", $dt_end);
	$min_page = (int) $_POST['min_page'];
	$user_id = $_SESSION['user']['user_id'];
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
	$row = array('name' => '', 'page' => '', 'dt_start'=>'', 'dt_end' =>'', comment=>'');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit</title>
</head>
<body>
	<form method="post" action="" name="my_form" id="formBanner">
		<p>Название :</p><br>
		<input type="text" name="label" value="<?php echo htmlspecialchars($row['name']);?>"><span style="color:red" id="ban"></span><br>
		<p>Включить или выключить баннер :</p><br>
		<p><input type="radio" name="on_off" value="On" checked>Вкл.</p><br> 
		<p><input type="radio" name="on_off" value="Off">Выкл.</p><br>
		<p>Код страницы для отображения баннера: </p><br>
		<input type="text" name="page" value="<?php echo $row['page']?>" />
		<br>
		<p>Дата и время отображения баннера(начало и конец) :</p><br>
		<p>Начало :<input type="text" name="dt_start" value="<?=$row['dt_start'];?>">
		Конец  :<input type="text" name="dt_end" value="<?=$row['dt_end'];?>"></p><br>
		<p>Минимальное количество просмотров страницы : </p><br>
		<select name="min_page" size="1">
			<option value="0" selected>0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select><br>
		<p>HTML код баннера :</p><Br>
   		<textarea name="comment" cols="40" rows="3"><?=$row['comment'];?></textarea><br>
	    <div class="form-actions">
		    <input type="submit" class="btn btn-primary">Сохранить</input>
		    <button type="button" class="btn">Очистить</button>
    	</div>
	</form>
	<a href="index.php">Главная страница</a>
</body>
</html>