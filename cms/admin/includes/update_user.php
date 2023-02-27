<?php

if(isset($_GET['u_id'])){
    $user_id=$_GET['u_id'];
}

$query="SELECT * FROM users WHERE user_id={$user_id}";
                                $select_users_by_id = mysqli_query($connection, $query);
 
                                   
                                while($row=mysqli_fetch_assoc($select_users_by_id)){
                                $user_id=$row['user_id'];
                                    $user_name=$row['user_name'];
                                    $user_firstname=$row['user_firstname'];
                                    $user_lastname=$row['user_lastname'];
                                    $user_password=$row['user_password'];
                                    $user_email=$row['user_email'];
                                    $user_image=$row['user_image'];
                                    $user_role=$row['user_role'];
                                    $user_creation_date=date('d-m-y');
            

                                }

if(isset($_POST['submit'])){
                                

    
     $user_name=$_POST['username'];
                                    $user_firstname=$_POST['firstname'];
                                    $user_lastname=$_POST['lastname'];
                                    $user_password=$_POST['password'];
                                    $user_email=$_POST['email'];
                                    $user_role=$_POST['user_role'];
                                    $user_creation_date=date('d-m-y');
    
    
        $query="UPDATE users SET ";
    $query .="user_name= '{$user_name}', ";
    $query .="user_password='{$user_password}', ";
    $query .="user_firstname='{$user_firstname}', ";
    $query .="user_lastname='{$user_lastname}', ";
    $query .="user_email='{$user_email}', ";
    $query .="user_role='{$user_role}' ";
    $query .="WHERE user_id='$user_id'";

    
    $updateQuery=mysqli_query($connection,$query);
    
    confirmQuery($updateQuery);
    
    
    header("Location: users.php");
    

    }


?>


                                     <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" value="<?php echo $user_name; ?>">
    </div>
    
    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" value="<?php echo $user_password; ?>">
    </div>
    
    <div class="form-group">
    <label for="User_role">Select User Role</label>
    <select name="user_role" id="role_select">
        <option value=""><?php echo $user_role; ?></option>
        
        <?php 
        
        if($user_id=="Admin"){
            echo "<option value='Subscriber'>Subscriber</option>";
        }
        else{
            echo "<option value='Admin'>Admin</option>";
        }
        
        ?>
        

        
        
    </select>
    </div>

    <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" name="firstname" value="<?php echo $user_firstname; ?>">
    </div>

    <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" name="lastname" value="<?php echo $user_lastname; ?>">
    </div>

    <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo $user_email; ?>">
    </div>
    
    <div class="form-group">
     <input type="submit" class="btn btn-primary" name="submit" value="Update Post">
    </div>
</form>
