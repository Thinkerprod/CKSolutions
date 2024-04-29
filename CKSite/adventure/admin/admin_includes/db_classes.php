<?php 
include_once "../php_util/db.php";
//posts
//create

//read
// $post_read_stmt=$connection->prepare("SELECT * FROM posts WHERE id=");



function read_All_Posts($connection){

$table="<table class='table'>
<thead>
    <tr>
        <th scope='col'>post_id</th>
        <th scope='col'>post_title</th>
        <th scope='col'>post_date</th>
        <th scope='col'>post_image</th>
        <th scope='col'>post_content</th>
        <th scope='col'>post_category_id</th>
        <th scope='col'>post_comment_count</th>
        <th scope='col'>post_published</th>
    </tr>
</thead>
<tbody>";

    $sql_read_all_posts="SELECT * FROM posts";
    $result=mysqli_query($connection,$sql_read_all_posts);
   if(confirmQuery($result)){
    while($row=mysqli_fetch_assoc($result)){
$post_id=$row['post_id'];       
$post_title=$row['post_title'];

$post_date=$row['post_date'];
$post_content=$row['post_content'];
$post_image=$row['post_image'];
$post_category_id=$row['post_category_id'];
$post_comment_count=$row['post_comment_count'];
$post_published=$row['post_published'];
$truncated_content=substr($post_content,0,50)."...";
$table.="<tr>
<td>{$post_id}</td>
<td>{$post_title}</td>
<td>{$post_date}</td>
<td>{$post_image}</td>
<td>{$truncated_content}</td>
<td>{$post_category_id}</td>
<td>{$post_comment_count}</td>
<td>{$post_published}</td>
<td><a class='text-uppercase' href='admin-index.php?src=edit&p_id=".$post_id."'>Edit</a></td>
<td><a class='text-uppercase' href='admin-index.php?src=read&p_id=".$post_id."'>Read</a></td>
<td><a class='text-uppercase' href='blog_actions/delete-post.php?p_id=".$post_id."'>Delete</a></td>
</tr>";

    }

    $table.="</tbody>
    </table>";

    echo $table;
   }
}

function select_post_id($connection,$id){
    $sql_read_all_posts="SELECT * FROM posts WHERE post_id=".$id;
    $result=mysqli_query($connection,$sql_read_all_posts);
return $result;

}



function read_All_Comments($connection){

    $table="<table class='table'>
    <thead>
        <tr>
            <th scope='col'>com_id</th>
            <th scope='col'>is_reply</th>
            <th scope='col'>parent_id</th>
            <th scope='col'>reply_count</th>
            <th scope='col'>com_post_id</th>
            <th scope='col'>com_cw_id</th>
            <th scope='col'>is_cw</th>
            <th scope='col'>com_name</th>
            <th scope='col'>com_date</th>
            <th scope='col'>com_content</th>
            <th scope='col'>com_published</th>
        </tr>
    </thead>
    <tbody>";
    
        $sql_read_all_comments="SELECT * FROM comments";
        $result=mysqli_query($connection,$sql_read_all_comments);
       if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
    $com_id=$row['com_id'];       
    $is_reply=$row['is_reply'];
    $parent_id=$row['parent_id'];
    $reply_count=$row['reply_count'];
    $com_post_id=$row['com_post_id'];
    $com_cw_id=$row['com_cw_id'];
    $is_cw=$row['is_cw'];
    $com_name=$row['com_name'];
    $com_date=$row['com_date'];
    $com_content=$row['com_content'];
    $com_published=$row['com_published'];
    
    $table.="<tr>
    <td>{$com_id}</td>
    <td>{$is_reply}</td>
    <td>{$parent_id}</td>
    <td>{$reply_count}</td>
    <td>{$com_post_id}</td>
    <td>{$com_cw_id}</td>
    <td>{$is_cw}</td>
    <td>{$com_name}</td>
    <td>{$com_date}</td>
    <td>{$com_content}</td>
    <td>{$com_published}</td>
    <td><a class='text-uppercase' href='admin-index.php?src=pub&com_id='".$com_id."></a>Publish</td>
    <td><a class='text-uppercase' href='admin-index.php?src=read&com_id='".$com_id."></a>Reply</td>
    <td><a class='text-uppercase' href='admin-index.php?src=del&com_id='".$com_id."></a>Delete</td>
    </tr>";
    
        }
    
        $table.="</tbody>
        </table>";
    
        echo $table;
       }
    }

