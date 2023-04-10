<?php
include("partials/header.par.php");
include("partials/nav.par.php");
include("partials/script.par.php");
?>

     <!-- apply bulk action -->
<?php
    if(isset($_POST['select_one'])){
      $bulk_comment_id = $_POST['select_one'];

      if(isset($_POST['bulk_action_btn'])){
         $bulk_action = $_POST['bulk_action'];
           foreach($bulk_comment_id as $id){
            if($bulk_action == 'approved'){
              $result = $crud->updateCommentStatus($id,$bulk_action);
            }
            if($bulk_action == 'unapproved'){
              $result = $crud->updateCommentStatus($id,$bulk_action);
            }
             if($bulk_action == 'delete'){
                  $result = $crud->delete_comment($id);
             }
           }
         }
     }

     ?>

      
          <!-- bulk action -->
          <form action="" method="POST">
          <h3 class="text-center text-success">View Comments</h3>
                <div class="col-md-4 px-0 py-3"> 
                  <select name="bulk_action" id="bulk_action" class="form-control" required="required">
                    <option value="">Bulk Action</option>
                    <option value="approved">Approve</option>
                    <option value="unapproved">UnApprove</option>
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
                    <th>Comment</th>
                    <th>In Response</th>
                    <th>Post Author</th>
                    <th>Comment Status</th>
                    <th>Comment Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $result = $crud->get_All_Comment();
                  while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $post_id = $row['post_id'];
                    $comment_id = $row['comment_id'];
                    $comment = $row['comment'];
                    $comment_author = $row['comment_author'];
                    $comment_status = $row['comment_status'];
                    $comment_date = $row['comment_date'];
                    ?>
                  <tr>
                    <td><input type="checkbox" class="select_one" name="select_one[]" value="<?php echo $comment_id; ?>"></td>
                    <td><?php echo $comment_id; ?></td>
                    <td><?php echo $comment; ?></td>
                    <td><a href="../HomePage/blog_single.php?post_id=<?php echo $post_id; ?>">View Post</td>
                    <td><?php echo $comment_author; ?></td>
                    <td><?php echo $comment_status; ?></td>
                    <td><?php echo $comment_date; ?></td>
                    <td><a href="post_comment.php?comment_id=<?php echo $comment_id; ?>">Delete</td>
                    
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </form>
<!-- add posts section -->

     <?php
     
           //delete category
           if(isset($_GET['comment_id'])){
            $comment_id = $_GET['comment_id'];
            $result = $crud->delete_comment($comment_id);
            if($result){
              echo "<script>alert('Comment Deleted')</script>";
              header('Location:post_comment.php');
            }
            else{
              echo "<script>alert('Faileed to Delete Comment')</script>";
              header('Location:post_comment.php');
            }
    
          }
     ?>







<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("partials/footer.par.php");

?>