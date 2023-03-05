<?php

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Work+Sans:wght@300&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <h2 class="warning"></h2>
        <form action="submit" method="post">
            <label for="email-input">Email</label>
            <input class="input-text" type="email" name="email" id="email-input">
            <label for="password-input">Password</label>
            <input class="input-text" type="password" name="password" id="password-input">
            <input class="input-button" type="button" value="Submit">
        </form>

    </div>
</body>
</html>