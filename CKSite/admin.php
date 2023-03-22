<?php 

require_once("php_util/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bb58b73510.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/admin.css">

    <title>Admin Portal</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">CK</div>
            <div class="nav-title">Admin Portal</div>
            <div class="logout"><a href="php_util/logout.php">logout</a></div>
        </nav>
        
    </header>
    <div class="admin-container container-sm container-md container-lg">
        <div class="banner">
            <img src="media/images/Thinker.png" alt="Thinker" class="thinker">
            <h1>Welcome<br>Cory</h1>
        </div>
        <div class="adminNav-wrapper">
            
            <input type="checkbox" name="adminCheckbox" id="adminCheckbox">
            <label class="burger" for="adminCheckbox">Select Module To View<i class="fa-solid fa-bars"></i></label>
            <div class="adminNav">
                <div class="menuBtn" id="blogBtn">Blog</div>
                <div class="menuBtn" id="writingBtn">Fiction</div>
                <div class="menuBtn" id="projectsBtn">Projects</div>
                <div class="menuBtn no-border" id="analyticsBtn">Analytics</div>
            </div>
        </div>
        <div class="wrapper blog-wrapper" id="blog">
            <div class="code-blog" id="codeBlog">
                <h2>Coding Blog</h2>

            </div>
            <div class="personal-blog" id="personalBlog">
                <h2>Personal Blog</h2>
            </div>
        </div>
        <div class="cw-wrapper" id="creative-writing">
            <h2>Fiction</h2>
        </div>
        <div class="projects-wrapper" id="projects">
            <h2>Projects</h2>
        </div>
        <div class="analytics-wrapper" id="analytics">
            <h2>Analytics</h2>
        </div>
    </div>
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/admin.js"></script>
</body>
</html>