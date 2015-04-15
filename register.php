<?php
	include_once("db.php");

	if(!empty($_POST)){
	    $err = array();
	    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])){
	        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        }
		if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30){
	        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
	    }
	    # проверяем, не сущестует ли пользователя с таким именем
	    $query = $mysqli->query("SELECT *
						      FROM users WHERE 
						      user_login='".$mysqli->real_escape_string($_POST['login'])."' LIMIT 1");
	    if($query->fetch_assoc() > 0){
	        $err[] = "Пользователь с таким логином уже существует в базе данных";
	    }
		# Если нет ошибок, то добавляем в БД нового пользователя
	    if(count($err) == 0){
	        $login = $_POST['login'];
	        # Убераем лишние пробелы и делаем двойное шифрование
	        $password = $_POST['password'];
	        $mysqli->query("INSERT INTO users SET user_login='".$login."', user_password='".$password."'");
	        header("Location: login.php"); 
	        exit();
	    }else{
	        print "<b>При регистрации произошли следующие ошибки:</b><br>";
	        foreach($err AS $error){
	            print $error."<br>";
	        }
	    }
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
</head>
<body>
	<form method="POST">
	Логин:<br>
	<input name="login" type="text"><br>
	Пароль:<br>
	<input name="password" type="password"><br>
	<input name="submit" type="submit" value="Зарегистрироваться">
</form>
</body>
</html>
