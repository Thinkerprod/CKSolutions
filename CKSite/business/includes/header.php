
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business</title>
    <link rel="stylesheet" href="css/business.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Babylonica&family=Bitter&family=Mukta&family=Crimson+Text&family=Montserrat:wght@300&family=Work+Sans:wght@300&display=swap" rel="stylesheet">
    
</head>
<body>
<header>

<nav class="navbar">
    <input type="checkbox" name="burgerCheck" id="burgerCheckbox">
  <h2 class="logo">CK</h2>
  <label for="burgerCheckbox" class="menu" id="menuBars">

  
    <div class="bars top" id="top-bar"></div>
    <div class="bars middle" id="middle-bar"></div>
    <div class="bars bottom" id="bottom-bar"></div>
  

</label>
<div class="navLinks ">
<a class="menuItem hoverLine" href="CKSite/business/index.php">Home</a>
<div class="menuItem subNav" id="sub">
  <div class="folio">Portfolio</div>
  <div class="subnav-content">
    <a href="#" class="past" id="past-link">Past Projects</a>
    <a href="#" class="current" id="current-link">Current Projects</a>
  </div>
</div>
<a class="menuItem hoverLine" href="#">About</a>
<a class="menuItem hoverLine" href="/CKSolutions/CKSite/business/blog-business.php">Blog</a>
<a class="menuItem hoverLine" href="#">Contact</a>
<a class="menuItem hoverLine" href="/CKSolutions/CKSite/login.php" target="_blank">Login</a>
<a class="menuItem hoverLine" href="/CKSolutions/CKSite/admin/" target="_blank">Admin</a>
</div>


</nav>
<div class="mobile-nav" id="mobileNav">

<div class="mobile-links">

  <div class="mobile-link"><a href="#">Home</a></div>
  <!-- <div ><a href="#">Portfolio</a></div> -->
  <label class="mobile-link" for="subNavCheck" id="subNavLabel">Portfolio</label>
  <input type="checkbox" name="subNav-Checkbox" id="subNavCheck">
  <div class="mobile-link mobile-sub">

<div class="past-projects mobile-projects" ><a id="past-mobile" href="#">Past Projects</a></div>
<div class="current-projects mobile-projects" ><a id="current-mobile" href="#">Current Projects</a></div>

  </div>
  <div class="mobile-link"><a href="#">Testimonials</a></div>
  <div class="mobile-link"><a href="#">About</a></div>
  <div class="mobile-link"><a href="#">Blog</a></div>
  <div class="mobile-link"><a href="#">Contact</a></div>
  <div class="mobile-link"><a href="/CKSolutions/CKSite/login.php">Login</a></div>

  </div>
  

</div>

</header>