<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="business-blog.css">
    <script src="https://kit.fontawesome.com/bb58b73510.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Stick To the Code - Blog</title>
    
</head>
<body>
    <?php require_once("headers/nav.php")  ?>
    <div class="header-image"></div>
    <h1>Page Title</h1>
    <div class="side-bar">
        <div class="search-section"><h3>search</h3> <form class="search-form" action="php_util/search.php" method="post">
            <input type="search" name="search-bar" id="search-bar">
            <input type="button" value="Search &f002">
        </form></div>
        <div class="archive"></div>
    </div>
    <div class="extra-identifiers">

    <div class="search-section"><h3>search</h3> <form class="m-search-form" action="php_util/search.php" method="post">
            <input type="search" name="search-bar" id="m-search-bar">
            <input type="button" value="Search &f002">
        </form></div>

            <i class="fa-solid fa-calendar-days" id="mCalendar"></i>

        </div>


    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>