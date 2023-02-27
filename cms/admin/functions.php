<?php
function confirmQuery($result){
    global $connection;

    if(!$result){
        die('Query Failed '. mysqli_error($connection));
    }
}

function insert_categories(){
    global $connection;
     if(isset($_POST['submit'])){
                                    $cat_title=$_POST['cat_title'];
                                    
                                    if($cat_title==""|| empty($cat_title)){
                                        echo "Field is empty";
                                    
                                    }
                                    else{
                                        $query="INSERT INTO categories(cat_title) ";
                                        $query .="VALUE('{$cat_title}')";
                                        
                                        $create_category_query = mysqli_query($connection,$query);
                                        
                                        if(!$create_category_query){
                                            die('Query Failed '.mysqli_error($connection));
                                        }
                                    }
                                }
    
    
    
}


function select_category_loop() {
    global $connection;
    $query="SELECT * FROM categories";
                                $select_cat = mysqli_query($connection, $query);
 
                                   
                                while($row=mysqli_fetch_assoc($select_cat)){
                                    $cat_id=$row['cat_id'];
                                $cat_title=$row['cat_title'];
                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                echo "<td>{$cat_title}</td>";
                                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                    echo "</tr>";
                                }
    
}


function delete_query(){
    global $connection;
    if(isset($_GET['delete'])){
                                    
                                    $cat_id=$_GET['delete'];
                                    
                                    $query="DELETE FROM categories 
                                    WHERE cat_id={$cat_id}";
                                    
                                    $delete_query=mysqli_query($connection, $query);
                                    header("Location: categories.php");
                                    
                                }   
}

//function calculate_comments($post_id){
//    global $connection;
//    $counter=0;
//    
//    $query="SELECT comment_post_id FROM comments";
//    $select_comment_id = mysqli_query($connection, $query);
//
//    while($row=mysqli_fetch_assoc($select_comment_id)){
//        
//        $comment_post_id=$row['comment_post_id'];
//        
//        if($comment_post_id == $post_id) {
//
//            $counter++;
//            
//        }
//        
//        return $counter;
//    }
//
//    
//}


?>