<?php 

function adminDisplayAllProjects($connection){
    $query="SELECT * FROM projects";
    $select_all_projects_query=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_all_projects_query)){
        $proj_id=$row['proj_id'];
        $proj_name=$row['proj_name'];
        $proj_status=$row['proj_status'];
        $proj_location=$row['proj_location'];
        $proj_image=$row['proj_image'];
        $proj_stack=$row['proj_stack'];
        $proj_desc=$row['proj_desc'];
        $proj_date=$row['proj_date'];
        
    
    
        
        echo "<tr><td scope='row'>{$proj_id}</td>";
        echo "<td scope='row'>{$proj_name}</td>";
        echo "<td scope='row'>{$proj_status}</td>";
        echo "<td scope='row'>{$proj_location}</td>";
        echo "<td scope='row'>{$proj_image}</td>";
        echo "<td scope='row'>{$proj_stack}</td>";
        echo "<td scope='row' style='width:200px'>{$proj_desc}</td>";
        echo "<td scope='row'>{$proj_date}</td>";
        echo "<td scope='row'><a class='db-link' href='projects/edit_project.php?p_id=".$proj_id."'>edit</a></td>";
        echo "<td scope='row'><a class='db-link' href='projects/deleteFromProjects.php?p_id=".$proj_id."'>delete</a></td></tr>";
        
    
    
    }

}

?>