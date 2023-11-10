<?php include("includes/project-functions.php");?>
<?php include_once("../php_util/db.php"); ?>


<section id="project-section">
  <div class="container-fluid bg-white pt-1 pb-3">
    <h2 class="display-3 fw-bold text-uppercase text-center mt-3 mb-5 white-headers">Portfolio</h2>
    <div class="container-fluid d-flex justify-content-center stack-icons my-5">
      <i class="fa-brands fa-html5 display-3 mx-2 "></i>
      <i class="fa-brands fa-css3-alt display-3 mx-2 "></i>
      <i class="fa-brands fa-js display-3 mx-2"></i>
      <i class="fa-brands fa-php display-3 mx-2"></i>
      <i class="fa-brands fa-node-js display-3 mx-2"></i>
    </div>
   
      
      
   

<!-- Completed projects content -->

<div class="d-grid col-12 ">
    <button class="btn btn-light fs-1 border-none text-nowrap mt-5 " type="button" data-bs-toggle="collapse" data-bs-target="#CurrentProjects" aria-expanded="false" aria-controls="CurrentProjects">Current Projects <i class="material-symbols-outlined fs-3">chevron_right</i></button>
    </div>
    <div class="container bg-white h-100">
    <div class="collapse multi-collapse" id="CurrentProjects">
      
      <div class="row">
        
          <?php getAllCurrentProjects($connection); ?>
        <!-- </div> -->
      </div>
    </div>
    </div>


<!-- Past projects content -->

<div class="d-grid col-12">
  <button class="btn btn-light fs-1 border-none text-nowrap mb-5" type="button" data-bs-toggle="collapse" data-bs-target="#PastProjects" aria-expanded="false" aria-controls="PastProjects">Past Projects <i class="material-symbols-outlined fs-3">chevron_right</i></button>
</div>
  <div class="container bg-white h-100">
    <div class="collapse multi-collapse" id="PastProjects">
      
      <div class="row">
        <!-- <div class="col-sm-1 col-md-2 col-lg-3"> -->
          <?php getAllPastProjects($connection); ?>
        <!-- </div> -->
      </div>
      </div>
    </div>
  </div>

</section>