function category_Select($connection){

    $select_menu="<select class='form-select' name='catSelect' aria-label='Select Menu'>";

    $cat_query="SELECT * FROM categories";
    $result=mysqli_query($connection,$cat_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];

            $select_menu.="<option value='{$cat_id}' aria-label='{$cat_title}'>{$cat_title}</option>";


        }
        $select_menu.="</select>";
        echo $select_menu;
    }
}
function category_Selected($connection,$post_cat_id){

    $select_menu="<select class='form-select' name='catSelect' aria-label='Select Menu'>";

    $cat_query="SELECT * FROM categories";
    $result=mysqli_query($connection,$cat_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];

            if($cat_id==$post_cat_id){
                $select_menu.="<option selected value='{$cat_id}' aria-label='{$cat_title}'>{$cat_title}</option>";
            }
            else{
                $select_menu.="<option value='{$cat_id}' aria-label='{$cat_title}'>{$cat_title}</option>";
            }

            


        }
        $select_menu.="</select>";
        echo $select_menu;
    }
}
function read_All_Categories($connection){

    $table="<table class='table table-striped'>
    <thead>
        <tr>
            <td scope='col'>cat_id</td>
            <td scope='col'>cat_title</td>
        </tr>
    </thead>
    <tbody>";

    $cat_query="SELECT * FROM categories";
    $result=mysqli_query($connection,$cat_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];

            $table.="<tr>
            <td>{$cat_id}</td>
            <td>{$cat_title}</td>
            <td><a href='blog_actions/delete-category.php?cat_id={$cat_id}' class='text-uppercase'>Delete</a></td>
            </tr>";


        }
        $table.="</tbody></table>";
        echo $table;
    }
}

function read_All_Images($connection){

    $table="<table class='table table-striped'>
    <thead>
        <tr>
            <td scope='col'>img_id</td>
            <td scope='col'>img_file</td>

        </tr>
    </thead>
    <tbody>";

    $image_query="SELECT * FROM post_images";
    $result=mysqli_query($connection,$image_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $img_id=$row['img_id'];
            $img_file=$row['img_file'];
            $is_cover=$row['is_cover'];

            $table.="<tr>
            <td>{$img_id}</td>
            <td>{$img_file}</td>
            
            <td><a href='admin-index.php?src=delimg&id={$img_id}' class='text-uppercase'>Delete</a></td>
            </tr>";


        }
        $table.="</tbody></table>";
        echo $table;
    }
}


function read_All_Tags($connection){

    $table="<table class='table table-striped'>
    <thead>
        <tr>
            <td scope='col'>tag_id</td>
            <td scope='col'>tag_name</td>
        </tr>
    </thead>
    <tbody>";

    $tag_query="SELECT * FROM post_tags";
    $result=mysqli_query($connection,$tag_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $tag_id=$row['tag_id'];
            $tag_name=$row['tag_name'];

            $table.="<tr>
            <td>{$tag_id}</td>
            <td>{$tag_name}</td>
            <td><a href='blog_actions/delete-tag.php?t_id={$tag_id}' class='text-uppercase'>Delete</a></td>
            </tr>";


        }
        $table.="</tbody></table>";
        echo $table;
    }
}

function tags_Checkbox($connection){
    $input_check="";
    $tag_query="SELECT * FROM post_tags";
    $result=mysqli_query($connection,$tag_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $tag_id = $row['tag_id'];
            $tag_name = $row['tag_name'];

            $input_check.="<div class='form-check col-md-4'><label class='form-check-label' for='".$tag_id."-check'>{$tag_name}</label>
            <input class='form-check-input' type='checkbox' name='".$tag_id."-check' ></div>";

        }

        echo $input_check;
    }
}

