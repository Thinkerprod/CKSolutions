<?php include("includes/project-functions.php");?>
<?php include_once("../php_util/db.php"); ?>


<section id="project-section" class="projSection container-fluid">
<h2 class="Display-2">Portfolio</h2>


<button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#CurrentProjects" aria-expanded="false" aria-controls="CurrentProjects">Current Projects</button>


<!-- Completed projects content -->


    <div class="container collapse multi-collapse" id="CurrentProjects">
      
    <div class="row">
  <div class="col-sm-1 col-md-2 col-lg-3">
      <?php getAllCurrentProjects($connection); ?>
    </div>
  </div>
</div>
</div>

<!-- Past projects content -->

<button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#PastProjects" aria-expanded="false" aria-controls="PastProjects">Past Projects</button>

    <div class=" container collapse multi-collapse" id="PastProjects">
   
<div class="row">
  <div class="col-sm-1 col-md-2 col-lg-3">
    <?php getAllPastProjects($connection); ?>
    </div>
  </div>
</div>
</div>
</section>