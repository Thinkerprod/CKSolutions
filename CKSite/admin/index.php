<?php include "includes/header.php"?>


<div class="admin-container">
    <?php include "includes/dashboard.php"; ?>
    
        <div class="main-content">

        
            <?php include "includes/addAllPaintings.php"?>
            <?php include "includes/addPostForm.php"?>


        <div class="banner">
            <img src="images/Thinker.png" alt="Thinker" class="thinker">
            <h1>Welcome<br>Cory</h1>
        </div>
<?php include "includes/main-nav-buttons.php"; ?>
        <div class="wrapper blog-wrapper" id="blog">
            <div class="code-blog" id="codeBlog">
                <h2>Coding Blog</h2>
                <?php  include_once "../admin/includes/admin_businessblog_display.php"; ?>
            </div>
            <div class="personal-blog" id="personalBlog">
                <h2>Personal Blog</h2>
                <?php  include_once "../admin/includes/admin_personalblog_display.php"; ?>
            </div>
        </div>
        <div class="cw-wrapper" id="creative-writing">
            <h2>Creative Writing</h2>
            <?php  include_once "../admin/includes/admin_creativewriting_display.php"; ?>
        </div>
        <div class="projects-wrapper" id="projects">
            <h2>Projects</h2>
            <?php  include_once "../admin/includes/admin_projects_display.php"; ?>
        </div>
        <div class="paintings-wrapper" id="paintings">
            <h2>Paintings</h2>
            <?php  include_once "../admin/includes/admin_projects_display.php"; ?>
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