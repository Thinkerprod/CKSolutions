 <table class="table table-bordered table-hover ">
                               <thead>
                                   <tr>
                                       <th>User id</th>
                                       <th>User name</th>
<!--                                       <th>Password</th>-->
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                       <th>Email</th>
<!--                                       <th>Image</th>-->
                                       <th>Role/Access</th>
<!--                                       <th>Date</th>-->
                                       <th>Change Role</th>
                                       <th>Change Role</th>
                                       <th>Delete</th>
                                       <th>Edit</th>
                                    
                                       
                                   </tr>
                               </thead>
                               <tbody class="table table-bordered table-hover ">
                               
                                  
                                  
                                 <?php 
                                   
                                   $query="SELECT * FROM users";
                                $select_users = mysqli_query($connection, $query);
 
                                   
                                while($row=mysqli_fetch_assoc($select_users)){
                                    $user_id=$row['user_id'];
                                    $user_name=$row['user_name'];
                                    $user_firstname=$row['user_firstname'];
                                    $user_lastname=$row['user_lastname'];
                                    $user_password=$row['user_password'];
                                    $user_email=$row['user_email'];
                                    $user_image=$row['user_image'];
                                    $user_role=$row['user_role'];
                                    $user_creation_date=date('d-m-y');
                                    echo "<tr>";
                                    echo "<td>{$user_id}</td>";
                                    echo "<td>{$user_name}</td>";
//                                    echo "<td>{$user_password}</td>";
                                    echo "<td>{$user_firstname}</td>";
                                    echo "<td>{$user_lastname}</td>";
                                     echo "<td>{$user_email}</td>";
//                                    echo "<td>{$user_image}</td>";
                                    echo "<td>{$user_role}</td>";
//                                     echo "<td>{$user_creation_date}</td>";
                                    
//                                    $query="SELECT * FROM posts WHERE post_id={$comment_post_id}";
//                                    
//                                    $select_title_query=mysqli_query($connection, $query);
//                                    
//                                    while($row=mysqli_fetch_assoc($select_title_query)){
//                                        $post_id=$row['post_id'];
//                                $post_title=$row['post_title'];
//                                    
//                                        echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                                    
                                
                                    
                                     
                                   
                                    
                                    
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
                                    
                                    
                                    
                             
                                    echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                                    echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
                                    echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                                    echo "<td><a href='users.php?source=update_user&u_id={$user_id}'>Edit</a></td>";
                                    echo "</tr>";
                                   
                                    
                                }
                                   
                                   
                                   ?>

                           </tbody>
                           </table>
                           
<?php

if(isset($_GET['delete'])){
    
    $user_id=$_GET['delete'];
                                    
                                    $query="DELETE FROM users WHERE user_id={$user_id}";
                                    
                                    $delete_query=mysqli_query($connection,$query);
                                    
                                    confirmQuery($delete_query);
                                    
                                    header("Location: users.php");
}


if(isset($_GET['change_to_admin'])){
    
    $user_id=$_GET['change_to_admin'];
    
$query="UPDATE users SET user_role ='Admin' WHERE user_id={$user_id}";
    
    $update_query=mysqli_query($connection,$query);
                                    
                                    confirmQuery($update_query);
    
    header("Location: users.php");
    
}

if(isset($_GET['change_to_sub'])){
    
    $user_id=$_GET['change_to_sub'];
    
$query="UPDATE users SET user_role ='Subscriber' WHERE user_id={$user_id}";
    
    $update_query=mysqli_query($connection,$query);
                                    
                                    confirmQuery($update_query);
    
    header("Location: users.php");
    
}






?>