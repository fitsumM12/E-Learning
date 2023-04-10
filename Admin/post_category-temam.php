<?php
include("partials/header.par.php");
include("partials/nav.par.php");
include("partials/script.par.php");
?>

     <!-- apply bulk action -->
<?php
    if(isset($_POST['select_one'])){
      $bulk_post_id = $_POST['select_one'];

      if(isset($_POST['bulk_action_btn'])){
         $bulk_action = $_POST['bulk_action'];
           foreach($bulk_post_id as $id){

             if($bulk_action == 'delete'){
                  $result = $crud->delete_category($id);
             }
           }
         }
     }

    ?>


          <!-- bulk action -->
      <div class="col-md-6">
          <form action="" method="POST">
          <h3 class="text-center text-success">View Category</h3>
                <div class="col-md-4 px-0 py-3">
                  <select name="bulk_action" id="bulk_action" class="form-control" required="required">
                    <option value="">Bulk Action</option>
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
                    <th>Category Title</th>
                    <th colspan="3">Action<th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $result = $crud->get_Category();
                  while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    ?>
                  <tr>
                    <th><input type="checkbox" class="select_one" name="select_one[]" value="<?php echo $row['cat_id']; ?>"></th>
                    <td><?php echo $cat_id; ?></td>
                    <td><?php echo $cat_title; ?></td>
                    <td><a href="post_category.php?edit_id=<?php echo $cat_id; ?>">Edit</td>
                    <td><a href="post_category.php?delete_cat=<?php echo $cat_id; ?>">Delete</td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </form>
      </div>
<!-- add posts section -->
    <div class="col-md-6">
        <form action="" method="POST" enctype="multipart/form-data">
          <legend class="text-center text-success">Add New category</legend>

          <div class="form-group">
              <label for="" class="text-info">Category Title</label>
              <input type="text" class="form-control" id="cat_title" name="cat_title" placeholder="Category Name">
            </div>
            <button type="submit" class="btn btn-primary" name="add_category">Add category</button>
        </form>
     </div>
     <?php
      if(isset($_POST['add_category'])){
        $cat_title = $_POST['cat_title'];
        $result = $crud->insertCategory($cat_title);
        if($result){
          echo "<script>alert('Category Inserted')</script>";
          header('Location:post_category.php');
        }
        else{
          echo "<script>alert('Faileed to Insert Category')</script>";
          header('Location:post_category.php');

        }

      }

           //delete category
           if(isset($_GET['delete_cat'])){
            $cat_id = $_GET['delete_cat'];
            $result = $crud->delete_category($cat_id);
            if($result){
              echo "<script>alert('Category Deleted')</script>";
              header('Location:post_category.php');
            }
            else{
              echo "<script>alert('Faileed to Delete Category')</script>";
              header('Location:post_category.php');
            }

          }
     ?>

     <?php
      if(isset($_GET['edit_id'])){
        $cat_id = $_GET['edit_id'];
     ?>
      <div class="col-md-6">
        <form action="" method="POST" enctype="multipart/form-data">
          <legend class="text-center text-success">Update Category</legend>
          <?php
                  $result = $crud->get_singleCategory($cat_id);
                  while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                  }
           ?>
          <div class="form-group">
              <label for="" class="text-info">Catgeory Id </label>
              <input type="text" value="<?php echo $cat_id; ?>" class="form-control" id="cat_id" name="cat_id" placeholder="Category id" readonly>
            </div>
            <div class="form-group">
              <label for="" class="text-info">Catgeory Title </label>
              <input type="text" value="<?php echo $cat_title; ?>" class="form-control" id="cat_title" name="cat_title" placeholder="Category Name">
            </div>
            <button type="submit" class="btn btn-primary" name="update_category">Update category</button>
        </form>
     </div>
     <?php
     //update category
      if(isset($_POST['update_category'])){
        $cat_id = $_POST['cat_id'];
        $cat_title = $_POST['cat_title'];
        $result = $crud->updateCategory($cat_id,$cat_title);
        if($result){
          echo "<script>alert('Category Updated')</script>";
          header('Location:post_category.php');
        }
        else{
          echo "<script>alert('Faileed to Update Category')</script>";
          header('Location:post_category.php');
        }
      }

     ?>



     <?php } ?>
    </div>






<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("partials/footer.par.php");

?>