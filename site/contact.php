<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My WebSite</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
</head>
<body>
    <header>
        <div class="content clearfix">
            <a href="#" id="logo"><img src="images/logo.png" alt="logo"></a>
            <nav>
                <ul>
                   <li><a href="index.php">Home</a></li>
                   <li><a href="about.php">About</a></li>
                   <li><a href="services.php">Services</a></li>
                   <li><a href="contact.php">Contact</a></li>
                   <li><a href="forum.php">Forum</a></li>
                </ul>
            </nav>
        </div><!-- end content -->
        <div id="hero" class="clearfix">
                <img src="images/computer.png" alt="computer" id="hero-image">
        </div><!-- end hero-->
    </header>
    <div id="content clearfix">
<!--
        <iframe src="banner.html" width="468" height="60" align="left">
    Ваш браузер не поддерживает плавающие фреймы!
        </iframe>
-->
        <section id="column-content">
            <h3 class="title">Contact</h3>
            <p>Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam quis risus eget urna mollis ornare vel eu leo.</p>
            <div class="wraper clearfix">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="banner" style="float:right; width: 300px; height: 500px;border: 1px solid white">
                	<?php echo file_get_contents("http://localhost/table/get_banner.php?page=index&user=7");?>
                </div>
            </div>
        </section><!-- end column-content -->
    </div>
    <footer>
        <p>Copyright &copy; 2015 Company Name</p>
        <nav class="nav clearfix">
           <ul >
               <li><a href="index.php">Home</a></li>
               <li><a href="about.php">About</a></li>
               <li><a href="services.php">Services</a></li>
               <li><a href="contact.php">Contact</a></li>
               <li><a href="forum.php">Forum</a></li>
           </ul>
       </nav>
    </footer>
</body>
</html>