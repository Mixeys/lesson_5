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
    $banners = array();
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
    <p>Логин: <?php echo $_SESSION['user']['user_login'];?></p>
    <a href="edit.php">Создать баннер</a>
    <a href="logout.php">Выход</a>
    <form action="" method="get" id="form_search">
        <input type="text" name="search">
        <input type="submit" value="Search">
    </form>
    <table id="table_banner">
        <tr>
            <th>Id</th>
            <th>Banner name</th>
            <th>Banner link</th>
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
            <td>http://localhost/table/get_banner.php?page=<?php echo htmlspecialchars($banner['page']);?>&user=<?php echo $_SESSION['user']['user_id'];?></td>
            <td><a href="edit.php?id=<?php echo $banner['id'];?>"><img src="images/Documents%20Edit%202.png" alt=""></a></td>
            <td><a href="delete.php?id=<?php echo $banner['id'];?>"><img src="images/Documents%20Delete.png" alt=""></a></td>       
        </tr>
        <?php endforeach ?>
        <?php if(empty($banners)):?>
            <tr>
                <td colspan="5">No banners yet</td>
            </tr>
        <?php endif?>
    </table>
</body>
</html>