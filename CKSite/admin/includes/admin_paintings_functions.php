<?php 

function adminDisplayAllPaintings($connection){
    $query="SELECT * FROM paintings";
    $select_all_projects_query=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_all_projects_query)){
        $paint_id=$row['paint_id'];
        $paint_title=$row['paint_title'];
        $paint_media_id=$row['paint_media_id'];
        $is_blacklight=$row['is_blacklight'];
        $paint_year=$row['paint_year'];
        $paint_material=$row['paint_material'];
        $paint_status=$row['paint_status'];
        $paint_image=$row['paint_image'];
        $paint_tags=$row['paint_tags'];
        
    
    
        
        echo "<tr><td scope='row'>{$paint_id}</td>";
        echo "<td scope='row'>{$paint_title}</td>";
        echo "<td scope='row'>{$paint_media_id}</td>";
        echo "<td scope='row'>{$is_blacklight}</td>";
        echo "<td scope='row'>{$paint_year}</td>";
        echo "<td scope='row'>{$paint_material}</td>";
        echo "<td scope='row' style='width:200px'>{$paint_status}</td>";
        echo "<td scope='row'>{$paint_image}</td>";
        echo "<td scope='row'>{$paint_tags}</td>";
        echo "<td scope='row'><a class='db-link' href='gallery_functions/edit_painting.php?p_id=".$paint_id."'>edit</a></td>";
        echo "<td scope='row'><a class='db-link' href='gallery_functions/deleteFromPaintings.php?p_id=".$paint_id."'>delete</a></td></tr>";
        
    
    
    }

}

?>