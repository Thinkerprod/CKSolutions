<?php 


function getAllCurrentProjects($connection){
    $CurrentQuery="SELECT * FROM projects WHERE proj_status='current'";
    $select_all_Current_Projects_query=mysqli_query($connection,$CurrentQuery);
while($row=mysqli_fetch_assoc($select_all_Current_Projects_query)){
$proj_name=$row['proj_name'];
$proj_location=$row['proj_location'];
$proj_image=$row['proj_image'];
$proj_stack=$row['proj_stack'];
$proj_desc=$row['proj_desc'];


// echo $proj_name;
$currentProject="<div class='col-sm-12 col-md-6 col-lg-4 h-100'>
<div class='card text-bg-light h-25 w-100 mb-2 shadow'>
<img src='images/projects/".$proj_image."' alt='".$proj_desc."' class='img-project card-img-top align-center'>
    <div class='card-body'>
        <h5 class='card-title'>".$proj_name."</h5>
        <h6 class='card-subtitle mb-2 text-body-secondary'>".$proj_stack."</h6>
        <p class='card-text'>".$proj_desc."</p>
        <a href='".$proj_location."' class='card-link'>More Info</a>
    </div>
</div>
</div>";

echo $currentProject;

}
}

function getAllPastProjects($connection){
    $PastQuery="SELECT * FROM projects WHERE proj_status='past'";
    $select_all_Past_Projects_query=mysqli_query($connection,$PastQuery);
while($row=mysqli_fetch_assoc($select_all_Past_Projects_query)){
$proj_name=$row['proj_name'];
$proj_location=$row['proj_location'];
$proj_image=$row['proj_image'];
$proj_stack=$row['proj_stack'];
$proj_desc=$row['proj_desc'];


// echo $proj_name;

$pastProject="<div class='col-sm-12 col-md-6 col-lg-4 h-100'>
<div class='card text-bg-light w-100 mb-2 shadow'>
<img src='images/projects/".$proj_image."' alt='".$proj_desc."' class='img-project card-img-top align-center'>
<div class='card-body'>
<h5 class='card-title'>".$proj_name."</h5>
<h6 class='card-subtitle mb-2 text-body-secondary project-stack'>".$proj_stack."</h6>
<p class='card-text'>".$proj_desc."</p>
<a href='".$proj_location."' class='card-link'>More Info</a>
</div>
</div></div>";

echo $pastProject;

}
}




?>
