 <table class="table table-bordered table-hover ">
                               <thead>
                                   <tr>
                                       <th>Comment id</th>
                                       
                                       <th>Commment Post ID</th>
                                       <th>Author</th>
                                       <th>Email</th>
                                       <th>Comment</th>
                                       <th>Re: Post</th>
                                       <th>Date</th>
                                       <th>Status</th>
                                       <th>Approve</th>
                                       <th>Disapprove</th>
                                       <th>Delete</th>
                                    
                                       
                                   </tr>
                               </thead>
                               <tbody class="table table-bordered table-hover ">
                               
                                  
                                  
                                 <?php 
                                   
                                   $query="SELECT * FROM comments";
                                $select_comments = mysqli_query($connection, $query);
 
                                   
                                while($row=mysqli_fetch_assoc($select_comments)){
                                    $comment_id=$row['comment_id'];
                                    $comment_post_id=$row['comment_post_id'];
                                    $comment_author=$row['comment_author'];
                                    
                                    $comment_email=$row['comment_email'];
                                    $comment_content=$row['comment_content'];
                                    $comment_status=$row['comment_status'];
                                    $comment_date=$row['comment_date'];
                                    echo "<tr>";
                                    echo "<td>{$comment_id}</td>";
                                    echo "<td>{$comment_post_id}</td>";
                                    echo "<td>{$comment_author}</td>";
                                     echo "<td>{$comment_email}</td>";
                                     echo "<td>{$comment_content}</td>";
                                    
                                    $query="SELECT * FROM posts WHERE post_id={$comment_post_id}";
                                    
                                    $select_title_query=mysqli_query($connection, $query);
                                    
                                    while($row=mysqli_fetch_assoc($select_title_query)){
                                        $post_id=$row['post_id'];
                                $post_title=$row['post_title'];
                                    
                                        echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                                    
                                }
                                    
                                     
                                    echo "<td>{$comment_date}</td>";
                                    echo "<td>{$comment_status}</td>";
                                    
                                    
                                    
//                                    $query="SELECT * FROM categories WHERE cat_id={$post_cat_id}";
//                                $select_categories_id = mysqli_query($connection, $query);
// 
//                                   
//                                while($row=mysqli_fetch_assoc($select_categories_id)){
//                                    $cat_id=$row['cat_id'];
//                                $cat_title=$row['cat_title'];
//                                    
//                                    echo "<td>{$cat_title}</td>";
//                                }
                                    
                                    
                                    
                             
                                    echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
                                    echo "<td><a href='comments.php?disapprove={$comment_id}'>Disapprove</a></td>";
                                    echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
                                    echo "</tr>";
                                   
                                    
                                }
                                   
                                   
                                   ?>

                           </tbody>
                           </table>
                           
<?php

if(isset($_GET['delete'])){
    
    $comment_id=$_GET['delete'];
                                    
                                    $query="DELETE FROM comments WHERE comment_id={$comment_id}";
                                    
                                    $delete_query=mysqli_query($connection,$query);
                                    
                                    confirmQuery($delete_query);
                                    
                                    header("Location: comments.php");
}


if(isset($_GET['approve'])){
    
    $comment_id=$_GET['approve'];
    
$query="UPDATE comments SET comment_status ='Approved' WHERE comment_id={$comment_id}";
    
    $update_query=mysqli_query($connection,$query);
                                    
                                    confirmQuery($update_query);
    
    header("Location: comments.php");
    
}

if(isset($_GET['disapprove'])){
    
    $comment_id=$_GET['disapprove'];
    
$query="UPDATE comments SET comment_status ='Disapproved' WHERE comment_id={$comment_id}";
    
    $update_query=mysqli_query($connection,$query);
                                    
                                    confirmQuery($update_query);
    
    header("Location: comments.php");
    
}




?>