function tags_Checkbox_Checked($connection,$post_id){
    error_reporting(E_ALL);
    $input_check="";
    $tags_checked_sql="SELECT * FROM post_tags_ids WHERE tag_post_id=".$post_id;
    $tag_query="SELECT * FROM post_tags";
    
    $result=mysqli_query($connection,$tag_query);
    if(confirmQuery($result)){
        
        while($row=mysqli_fetch_assoc($result)){
            $tag_id = $row['tag_id'];
            $tag_name = $row['tag_name'];
            // echo $tag_id;
            // if(confirmQuery($checked_result)){
                
                $checked_result=mysqli_query($connection,$tags_checked_sql);
                // echo "afaega";
                // var_dump($checked_result);
                if($checked_result->num_rows>0){
                while($checked_row=mysqli_fetch_assoc($checked_result)){
                    // var_dump($checked_row['tag_id']);
                    // echo $checked_row."here";
                    if(!is_null($checked_row['tag_id'])){
                        // var_dump($checked_row['tag_id']);
                        $checked_tag_id = $checked_row['tag_id'];
                        // $checked_tag_name = $checked_row['tag_name'];

                        if($checked_tag_id==$tag_id){
                            $input_check.="<div class='form-check col-md-4'><label class='form-check-label' for='".$checked_tag_id."-check'>{$tag_name}</label>
                            <input class='form-check-input' type='checkbox' name='".$checked_tag_id."-check'  checked></div>";
                        }
                        else{
                            $input_check.="<div class='form-check col-md-4'><label class='form-check-label' for='".$tag_id."-check'>{$tag_name}</label>
                            <input class='form-check-input' type='checkbox' name='".$tag_id."-check' ></div>";
                        }
                    }

                    else{
                        echo "something";
                        $input_check.="<div class='form-check col-md-4'><label class='form-check-label' for='".$tag_id."-check'>{$tag_name}</label>
                        <input class='form-check-input' type='checkbox' name='".$tag_id."-check' ></div>";
                        echo $tag_id;
                    }
                    
                    // $checked_tag_name = $row['tag_name'];

                }
            }

            // }

            else{
                $input_check.="<div class='form-check col-md-4'><label class='form-check-label' for='".$tag_id."-check'>{$tag_name}</label>
                <input class='form-check-input' type='checkbox' name='".$tag_id."-check' id='".$tag_name."-check'></div>";
            }


        }
        // echo $tag_id;
        echo $input_check;
    }
}

//Creative Writing Functions
function read_All_CW($connection){

    $table="<table class='table'>
    <thead>
        <tr>
            <th scope='col'>cw_id</th>
            <th scope='col'>cw_title</th>
            <th scope='col'>cw_genre_id</th>
            <th scope='col'>cw_date</th>
            <th scope='col'>cw_path</th>           
            <th scope='col'>cw_comment_count</th>
            <th scope='col'>cw_published</th>
        </tr>
    </thead>
    <tbody>";
    
        $sql_read_all_cw="SELECT * FROM cw";
        $result=mysqli_query($connection,$sql_read_all_cw);
       if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
    $cw_id=$row['cw_id'];       
    $cw_title=$row['cw_title'];
    $cw_genre_id=$row['cw_genre_id'];
    $cw_date=$row['cw_date'];
    $cw_path=$row['post_content'];
    
    $cw_comment_count=$row['cw_comment_count'];
    $cw_published=$row['cw_published'];
    
    $table.="<tr>
    <td>{$cw_id}</td>
    <td>{$cw_title}</td>
    <td>{$cw_genre_id}</td>
    <td>{$cw_date}</td>
    <td>{$cw_path}</td>
    <td>{$cw_comment_count}</td>
    <td>{$cw_published}</td>
    <td><a class='text-uppercase' href='admin-index.php?src=edit&p_id='".$cw_id."></a>Edit</td>
    <td><a class='text-uppercase' href='admin-index.php?src=read&p_id='".$cw_id."></a>Read</td>
    <td><a class='text-uppercase' href='admin-index.php?src=del&p_id='".$cw_id."></a>Delete</td>
    </tr>";
    
        }
    
        $table.="</tbody>
        </table>";
    
        echo $table;
       }
    }

function read_All_CW_Tags($connection){

    $table="<table class='table table-striped'>
    <thead>
        <tr>
            <td scope='col'>tag_id</td>
            <td scope='col'>tag_name</td>
        </tr>
    </thead>
    <tbody>";

    $tag_query="SELECT * FROM cw_tags";
    $result=mysqli_query($connection,$tag_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $tag_id=$row['tag_id'];
            $tag_name=$row['tag_name'];

            $table.="<tr>
            <td>{$tag_id}</td>
            <td>{$tag_name}</td>
            <td><a href='blog_actions/delete-cw-tag.php?t_id={$tag_id}' class='text-uppercase'>Delete</a></td>
            </tr>";


        }
        $table.="</tbody></table>";
        echo $table;

        echo "<form action='blog_actions/add-cw-tags.php' method='post'>
        <div class='input-group mb-3'>
                        <input type='text' name='cw_tag_input' class='form-control' placeholder='Add CW Tag' aria-label='add cw tags form'>
                        <button type='submit' class='btn btn-primary' name='submitBtn'>Submit</button>
                    </div>
        </form>";
    }
}

function tags_CW_Checkbox($connection){
    $input_check="";
    $tag_query="SELECT * FROM cw_tags";
    $result=mysqli_query($connection,$tag_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $tag_id = $row['tag_id'];
            $tag_name = $row['tag_name'];

            $input_check.="<div class='form-check col-md-4'><label class='form-check-label' for='".$tag_id."-check'>{$tag_name}</label>
            <input class='form-check-input' type='checkbox' name='".$tag_id."-check' id='".$tag_name."-check'></div>";

        }

        echo $input_check;
    }
}

