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
        <th scope='col'>post_category</th>
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
$post_category=$row['post_category'];
$post_comment_count=$row['post_comment_count'];
$post_published=$row['post_published'];

$table.="<tr>
<td>{$post_id}</td>
<td>{$post_title}</td>
<td>{$post_date}</td>
<td>{$post_content}</td>
<td>{$post_image}</td>
<td>{$post_category}</td>
<td>{$post_comment_count}</td>
<td>{$post_published}</td>
<td><a class='text-uppercase' href='admin-index.php?src=edit&p_id='".$post_id."></a>Edit</td>
<td><a class='text-uppercase' href='admin-index.php?src=read&p_id='".$post_id."></a>Read</td>
<td><a class='text-uppercase' href='admin-index.php?src=del&p_id='".$post_id."></a>Delete</td>
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
            <td><a href='admin-index.php?src=delcat' class='text-uppercase'></a></td>
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
            <td><a href='admin-index.php?src=deltag&t_id={$tag_id}' class='text-uppercase'></a></td>
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
            <input class='form-check-input' type='checkbox' name='".$tag_id."-check' id='".$tag_name."-check'></div>";

        }

        echo $input_check;
    }
}

//Creative Writing Functions


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
            <td><a href='admin-index.php?src=deltag&t_id={$tag_id}' class='text-uppercase'></a></td>
            </tr>";


        }
        $table.="</tbody></table>";
        echo $table;
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

    $cat_query="SELECT * FROM genre";
    $result=mysqli_query($connection,$cat_query);
    if(confirmQuery($result)){
        while($row=mysqli_fetch_assoc($result)){
            $genre_id=$row['genre_id'];
            $genre_name=$row['genre_name'];

            $table.="<tr>
            <td>{$genre_id}</td>
            <td>{$genre_name}</td>
            <td><a href='admin-index.php?src=delcat' class='text-uppercase'></a></td>
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






