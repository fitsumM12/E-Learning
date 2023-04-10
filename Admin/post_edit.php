<?php
include("partials/header.par.php");
include("partials/nav.par.php");
include("partials/script.par.php");
?>



<?php
if(isset($_GET['edit_id'])){
  $post_id = $_GET['edit_id'];
}
//display value inside the input field

$result = $crud->get_singleBlog($post_id);
while($row = $result->fetch(PDO::FETCH_ASSOC)){
  $post_title = $row['post_title'];
  $post_image_db = $row['post_image'];
  $post_status = $row['post_status'];
  $post_category = $row['post_category_id'];
  $post_desc = $row['post_desc'];

}
//    <!-- update post query -->
  if(isset($_POST['update_post'])){
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_desc = $_POST['post_desc'];
    $post_status = $_POST['post_status'];

  
    
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    
    if(empty($post_image)){
      $post_image = $post_image_db;
    }
  
    //move to folder we need
    move_uploaded_file($post_image_temp,'../Homepage/images/'.$post_image);


    $result = $crud->updateBlog($post_id,$post_title,$post_category_id,$post_image,$post_desc,$post_status);
    if($result){
      echo "<script>alert('Post Updated successfully')</script>";
      header('Location:posts.php');
    }else{
      echo "<script>alert('Failed to Update Post try again later')</script>";
    }
  }

    
?>

<form action="" method="POST" enctype="multipart/form-data">
       <legend class="text-center text-success">Edit Posts</legend>
<!-- referece id -->
          <input type="hidden" name="post_id" value="<?php echo $row['post_id'];?>">
     
       <div class="form-group">
           <label for="" class="text-info">Post Title</label>
           <input type="text" class="form-control" id="post_title" name="post_title" value="<?php echo $post_title; ?>">
        </div>
        
        <div class="form-group col-md-6">
           <label for="" class="text-info">Post Image</label>
           <input type="file" name="post_image" class="form-control">
        </div>
        <div class="form-group col-md-6">
           <img width="100" src="../HomePage/images/<?php echo $post_image_db; ?>" alt="post_image">
        </div>

        <div class="form-group">
           <label for="" class="text-info">Post Category</label>
           <select name="post_category" id="post_category" class="form-control" required>
             <option value="">Select Category</option>
             <?php
                $result = $crud->get_Category();
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
              ?>
             <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_title']; ?></option>
             <?php } ?>
           </select> 
         </div>
         
         <div class="form-group">
           <label for="" class="text-info">Post Description</label>
           <textarea name="post_desc" id="post_desc" class="form-control" rows="5"><?php echo $post_desc; ?></textarea>
         </div>

         
         <div class="form-group">
           <label for="" class="text-info">Post Status</label> 
           <select name="post_status" id="post_status" class="form-control">
             <option value="<?php echo $post_status;?>"><?php echo $post_status; ?></option>
             <?php
             if($post_status == 'published'){
              echo "<option value='draft'>Draft</option>";
             }else{
              echo "<option value='published'>Publish</option>";
             }

             
             ?>
           </select>
         </div>
       
     
       <button type="submit" class="btn btn-primary" name="update_post">Update Post</button>
     </form>


     
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("partials/footer.par.php");

?>