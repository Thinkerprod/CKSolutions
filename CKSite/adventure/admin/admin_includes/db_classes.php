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
            <th scope='col'>cw_type</th>
            <th scope='col'>cw_title</th>
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
    $cw_type=$row['cw_type'];      
    $cw_title=$row['cw_title'];
    $cw_filename=$row['cw_filename'];
    $cw_date=$row['cw_date'];
  
    
    $cw_comment_count=$row['cw_comment_count'];
    $cw_published=$row['cw_published'];
    
    $table.="<tr>
    <td>{$cw_id}</td>
    <td>{$cw_type}</td>
    <td>{$cw_title}</td>
    <td>{$cw_date}</td>
    <td>{$cw_filename}</td>
    <td>{$cw_comment_count}</td>
    <td>{$cw_published}</td>
    <td><a class='text-uppercase' href='admin-index.php?src=edit-cw&cw_id=".$cw_id."'>Edit</a></td>
    <td><a class='text-uppercase' href='admin-index.php?src=read-cw&cw_id=".$cw_id."'>Read</a></td>
    <td><a class='text-uppercase' href='cw_actions/delete-cw.php?cw_id=".$cw_id."'>Delete</a></td>
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

        echo "<form action='cw_actions/add-cw-tags.php' method='post'>
        <div class='input-group mb-3'>
                        <input type='text' name='cw_tag_input' class='form-control' placeholder='Add CW Tag' aria-label='add cw tags form'>
                        <button type='submit' class='btn btn-primary' name='submitBtn'>Submit</button>
                    </div>
        </form>";
    }
}

function create_pages($content){
    $word_count=str_word_count($content);
    $js_string="";

}
function tags_CW_Checkbox($connection){
    $input_check="";
    $tag_query="SELECT * FROM cw_tags";
    $result=mysqli_query($connection,$tag_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $tag_id = $row['tag_id'];
            $tag_name = $row['tag_name'];

            $trimmed_tag_name=str_replace(" ","",$tag_name);

            $input_check.="<div class='form-check'><label class='form-check-label' for='".$trimmed_tag_name."-check'>{$tag_name}</label>
            <input class='form-check-input' type='checkbox' name='{$trimmed_tag_name}' id='".$trimmed_tag_name."-check'></div>";

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

function read_All_Types($connection){

    $table="<table class='table table-striped'>
    <thead>
        <tr>
            <td scope='col'>type_id</td>
            <td scope='col'>type_name</td>
        </tr>
    </thead>
    <tbody>";

    $type_query="SELECT * FROM cw_types";
    $result=mysqli_query($connection,$type_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $type_id=$row['type_id'];
            $type_name=$row['type_name'];

            $table.="<tr>
            <td>{$type_id}</td>
            <td>{$type_name}</td>
            <td><a href='cw_actions/delete-type.php?t_id={$type_id}' class='text-uppercase'>Delete</a></td>
            </tr>";


        }
        $table.="</tbody></table>";
        echo $table;
        echo "<form action='cw_actions/add-type.php' method='post'>
        <div class='input-group mb-3'>
                        <input type='text' name='cw_type_input' class='form-control' placeholder='Add Type' aria-label='add cw tags form'>
                        <button type='submit' class='btn btn-primary' name='submitBtn'>Submit</button>
                    </div>
        </form>";
    }
}

function type_select($connection){
    $type_select="<select name='type_input' class='form-select' aria-label='select type of creative writing'>";
    $type_query="SELECT * FROM cw_types";
    $result=mysqli_query($connection,$type_query);
    while($row=mysqli_fetch_assoc($result)){
        $type_id=$row['type_id'];
        $type_name=$row['type_name'];

        $type_select.="<option value='{$type_id}'>{$type_name}</option>";

    }
    echo $type_select."</select>";
}

function type_selected($connection,$stmt,$cw_id){
    $type_select="<select name='type_input' class='form-select' aria-label='select type of creative writing'>";

    $stmt->bind_param("i",$cw_id);
    $stmt->execute();
    $stmt_result=$stmt->get_result();

    $type_row_id=$stmt_result->fetch_assoc();

    // var_dump($type_row_id[0]);
    // echo $type_row_id['cw_type'];

    $type_query="SELECT * FROM cw_types";
    $result=mysqli_query($connection,$type_query);
    while($row=mysqli_fetch_assoc($result)){
        $type_id=$row['type_id'];
        $type_name=$row['type_name'];

        if($type_row_id['cw_type']==$type_id){
            $selected="selected";
        }
        else{
            $selected="";
        }

        $type_select.="<option value='{$type_id}' {$selected}>{$type_name}</option>";

    }
    $stmt->close();
    return $type_select."</select>";
}

function genre_Switch($connection){

    $switch_menu="";

    $cat_query="SELECT * FROM genre";
    $result=mysqli_query($connection,$cat_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $genre_id=$row['genre_id'];
            $genre_name=$row['genre_name'];
            $trimmed_genre_name=str_replace(" ","",$genre_name);
            $switch_name=$trimmed_genre_name."_input";
            $switch_id=$trimmed_genre_name."_switch";

            $switch_menu.="<div class='form-check form-switch p-0'>";
            $switch_menu.="<input class='form-check-input' type='checkbox' role='switch' name='{$switch_name}' id='{$switch_id}' value='{$genre_id}'><label class='form-check-label' for='{$switch_id}'>{$genre_name}</label></div>";


        }

        echo $switch_menu;
    }
}

