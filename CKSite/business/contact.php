<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bb58b73510.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/master-nav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Contact</title>
</head>
<body>
<?php include_once "includes/contact-header.php";?>

    <div class="container">    
        
    <form action="contact.php" method="post">
    <h1>Contact Me</h1>
    <div class="names">
            <div class="input-design">
                <input type="text" name="firstname" id="firstname" placeholder="First Name">
            </div>
            <div class="input-design">
                <input type="text" name="lastname" id="lastname" placeholder="Last Name">
            </div>
    </div>
    <div class="contact-info">
        <div class="input-design">
        <input type="email" name="email" id="email" placeholder="Email">
        </div>
        
        <div class="input-design">
        <input type="tel" name="telephone" id="telephone" placeholder="Phone #">
        </div> 
    </div>
        
        <div class=" large-input">
        <textarea name="message" id="message" placeholder="your message here"></textarea>
        </div>
        <input type="button" value="Submit" class="submit-btn">
    </form>
    <img src="images/envelope.png" alt="white envelope">
    </div>

    
</body>
</html>