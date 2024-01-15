<?php 


// READ

function readAllBusinessPosts($connection){
    $query="SELECT * FROM posts WHERE post_category_id = 1 AND post_status='published' ";
    $select_all_business_posts_query=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_all_business_posts_query)){
    $post_id=$row['post_id'];
    $post_cat_id=$row['post_category_id'];
    $post_title=$row['post_title'];
    $post_author=$row['post_author'];
    $post_date=$row['post_date'];
    $post_image=$row['post_image'];
    $post_content=$row['post_content'];
    $post_tags=$row['post_tags'];
    $post_comment_count=$row['post_comment_count'];
    $post_status=$row['post_status'];

   echo "<div class='blog-entry my-3' id='blogPost'>
    <h2>{$post_title}</h2>
    <h3>by $post_author</h3>
    <small>created on $post_date</small>

    <img class='post-image' src='images/blogImages/".$post_image."' alt=''>
    <p class='post-content' id='post-text'>{$post_content}</p>
        <p class='tags'>{$post_tags}</p>
        <a class='readMore' href='blog-business.php?src=post&p_id=".$post_id."'>Read More</a>
    </div>";



}


}

function readSelectedBlogPost($connection){

    if(isset($_GET['p_id'])){

    $p_id=$_GET['p_id'];

    $query="SELECT * FROM posts WHERE post_category_id = 1 AND post_id=".$p_id;
    $select_business_post_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_business_post_query)){
            $post_id=$row['post_id'];
            $post_cat_id=$row['post_category_id'];
            $post_title=$row['post_title'];
            $post_author=$row['post_author'];
            $post_date=$row['post_date'];
            $post_image=$row['post_image'];
            $post_content=$row['post_content'];
            $post_tags=$row['post_tags'];
            $post_comment_count=$row['post_comment_count'];
            // $post_status=$row['post_status'];

        $selectedPost= "<div class='container-fluid expanded-blog-entry my-3' id='x-blogPost'>

                            <div class='container-fluid d-flex text-center flex-column justify-content-center'>
                            <h2>{$post_title}</h2>
                            <h3>by {$post_author}</h3>
                            <small>created on {$post_date}</small>
                            <small>".$post_comment_count." Comments</small>
                            </div>
        
                            <p class='select-post-content mx-5 my-3 fs-4' id='post-text'>{$post_content}</p>
    
                            <p class='tags text-center'>{$post_tags}</p>";

            if(isset($_GET['parent_id'])){
                $selectedPost.=createReplyForm($connection);
            }
            else{
        $selectedPost.="<div class='d-flex flex-column justify-content-start fs-4 comment-form mx-5'>
        <p class='display-5 my-3 mx-5'>Leave a comment</p>
        <form action='includes/comments.php?src=comment&p_id={$p_id}' method='post' enctype='multipart/form-data'>

        <div class='row g-1 mb-3'>
        <div class='col-sm-4'>
        <label for='input-name' class='form-label'>Name</label>
        
        <input type='text' name='name' id='input-name' class='form-control'>
        </div>
        </div>

        
        <div class='row g-1 mb-3'>
        <div class='col-sm-6'>
        <label for='input-comment' class='form-label'>Comment</label>
        <textarea name='comment' class='form-control' id='input-comment' cols='30' rows='10'></textarea>
        </div>
        </div>
        
        <div class='row'>
        <div class='col-sm-md-4'>
        <input type='submit'  name='btn-submit' class='btn btn-primary' value='Submit'>
        </div>
        </div>
        
        </form>
        <p class='h5 my-3'>All Comments Are Subject To Review</p>
    </div>";}
    $selectedPost.="
    <div class='display-5 text-center comments my-3 '>Comments</div>
    <div class='container-fluid d-flex flex-column text-left comments my-3 mx-5'>";
    echo $selectedPost;
    readAllComments($connection);
    echo "</div>";
    echo "</div>";

    

    

    }
}
}



