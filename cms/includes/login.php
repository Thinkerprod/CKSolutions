


<?php



if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    echo "$username and $password";
    
   $query= "SELECT * FROM users WHERE user_name=$username";
    
    
    $select_user = mysqli_query($connection, $query);
 
     if(empty($select_user)){
        echo "Username not found";
        
    }
    else{
        
        
        while($row=mysqli_fetch_assoc($select_user)){
                                    $password_match=$row['user_password'];
                                    
                                    if($password===$password_match){
                                        
                                        echo "You are logged in";
                                    }
                                    else{ echo "password incorrect";}

                                }
    }
                                

}

?>