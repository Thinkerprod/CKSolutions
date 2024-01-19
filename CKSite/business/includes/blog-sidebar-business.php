<?php include_once "blog-functions.php"; ?>
<nav class="full-side-bar">
    <div class="side-bar">
        <div class="search-section d-flex flex-column justify-content-start ">
            <h3>Search</h3> 
            <form class=" d-flex justify-content-center search-form" action="php_util/search.php" method="post">
            <input type="search" name="search-bar" id="search-bar">
            <input type="submit" value="Search" id="search-btn">
        </form></div>
        <div class="archive">
        <button class="btn btn-primary my-2 " type="button" data-bs-toggle="collapse" data-bs-target="#archive-lists" aria-expanded="false" aria-controls="archive-lists">Archive</button>
            <div class="collapse months" id="archive-lists">
                <ul>
                    <li><a href="blog-business.php?src=month&month=01">January</a></li>
                    <li><a href="blog-business.php?src=month&month=02">February</a></li>
                    <li><a href="blog-business.php?src=month&month=03">March</a></li>
                    <li><a href="blog-business.php?src=month&month=04">April</a></li>
                    <li><a href="blog-business.php?src=month&month=05">May</a></li>
                    <li><a href="blog-business.php?src=month&month=06">June</a></li>
                    <li><a href="blog-business.php?src=month&month=07">July</a></li>
                    <li><a href="blog-business.php?src=month&month=08">August</a></li>
                    <li><a href="blog-business.php?src=month&month=09">September</a></li>
                    <li><a href="blog-business.php?src=month&month=10">October</a></li>
                    <li><a href="blog-business.php?src=month&month=11">November</a></li>
                    <li><a href="blog-business.php?src=month&month=12">December</a></li>
                </ul>
                <?php printYearLinks();?>
            </div>
        </div>
    </div>
    </nav>
    