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
<?php require_once("headers/nav.php")?>
<section id="intro">

<div class="intro-area">

  <div class="introWrapper">
    <h1 class="intro"><span class="hello">Hello,</span> <br> My name is</br>John Smith. <br> I'm a <br>web developer.</h1>
  </div>
  <div class="hire">
    <img src="https://placekitten.com/75/75" alt="" class="head">
    <div class="hireCombo">
      <div class="blackCircle"></div>
      <div class="hireBtn">
        <span id="hireText">Hire Me</span>
      </div>

    </div>

  </div>
</div>

<div class="intro-area flippedArea">

  <div class="introWrapper">
    <div class="mask"></div>
    <h1 class="intro introFlipped"><span class="hello">Hello,</span> <br><span class="flipText">My name is</span> </br><span class="flipText">John Smith.</span> <br> <span class="flipText">I'm a</span> <br><span class="flipText">web developer.</span></h1>
  </div>
  <div class="hire">
    <div class="head rotated"><img src="https://placekitten.com/100/100" alt="" class="profile"></div>
    <div class="hireCombo">
      <div class="blackCircle"></div>
      <div class="hireBtn introFlipped hireBtnFlipped">
        <span id="hireText">Hire Me</span>
      </div>

    </div>

  </div>
</div>

</section>

<section id="project-section" class="projSection">
<h2 class="projHeader headers">Portfolio</h2>
<div class="proj-container" id="projects">
  <div class="project"><img src="https://placekitten.com/200/100" alt="" class="proj"></div>
  <div class="project"><img src="https://placekitten.com/200/100" alt="" class="proj"></div>
  <div class="project"><img src="https://placekitten.com/200/100" alt="" class="proj"></div>
  <div class="project"><img src="https://placekitten.com/200/100" alt="" class="proj"></div>
  <div class="project"><img src="https://placekitten.com/200/100" alt="" class="proj"></div>
  <div class="project"><img src="https://placekitten.com/200/100" alt="" class="proj"></div>
  <div class="project"><img src="https://placekitten.com/200/100" alt="" class="proj"></div>
</div>
<div class="position-container">
  <div class="backwards" id="backward">
    <div class="b-fill"></div>
  </div>
  <div class="project-position" id="projPos"></div>
  <div class="forwards" id="forward">
    <div class="f-fill"></div>
  </div>
</div>
</section>

<section class="testimonial" id="testimony-section">
<h2 class="test-header">Testimonial</h2>
<p class="testimony">"Did you hear that? They've shut down the main reactor. We'll be destroyed for sure. This is madness! We're doomed! There'll be no escape for the Princess this time. What's that? Artoo! Artoo-Detoo, where are you? At last! Where have you been? They're heading in this direction. What are we going to do?"<br>
  <span class="quote">-C-3P0</span>
</p>
<p class="testimony">"In a way, you have determined the choice of the planet that'll be destroyed first. Since you are reluctant to provide us with the location of the Rebel base, I have chosen to test this station's destructive power. on your home planet of Alderaan."<br>
  <span class="quote">-Grand Moff Tarkin</span>
</p>
</section>

<section class="about" id="about-section">
<h2 class="about-header">About</h2>
<div class="about-container">
  <div class="about-profile"><img src="https://placekitten.com/300/300" alt="" class="about-img"></div>
  <div class="about-article">
    <article class="about-me">Cat ipsum dolor sit amet, Gate keepers of hell rub against owner because nose is wet jump on fridge, so x. Loves cheeseburgers. Reward the chosen human with a slow blink. Human give me attention meow plan your travel or claw your carpet in places everyone can see - why hide my amazing artistic clawing skills? lick the other cats am in trouble, roll over, too cute for human to get mad yet do not try to mix old food with new one to fool me! and furrier and even more furrier hairball. Sit and stare i like cats because they are fat and fluffy so purr while eating. So you're just gonna scroll by without saying meowdy? mmmmmmmmmeeeeeeeeooooooooowwwwwwww or purrr purr littel cat, little cat purr purr for eat my own ears.</article>
  </div>
</div>

</section>
<script src="js/jquery-3.6.3.min.js"></script>
<script src="js/business.js"></script>
</body>
</html>