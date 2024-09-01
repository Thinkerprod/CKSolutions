<?php 
include_once "includes/sidewell_functions.php";
?>
<div class="text-start d-sm-inline-flex d-lg-flex flex-lg-column justify-content-lg-center align-items-sm-center align-items-lg-start ">
    <h2 class="text-start h4 mx-sm-2 mx-lg-0 p-lg-0" >Search</h2> 
    <div class="d-sm-inline-flex align-items-center  my-2">
    
        <form class="form-control border border-0 p-0" action="includes/blog-search.php" method="post">
            <div class="input-group">
            <input type="text" name="search-bar" id="search-bar">
            <button type="submit" class="btn btn-primary" name="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>

        </form>
    </div>
    <div class="d-lg-flex flex-lg-column justify-content-lg-center align-items-sm-center align-items-lg-start">
        <form action="includes/blog-search.php" class="form-control border border-0 p-0 bg-transparent">
        <label class="form-label bg-transparent" for="archive-select">Select Archive Period:</label>
            <div class="input-group">
        
        <select class="form-select bg-light" name="archive-select" id="archive-select">
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-calendar-days" id="mCalendar"></i></button>
        </div>
        </form>
    </div>
</div>