function createComment($connection){
    
        $com_post_id=getPostId();
        $com_name=mysqli_real_escape_string($connection, $_POST['name']);
        
        $com_content=mysqli_real_escape_string($connection, $_POST['comment']);
        $com_date=date("Y-m-d H:i:s");
        $com_time=date("Y-m-d H:i:s");

        
    
    
    
        $query="INSERT INTO comments (com_post_id,com_name,com_date,com_time,com_content) 
        VALUES('{$com_post_id}','{$com_name}','{$com_date}','{$com_time}','{$com_content}')";
        $commentQuery=mysqli_query($connection,$query);
        confirmQuery($commentQuery);
        if($commentQuery){
                //increment the comment counter in posts db
        commentCounter($connection);
        header("Location: ../../business/blog-business.php?source=post&p_id={$com_post_id}");
        }
        
    
    
}

function readAllComments($connection){
    if(isset($_GET['p_id'])){

        $p_id=$_GET['p_id'];

    }
    $query="SELECT * FROM comments WHERE com_post_id =".$p_id." AND com_status='Approved' AND is_reply=0";
        $business_comments_query=mysqli_query($connection,$query);

        
        

        while($row=mysqli_fetch_assoc($business_comments_query)){
            $com_id=$row['com_id'];
            $is_reply=$row['is_reply'];
            $parent_id=$row['parent_id'];
            $reply_count=$row['reply_count'];

            // $com_post_id=$row['com_post_id'];
            $com_name=$row['com_name'];
            $com_date=$row['com_date'];
            $com_time=$row['com_time'];
            $com_content=$row['com_content'];
            // $com_status=$row['com_status'];

            
            
            $formatted_date=date_format(date_create($com_date), "D j M Y");
            $formatted_time=date_format(date_create($com_time), "h:i a");
                // date_create($com_time)

                //create html comment string
                $comment= "<p class='fs-5 lh-1'>{$com_name}</p>
                <p class='fs-6 lh-1'>Submitted {$formatted_date} at {$formatted_time}</p>
                <p class='fs-5 lh-sm text-left'>{$com_content}</p>
                <p class='fs-6 lh-1'>{$reply_count} replies</p>
                 <div class='d-flex text-end my-1'>
                <a href='blog-business.php?src=post&p_id=".$p_id."&parent_id=".$com_id."#reply-form'>reply</a>
                <a class='mx-2' href='includes/comments.php?src='delComment'&del_id=".$com_id."'>delete</a>
                </div>";

                //if comment has no replies, render
                if($reply_count==0){
                echo $comment;
                }

                else{
                    $threads=reply_sorter($connection,$p_id,$com_id);
                    $comment.=$threads;
                    echo $comment;
                }
                

            
        }
    

}



