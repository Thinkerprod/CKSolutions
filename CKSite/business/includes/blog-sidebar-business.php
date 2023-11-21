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
                    <li>January</li>
                    <li>February</li>
                    <li>March</li>
                    <li>April</li>
                    <li>May</li>
                    <li>June</li>
                    <li>July</li>
                    <li>August</li>
                    <li>September</li>
                    <li>October</li>
                    <li>November</li>
                    <li>December</li>
                </ul>
            </div>
        </div>
    </div>
    </nav>