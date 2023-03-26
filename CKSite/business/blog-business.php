
    <?php require_once("includes/blog-header.php")  ?>
    <nav class="full-side-bar">
    <div class="side-bar">
        <div class="search-section"><h3>search</h3> <form class="search-form" action="php_util/search.php" method="post">
            <input type="search" name="search-bar" id="search-bar">
            <input type="submit" value="Search &f002">
        </form></div>
        <div class="archive"></div>
    </div>
    </nav>

    <div class="header-image"></div>
    <h1>Page Title</h1>

    <div class="extra-identifiers">

    <div class="search-section"><h3>search</h3> <form class="m-search-form" action="php_util/search.php" method="post">
            <input type="search" name="search-bar" id="m-search-bar">
            <input type="button" value="Search &f002">
        </form></div>

            <i class="fa-solid fa-calendar-days" id="mCalendar"></i>

        </div>

        <div class="blog-entry" id="blogPost">
    <h2>Blog post title</h2>
    <h3>by Author</h3>
    <small>Date</small>

    <img class="post-image" src="" alt="">
    <p class="post-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Quos, dignissimos dolores adipisci maxime obcaecati suscipit molestias blanditiis perspiciatis voluptatum labore 
        doloribus fugiat eligendi dolorum optio nemo sapiente inventore hic rem.</p>
        <p class="tags"></p>
    </div>


    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>