function reply_sorter($connection,$post_id,$com_id){


    
    //create comment array
    // $reply_array=array();
    // $threaded_replies=array();
    // $count_thread_layers=0;
    $new_thread="<div class='d-flex flex-column comments thread mx-1 my-3'>";
    $close_thread="</div>";
    
    $query="SELECT * FROM comments WHERE is_reply=1 AND com_post_id=".$post_id." AND com_status='Approved'";
    $get_all_replies=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($get_all_replies)){
        $reply_com_id=$row['com_id'];
        $parent_id=$row['parent_id'];
        $reply_count=$row['reply_count'];
        $com_name=$row['com_name'];
        $com_date=$row['com_date'];
        $com_time=$row['com_time'];
        $com_content=$row['com_content'];
        $parent_id=$row['com_date'];

        $formatted_date=date_format(date_create($com_date), "D j M Y");
        $formatted_time=date_format(date_create($com_time), "h:i a");


            //create reply rendered string
            $reply="
    <p class='fs-5 lh-1'>{$com_name}</p>
    <p class='fs-6 lh-1'>Submitted {$formatted_date} at {$formatted_time}</p>
    <p class='fs-5 lh-sm text-left'>{$com_content}</p>
    <p class='fs-6 lh-1'>{$reply_count} replies</p>
     <div class='d-flex text-end my-1'>
     <a href='blog-business.php?src=post&p_id=".$post_id."&parent_id=".$com_id."#reply-form'>reply</a>
     <a class='mx-2' href='includes/comments.php?src='delComment'&del_id=".$com_id."'>delete</a>
    </div>";


        if($parent_id==$com_id){
            $new_thread.=$reply;

            if($reply_count>0){
                $new_thread.=reply_sorter($connection,$post_id,$reply_com_id);
            }

        }



        

    
    
            // echo "<p class='fs-5 lh-1'>{$com_name}</p>
                        // <p class='fs-6 lh-1'>Submitted {$formatted_date} at {$formatted_time}</p>
                        // <p class='fs-5 lh-sm text-left'>{$com_content}</p>
                        //  <div class='d-flex text-end my-1'>
                        // <a class='mx-1' href='comments.php?source=post&p_id=".$p_id."&reply_id=".$com_id."'>reply</a>
                        // <a class='mx-1' href='includes/comments.php?del_id=".$com_id."'>delete</a>
                        // </div>";
        
    }
    $new_thread.=$close_thread;
    return $new_thread;
    }



function createReplyForm($connection){
    if(isset($_GET['parent_id'])){
        $reply_id=$_GET['parent_id'];
        
    }
    if(isset($_GET['p_id'])){
        $reply_post=$_GET['p_id'];
    
    }


$query="SELECT com_name FROM comments WHERE com_id=".$reply_id;
$comment_query=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($comment_query);
$op_com_name=$row['com_name'];



    $replyForm="<div class='d-flex flex-column justify-content-start fs-4 comment-form mx-5' id='reply-form'>
    <p class='display-6 my-3 mx-5'>Reply to ".$op_com_name."'s comment</p>
    <form action='includes/comments.php?src=reply&op_com_id={$reply_id}&p_id={$reply_post}' method='post' enctype='multipart/form-data'>

    <div class='row g-1 mb-3'>
    <div class='col-sm-4'>
    <label for='input-name' class='form-label'>Name</label>
    
    <input type='text' name='name' id='input-name' class='form-control'>
    </div>
    </div>

    
    <div class='row g-1 mb-3'>
    <div class='col-sm-6'>
    <label for='input-comment' class='form-label'>Comment</label>
    <textarea name='comment' class='form-control' id='input-comment' cols='30' rows='10'>@".$op_com_name."</textarea>
    </div>
    </div>
    
    <div class='row'>
    <div class='col-sm-md-4'>
    <input type='submit'  name='submit-reply' class='btn btn-primary' value='Submit'>
    </div>
    </div>
    
    </form>
</div>";
return $replyForm;

}



function createReply($connection){
if(isset($_POST['submit-reply'])){
    if(isset($_GET['op_com_id'])){
        $op_com_id=$_GET['op_com_id'];
    }

    if(isset($_GET['p_id'])){
        $reply_post=$_GET['p_id'];
    }
    
   $reply_name = $_POST['name'];
  
   $reply_comment = $_POST['comment'];
        

   $reply_date = date('Y-m-d H:i:s');
   $reply_time = date('H:i:s');


    //CREATE REPLY IN COMMENTS TABLE
    $create_comment_query="INSERT INTO comments (is_reply,parent_id,com_post_id,com_name,com_date,com_time,com_content) VALUES(1,'{$op_com_id}','{$reply_post}','{$reply_name}','{$reply_date}','{$reply_time}','{$reply_comment}')";
    $new_comment_reply=mysqli_query($connection,$create_comment_query);
    confirmQuery($new_comment_reply);

    //increment the reply_count for the comment/reply replied to
    reply_counter($connection,$op_com_id);
    commentCounter($connection);
   

    header("Location: ../../business/blog-business.php?source=post&p_id={$reply_post}");

}

}


