<?php
    include 'require_login.php';
    include_once("db.php");
    $var = (int)$_SESSION['user']['user_id'];
    $res = $mysqli->query("
        SELECT * FROM `baneer`
        WHERE user_id = $var
    ");

    if(isset($_GET["search"])){
        $name = $_GET['search'];
        $res = $mysqli->query("
            SELECT * FROM `baneer` 
            WHERE name LIKE '%$name%'
        ");
    }
    while ($row = $res->fetch_assoc()){    
        $banners[] = $row;
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <form action="" method="get">
        <input type="text" name="search">
        <input type="submit" value="Search">
    </form>
    <table id="table_banner">
        <tr>
            <th>Id</th>
            <th>Name banner</th>
            <th>Link banner</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach($banners as $banner): ?>
        <tr>
            <td>
                <?php echo $banner['id'];?>
            </td>
            <td>
                <?php echo htmlspecialchars($banner['name']);?>
            </td>
            <td><a href="http://localhost/table/get_banner.php?page=<?php echo htmlspecialchars($banner['page']);?>&user=<?php echo $_SESSION['user']['user_id'];?>">Ссылка на баннер</a></td>
            <td><a href="edit.php?id=<?php echo $banner['id'];?>"><img src="images/Documents%20Edit%202.png" alt=""></a></td>
            <td><a href="delete.php?id=<?php echo $banner['id'];?>"><img src="images/Documents%20Delete.png" alt=""></a></td>       
        </tr>
        <?php endforeach ?>
    </table>
    <a href="edit.php">Создать баннер</a>
    <a href="logout.php">Выход</a> Логин: <?php echo $_SESSION['user']['user_login'];?>
</body>
</html>