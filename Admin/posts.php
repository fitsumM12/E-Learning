<?php
include("partials/header.par.php");
include("partials/nav.par.php");
include("partials/script.par.php");

?>

<?php
//add new post
if(isset($_POST['add_post'])){
  $post_title = $_POST['post_title'];
  $post_desc = $_POST['post_desc'];
  $post_status = $_POST['post_status'];
  $post_date = date('Y-m-d');
  $post_category = $_POST['post_category'];
  $post_author = $_SESSION['username'];

  $post_image = $_FILES['post_image']['name'];
  $post_image_temp = $_FILES['post_image']['tmp_name'];



  //move to postion we need
  move_uploaded_file($post_image_temp,'../Homepage/images/'.$post_image);

  if(!empty($post_title) || !empty($post_desc) || !empty($post_image)){
      $result = $crud->insertPost($post_title,$post_desc,$post_status,$post_date,$post_category,$post_author,$post_image);
      if($result){
        echo "<script>alert('Post  Added Successfully')</script>";
      }else{
        echo "<script>alert('Failed to Add post please try again')</script>";
      }
  }else{
      echo "<script>alert('One or more mandatory fields are empty')</script>";
  }
 }
  //delete post
  if(isset($_GET['delete_id'])){
    $delete_key =  $_GET['delete_id'];
    $result = $crud->delete_Blog($delete_key);
    if($result){
      echo "<script>alert('Post Deleted Successfully')</script>";
    }else{
      echo "<script>alert('Failed to delete post please try again')</script>";
    }
  }

?>

     <!-- apply bulk action -->
<?php
    if(isset($_POST['select_one'])){
      $bulk_post_id = $_POST['select_one'];

      if(isset($_POST['bulk_action_btn'])){
         $bulk_action = $_POST['bulk_action'];
           foreach($bulk_post_id as $id){
             if($bulk_action == 'published'){
                  $result = $crud->updatePostStatus($id,$bulk_action);

             }else if($bulk_action == 'draft'){
                  $result = $crud->updatePostStatus($id,$bulk_action);
             }else if($bulk_action == 'archive'){
                  $result = $crud->updatePostStatus($id,$bulk_action);
             }else if($bulk_action == 'delete'){
                  $result = $crud->delete_Blog($id);
             }
           }
         }
     }

     ?>

  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#view_posts">View Posts</a></li>
    <li ><a data-toggle="pill" href="#add_posts">Add Posts</a></li>
  </ul>




  <div class="tab-content">
<!-- view posts section -->
    <div id="view_posts" class="tab-pane fade in active">
      <h3 class="text-center text-success">View Posts</h3>
          <!-- bulk action -->
      <form action="" method="POST">
            <div class="col-md-4 px-0 py-3">
              <select name="bulk_action" id="bulk_action" class="form-control" required="required">
                <option value="">Bulk Action</option>
                <option value="published">publish</option>
                <option value="draft">draft</option>
                <option value="archive">archive</option>
                <option value="delete">delete</option>
              </select>
          </div>
          <div class="col-md-4 px-2 py-3">
            <input type="submit" class="btn btn-primary" name="bulk_action_btn" value="Apply">
          </div>

        <div class="table-responsive table-bordered" >
          <table class="table table-hover">
            <thead>
              <tr>
                <th><input type="checkbox" name="select_all" id="select_all"></th>
                <th>Id</th>
                <th>Post Title</th>
                <th>post Image</th>
                <th>Category</th>
                <th>Post Status</th>
                <th>Post Date</th>
                <th>Post Author</th>
                <th title="post_view"><i class="fa fa-eye"></i></th>
                <th colspan="3">Action<th>


              </tr>
            </thead>
            <tbody>
            <?php
              $result = $crud->View_allBlog();
              while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $post_id = $row['post_id'];
                $post_view_counter = $row['post_view_counter'];
                ?>
              <tr>
                <th><input type="checkbox" class="select_one" name="select_one[]" value="<?php echo $row['post_id']; ?>"></th>
                <td><?php echo $row['post_id']; ?></td>
                <td><?php echo $row['post_title']; ?></td>
                <td> <img width="100" src="../HomePage/images/<?php echo $row['post_image']; ?>" alt="post_image" ></td>
                <td><?php echo $row['cat_title']; ?></td>
                <td><?php echo $row['post_status']; ?></td>
                <td><?php echo $row['post_date']; ?></td>
                <td><?php echo $row['post_author']; ?></td>
                <td title="<?php echo"this post is viewed $post_view_counter times "?>"><?php echo $post_view_counter ?></td>
                <td><a href="post_edit.php?edit_id=<?php echo $post_id; ?>">Edit</td>
                <td><a href="posts.php?delete_id=<?php echo $post_id; ?>">Delete</td>
                <td><a href="../Homepage/blog_single.php?post_id=<?php echo $post_id;?>">View</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </form>

    </div>
<!-- add posts section -->
    <div id="add_posts" class="tab-pane">

     <form action="" method="POST" enctype="multipart/form-data">
       <legend class="text-center text-success">Add New Posts</legend>

       <div class="form-group">
           <label for="" class="text-info">Post Title</label>
           <input type="text" class="form-control" id="post_title" name="post_title">
        </div>

        <div class="form-group">
           <label for="" class="text-info">Post Image</label>
           <input type="file" name="post_image" class="form-control">
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
           <textarea name="post_desc" id="post_desc" class="form-control" rows="5"></textarea>
         </div>


         <div class="form-group">
           <label for="" class="text-info">Post Status</label>
           <select name="post_status" id="post_status" class="form-control" required="required">
             <option value="published">Published</option>
             <option value="draft">Draft</option>
           </select>
         </div>


       <button type="submit" class="btn btn-primary" name="add_post">Add Posts</button>
     </form>



    </div>


  </div>





<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("partials/footer.par.php");

?>