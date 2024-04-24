<?php 
define('BASE_URL','/CKSolutions/CKSite/adventure/');
        $path=BASE_URL.'php_util/spooky-hell.gif';
        $css_path=BASE_URL.'php_util/404.css';
        
         ?>

<!-- C:\xampp\htdocs\CKSolutions\CKSite\php_util\spooky-hell.gif -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="../css/404.css"> -->
<?php echo "<link rel='stylesheet' href='".$css_path."'>"; ?>
    <title>404</title>
</head>
<body>
    <div class="not-found">
        <h1>404 Page Not Found!</h1>
        
        <?php echo "<img src='".$path."' alt='woman screaming'>"; ?>
        
    </div>
</body>
</html>