<?php include "includes/header.php"?>


<div class="admin-container">
    <?php include "includes/dashboard.php"; ?>
    
        <div class="main-content">

        
            <?php include "includes/addAllPaintings.php"?>
            <?php include "includes/addPost.php"?>


        <div class="banner">
            <img src="images/Thinker.png" alt="Thinker" class="thinker">
            <h1>Welcome<br>Cory</h1>
        </div>
<?php include "includes/main-nav-buttons.php"; ?>
        <div class="wrapper blog-wrapper" id="blog">
            <div class="code-blog" id="codeBlog">
                <h2>Coding Blog</h2>
<?php  include_once "../admin/includes/admin_blog_display.php"; ?>
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
</div>
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/admin.js"></script>
</body>
</html>