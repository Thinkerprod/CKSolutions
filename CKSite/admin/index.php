<?php include "includes/header.php"?>
    <div class="admin-container container-sm container-md container-lg d-flex">
        <div class="banner">
            <img src="images/Thinker.png" alt="Thinker" class="thinker">
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
<?php  
// include_once "../../php_functions/blog_functions.php";
include_once "../admin/includes/admin_blog_display.php"; ?>
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