function reply_counter($connection,$com_id){
    $query="SELECT reply_count FROM comments WHERE com_id=".$com_id;
    $get_reply_count=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($get_reply_count);
    $reply_count=$row['reply_count'];
    $reply_count++;
    $update_query="UPDATE comments SET reply_count=".$reply_count." WHERE com_id=".$com_id;
    $set_reply_count=mysqli_query($connection,$update_query);
    confirmQuery($set_reply_count);
}



function getPostId(){
    if(isset($_GET['p_id'])){
        $p_id=$_GET['p_id'];

        return $p_id;
    }
}

function getComId(){
    if(isset($_GET['com_id'])){
        $com_id=$_GET['com_id'];

        return $com_id;
    }
}

function commentCounter($connection){

    $p_id=getPostId();
    // echo $p_id." id number";
    $query="SELECT post_comment_count FROM posts WHERE post_id =".$p_id;
    $business_comment_counter_query=mysqli_query($connection,$query);
    
    $row=mysqli_fetch_assoc($business_comment_counter_query);
        $post_comment_counter=$row['post_comment_count'];
        $post_comment_counter++;

        $update_query="UPDATE posts SET post_comment_count='{$post_comment_counter}' WHERE post_id='{$p_id}'";
        $comment_update_query=mysqli_query($connection,$update_query);
        confirmQuery($comment_update_query);
    
}

function deleteComment($connection){
    if(isset($_GET['p_id'])){
        $p_id=$_GET['p_id'];
    }
    if(isset($_GET['del_id'])){
        $del_id=$_GET['del_id'];
    }

    

    $search_query="SELECT reply_count FROM comments WHERE com_id=".$del_id." AND com_post_id=".$p_id;
    $reply_query=mysqli_query($connection,$search_query);
    $row=mysqli_fetch_assoc($reply_query);
    $reply_count=$row['reply_count'];

    if(is_child($connection,$del_id)>0){
        replyCountDecrement($connection,is_child($connection,$del_id),$p_id);
    }

    if($reply_count>0){
        //create array of ids

        
        $comment_with_children=find_children($connection,$del_id,$p_id);


        for($i=0;$i<count($comment_with_children);$i++){

            $array_id=$comment_with_children[$i];

            $del_query="DELETE FROM comments WHERE com_id=".$array_id;
            
            $test_del_query=mysqli_query($connection,$del_query);
          
            confirmQuery($test_del_query);
            commentCounterDecrement($connection,$p_id);
            
        }


        header("Location: comments.php");
        

    }

    else{

        $del_query="DELETE FROM comments WHERE com_id=".$del_id;
        
        $test_del_query=mysqli_query($connection,$del_query);
        
        confirmQuery($test_del_query);
        commentCounterDecrement($connection,$p_id);
        header("Location: comments.php");

    }

    


}

// function deleteReply($connection){
//     if(isset($_GET['p_id'])){
//         $p_id=$_GET['p_id'];
//     }
//     if(isset($_GET['com_id'])){
//         $com_id=$_GET['com_id'];
//     }

    

//     $search_query="SELECT reply_count FROM comments WHERE com_id=".$com_id." AND com_post_id=".$p_id;
//     $reply_query=mysqli_query($connection,$search_query);
//     $row=mysqli_fetch_assoc($reply_query);
//     $reply_count=$row['reply_count'];

    

//     if($reply_count>0){
//         //create array of ids

        
//         $reply_with_children=find_children($connection,$com_id,$p_id);


//         for($i=0;$i<count($reply_with_children);$i++){

//             $array_id=$reply_with_children[$i];

//             $del_query="DELETE FROM comments WHERE com_id=".$array_id;
            
//             $test_del_query=mysqli_query($connection,$del_query);
          
//             confirmQuery($test_del_query);
//             commentCounterDecrement($connection,$p_id);
            
//         }


//         header("Location: comments.php");
        

//     }

//     else{

//         $del_query="DELETE FROM comments WHERE com_id=".$com_id;
        
