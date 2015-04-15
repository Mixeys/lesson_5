<?php

	define('DB_LOCAL',"localhost");
	define('DB_LOGIN',"mixa");
	define('DB_PASS',"mixa");
	define('DB_NAME',"temp");

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$mysqli = new mysqli(DB_LOCAL, DB_LOGIN, DB_PASS, DB_NAME);
	mysqli_set_charset($mysqli , "utf8");

