<?php 
session_start();
require_once("php_util/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo"><img src="" alt=""></div>
            <div class="logout"><a href="php_util/logout.php"></a></div>
        </nav>
        <div class="welcome"></div>
    </header>
    <div class="admin-container">
        <div class="adminNav-wrapper">
            <div class="adminNav">
                <div class="menuBtn" id="blogBtn"></div>
                <div class="menuBtn" id="writingBtn"></div>
                <div class="menuBtn" id="projectsBtn"></div>
                <div class="menuBtn" id="analyticsBtn"></div>
            </div>
        </div>
        <div class="blog-wrapper" id="blog">
            <div class="code-blog" id="codeBlog">
                <h2>Coding Blog</h2>
            </div>
            <div class="personal-blog" id="personalBlog">
                <h2>Personal Blog</h2>
            </div>
        </div>
        <div class="cw-wrapper" id="creative-writing">
            <h2>Creative Writing</h2>
        </div>
        <div class="projects-wrapper" id="projects">
            <h2>Analytics</h2>
        </div>
        <div class="analytics-wrapper" id="analytics">
            <h2>Analytics</h2>
        </div>
    </div>
    
</body>
</html>