function read_All_Genres($connection){

    $table="<table class='table table-striped'>
    <thead>
        <tr>
            <td scope='col'>genre_id</td>
            <td scope='col'>genre_name</td>
        </tr>
    </thead>
    <tbody>";

    $genre_query="SELECT * FROM genre";
    $result=mysqli_query($connection,$genre_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $genre_id=$row['genre_id'];
            $genre_name=$row['genre_name'];

            $table.="<tr>
            <td>{$genre_id}</td>
            <td>{$genre_name}</td>
            <td><a href='blog_actions/delete-genre.php?g_id={$genre_id}' class='text-uppercase'>Delete</a></td>
            </tr>";


        }
        $table.="</tbody></table>";
        echo $table;
    }
}

function genre_Select($connection){

    $select_menu="<select name='genreSelect' class='form-select' aria-label='Select Menu'>";

    $cat_query="SELECT * FROM genre";
    $result=mysqli_query($connection,$cat_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $genre_id=$row['genre_id'];
            $genre_name=$row['genre_name'];

            $select_menu.="<option value='{$genre_id}' aria-label='{$genre_name}'>{$genre_name}</option>";


        }
        $select_menu.="</select>";
        echo $select_menu;
    }
}

//Gallery Functions
function read_All_Gallery($connection){

    $table="<table class='table'>
    <thead>
        <tr>
            <th scope='col'>gallery_id</th>
            <th scope='col'>gallery_title</th>
            <th scope='col'>gallery_media_id</th>
            <th scope='col'>is_blacklight</th>
            <th scope='col'>gallery_year</th>
            <th scope='col'>gallery_material_id</th>
            <th scope='col'>gallery_image</th>           
        </tr>
    </thead>
    <tbody>";
    
        $sql_read_all_gallery="SELECT * FROM gallery";
        $result=mysqli_query($connection,$sql_read_all_gallery);
       if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
    $gallery_id=$row['gallery_id'];       
    $gallery_title=$row['gallery_title'];
    $gallery_media_id=$row['gallery_media_id'];
    $is_blacklight=$row['is_blacklight'];
    $gallery_year=$row['gallery_year'];
    $gallery_material_id=$row['gallery_material_id'];
    $gallery_image=$row['gallery_image'];

    
    $table.="<tr>
    <td>{$gallery_id}</td>
    <td>{$gallery_title}</td>
    <td>{$gallery_media_id}</td>
    <td>{$is_blacklight}</td>
    <td>{$gallery_year}</td>
    <td>{$gallery_material_id}</td>
    <td>{$gallery_image}</td>
    <td><a class='text-uppercase' href='admin-index.php?src=edit&p_id='".$gallery_id."></a>Edit</td>
    <td><a class='text-uppercase' href='admin-index.php?src=del&p_id='".$gallery_id."></a>Delete</td>
    </tr>";
    
        }
    
        $table.="</tbody>
        </table>";
    
        echo $table;
       }
    }


    function read_All_Media($connection){

        $table="<table class='table table-striped'>
        <thead>
            <tr>
                <td scope='col'>media_id</td>
                <td scope='col'>media_name</td>
            </tr>
        </thead>
        <tbody>";
    
        $media_query="SELECT * FROM media";
        $result=mysqli_query($connection,$media_query);
        if(confirmQuery($result)){
            while($row=mysqli_fetch_assoc($result)){
                $media_id=$row['media_id'];
                $media_type=$row['media_type'];
    
                $table.="<tr>
                <td>{$media_id}</td>
                <td>{$media_type}</td>
                <td><a href='blog_actions/delete-media.php?m_id={$media_id}' class='text-uppercase'>Delete</a></td>
                </tr>";
    
    
            }
            $table.="</tbody></table>";
            echo $table;
        }
    }

function media_Select($connection){
    $select_menu="<select name='media_select' class='form-select' aria-label='Select Menu'>";

    $cat_query="SELECT * FROM media";
    $result=mysqli_query($connection,$cat_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $media_id=$row['media_id'];
            $media_type=$row['media_type'];

            $select_menu.="<option value='{$media_id}' aria-label='{$media_type}'>{$media_type}</option>";


        }
        $select_menu.="</select>";
        echo $select_menu;
    }
}

function material_Select($connection){
    $select_menu="<select name='material_select' class='form-select' aria-label='Select Menu'>";

    $cat_query="SELECT * FROM material";
    $result=mysqli_query($connection,$cat_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $mat_id=$row['mat_id'];
            $mat_type=$row['mat_type'];

            $select_menu.="<option value='{$mat_id}' aria-label='{$mat_id}'>{$mat_type}</option>";


        }
        $select_menu.="</select>";
        echo $select_menu;
    }
}


?>