function genre_Switch_On($connection,$stmt,$cw_id){

    $switch_menu="";

    $stmt->bind_param("i",$cw_id);


    $genre_query="SELECT * FROM genre";
    $result=mysqli_query($connection,$genre_query);

    $stmt->execute();
    $genre_id_result=$stmt->get_result();
    if($genre_id_result->num_rows>0){
        while($genre_ids_row=$genre_id_result->fetch_assoc()){
        $genre_ids[]=$genre_ids_row['genre_id'];
        }
    }
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){

            

            $genre_id=$row['genre_id'];
            $genre_name=$row['genre_name'];
            $trimmed_genre_name=str_replace(" ","",$genre_name);
            $switch_name=$trimmed_genre_name."_input";
            $switch_id=$trimmed_genre_name."_switch";
            
                

                    // $child_genre_id=$genre_ids_row['genre_id'];
                    // $switch_on_name=$child_genre_id."_switch";

                    if(in_array($genre_id,$genre_ids)){
                        $checked="checked";
                    }
                    else{
                        $checked="";
                    }

                $switch_menu.="<div class='form-check form-switch p-0'>";
                $switch_menu.="<input class='form-check-input' type='checkbox' role='switch' name='{$switch_name}' id='{$switch_id}' value='{$genre_id}' {$checked}><label class='form-check-label' for='{$switch_id}'>{$genre_name}</label></div>";

                }
            }

            return $switch_menu;

}
     
        


function tags_CW_Checkbox_Checked($connection,$stmt,$cw_id){
    $input_check="";
    $tag_query="SELECT * FROM cw_tags";

    $stmt->bind_param("i",$cw_id);
    $stmt->execute();
    $tag_id_result=$stmt->get_result();
    if($tag_id_result->num_rows>0){
        while($tag_id_row=$tag_id_result->fetch_assoc()){
           
            $tags_ids[]=$tag_id_row['tag_id'];
        }
    }


    $result=mysqli_query($connection,$tag_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $tag_id = $row['tag_id'];
            $tag_name = $row['tag_name'];
            $trimmed_tag_name=str_replace(" ","",$tag_name);
            $tag_check=$trimmed_tag_name;

                //  var_dump($tags_ids);
                if(!is_null($tags_ids)){

                    if(in_array($tag_id,$tags_ids)){
                        $checked="checked";
                    }
                    else{
                        $checked="";
                    }
                }
                else{
                    $checked="";
                }

                    $input_check.="<div class='form-check'><label class='form-check-label' for='".$tag_id."-check'>{$tag_name}</label>
                    <input class='form-check-input' type='checkbox' name='{$tag_check}' id='".$tag_name."-check' {$checked}></div>";

        }
    }


                return $input_check;
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




<script src="js/pagination.js"></script>

<form action="cw_actions/add-type.php" method="post">

</form>