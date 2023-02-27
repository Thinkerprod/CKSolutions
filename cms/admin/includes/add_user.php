<?php

if(isset($_POST['create_user'])){
                               $username=$_POST['username'];

                               $first_name=$_POST['first_name'];
                               $user_date=date('d-m-y');
                               $password=$_POST['Password'];
                               // $user_image=$_FILES['user_image']['name'];
                               // $user_image_temp=$_FILES['user_image']['tmp_name'];

                               $last_name=$_POST['last_name'];
                               $user_role=$_POST['user_role'];
                               $user_email=$_POST['user_email'];
                                   
    
//                move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query="INSERT INTO users(user_name, user_password, user_firstname, user_lastname, 
     user_role, user_email)";
    
    $query .="VALUES('{$username}','{$password}','{$first_name}','{$last_name}','{$user_role}','{$user_email}')";
    
    
    $add_user_query=mysqli_query($connection, $query);
    
    confirmQuery($add_user_query);
    
}



?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" name="Password">
    </div>

    <div class="form-group">
        <select name="user_role" id="">
            <option value="null">Select Option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" name="first_name">
    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="last_name">
    </div>

    <!--
    <div class="form-group">
    <label for="user_image">Avatar</label>
    <input type="file" name="user_image">
    </div>
-->

    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <!--
    <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea type="text" class="form-control" cols="30" rows="10" name="post_content">
        </textarea>
    </div>
-->

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Submit">
    </div>
</form>