//         $test_del_query=mysqli_query($connection,$del_query);
        
//         confirmQuery($test_del_query);
//         commentCounterDecrement($connection,$p_id);
//         header("Location: comments.php");

//     }
// }



function replyCountDecrement($connection,$parent_id,$post_id){

    //get parent's reply count
    $search_query="SELECT reply_count FROM comments WHERE post_id=".$post_id." AND com_id=".$parent_id;
    $get_op_reply_count=mysqli_query($connection,$search_query);
    $row=mysqli_fetch_assoc($get_op_reply_count);
    $op_reply_count=$row['reply_count'];

    //if comment has any children find them, count them, and decrement in loop

    // $search_query="SELECT reply_count FROM comments WHERE post_id=".$post_id." AND com_id=".$com_id;
    // $get_reply_count=mysqli_query($connection,$search_query);
    // $row=mysqli_fetch_assoc($get_reply_count);
    // $reply_count=$row['reply_count'];

    // if($op_reply_count>0){
    //     $reply_children_array=findThreadReplies($connection,$parent_id,$post_id);

    //     for($i=0;$i<count($reply_children_array);$i++){
    //         $op_reply_count--;
    //     }

    //     $update_query="UPDATE comments SET reply_count=$op_reply_count WHERE com_id=".$parent_id;
    //     $set_comment_count=mysqli_query($connection,$update_query);
    //     confirmQuery($set_comment_count);
    // }
    
        $op_reply_count--;

        $update_query="UPDATE comments SET reply_count=$op_reply_count WHERE com_id=".$parent_id;
        $set_reply_count=mysqli_query($connection,$update_query);
        confirmQuery($set_reply_count);



}

function commentCounterDecrement($connection,$post_id){

    $search_query="SELECT post_comment_count FROM posts WHERE post_id=".$post_id;
    $get_comment_count=mysqli_query($connection,$search_query);
    $row=mysqli_fetch_assoc($get_comment_count);
    $comment_count=$row['post_comment_count'];
    $comment_count--;

   $update_query="UPDATE posts SET post_comment_count=$comment_count WHERE post_id=".$post_id;
   $set_comment_count=mysqli_query($connection,$update_query);
   confirmQuery($set_comment_count);


}


function find_children($connection,$com_id,$post_id){
    $com_id_array=array($com_id);
    $search_query="SELECT * FROM comments WHERE is_reply=1 AND com_post_id=".$post_id;
    $reply_query=mysqli_query($connection,$search_query);
   while($row=mysqli_fetch_assoc($reply_query)){

    $reply_com_id=$row['com_id'];
    $reply_count=$row['reply_count'];
    $parent_id=$row['parent_id'];

    if($parent_id==$com_id){
        array_push($com_id_array,$reply_com_id);
        if($reply_count>0){

            array_push($com_id_array,find_children($connection,$reply_com_id,$post_id));

        }
 
    }

   } 

   return $com_id_array;


}

function findThreadReplies($connection,$com_id,$post_id){

    $com_id_array=array();
    $search_query="SELECT * FROM comments WHERE is_reply=1 AND com_post_id=".$post_id;
    $reply_query=mysqli_query($connection,$search_query);
   while($row=mysqli_fetch_assoc($reply_query)){
  
    $reply_com_id=$row['com_id'];
    // $reply_count=$row['reply_count'];
    $parent_id=$row['parent_id'];
  
  if($parent_id==$com_id){
    array_push($com_id_array,$reply_com_id);
  }
  
  
   } 
  
   return $com_id_array;
  
  }

  function is_child($connection,$com_id){

    $query="SELECT is_reply FROM comments WHERE com_id=".$com_id;
    $isChild_query=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($isChild_query)){
      
      $is_reply=$row['is_reply'];
      if($is_reply==1){
        $parent_id=$row['parent_id'];
        return $parent_id;
      }
      return $is_reply;
    
    }
    
    
    }


?>
