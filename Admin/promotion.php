<?php
include("partials/header.par.php");
include("partials/nav.par.php");
include("partials/script.par.php");
?>

<?php
//add new post
if(isset($_POST['add_promo'])){
  $promo_title = $_POST['promo_title'];
  $promo_desc = $_POST['promo_desc'];
  $promo_bg = $_POST['promo_bg'];
  $promo_image = $_POST['promo_image'];
  $promo_date = date('Y-m-d');




      $result = $crud->insertPromo($promo_title,$promo_desc,$promo_date,$promo_image,$promo_bg);
      if($result){
        echo "<script>alert('Promotion Added Successfully')</script>";
      }else{
        echo "<script>alert('Failed to Add Promotion please try again')</script>";
      }
 }
  //delete post
  if(isset($_GET['delete_id'])){
    $promo_id =  $_GET['delete_id'];
    $result = $crud->delete_promotion($promo_id);
    if($result){
      echo "<script>alert('Promotion Deleted Successfully')</script>";
      header('Location:promotion.php');
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

             if($bulk_action == 'delete'){
                  $result = $crud->delete_promotion($id);
             }
           }
         }
     }

     ?>

  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#view_promoion">View Promotion</a></li>
    <li ><a data-toggle="pill" href="#add_promotion">Add Promotion</a></li>
  </ul>




  <div class="tab-content">
<!-- view posts section -->
    <div id="view_promoion" class="tab-pane fade in active">
      <h3 class="text-center text-success">View Posts</h3>
          <!-- bulk action -->
      <form action="" method="POST">
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
                <th>Promo Title</th>

                <th>Promo Desc</th>
                <th>Promo Background</th>
                <th>Post Date</th>
                <th colspan="2">Action<th>


              </tr>
            </thead>
            <tbody>
            <?php
              $result = $crud->View_promotion();
              while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $promo_id = $row['promo_id'];
                ?>
              <tr>
                <th><input type="checkbox" class="select_one" name="select_one[]" value="<?php echo $row['promo_id']; ?>"></th>
                <td><?php echo $row['promo_id']; ?></td>
                <td><?php echo $row['promo_title']; ?></td>

                <td><?php echo substr($row['promo_desc'],0,50); ?></td>

                <td><div class="col-md-4 d-flex services align-self-stretch py-5 px-12  <?php echo $row['background'];?>"></div></td>

                <td><?php echo $row['promo_date']; ?></td>
                <td><a href="promotion_edit.php?edit_id=<?php echo $promo_id; ?>">Edit</td>
                <td><a href="promotion.php?delete_id=<?php echo $promo_id; ?>">Delete</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </form>

    </div>
<!-- add promotion section -->
    <div id="add_promotion" class="tab-pane">

     <form action="" method="POST" enctype="multipart/form-data">
       <legend class="text-center text-success">Add New Promotion</legend>

       <div class="form-group">
           <label for="" class="text-info">Promotion Title</label>
           <input type="text" class="form-control" id="promo_title" name="promo_title">
        </div>

        <div class="form-group">
            <label for="" class="text-info">Select Image Icon</label>
            <select name="promo_image" id="promo_image" class="form-control" required>
              <option value="">Select Icon</option>
              <option value="flaticon-teacher">Teacher Icon</option>
              <option value="flaticon-books">Book Icon</option>
              <option value="flaticon-diploma">Deploma Icon</option>
              <option value="flaticon-diploma">Graduate Icon</option>
              <option value="flaticon-diploma">Airoplane Icon</option>
            </select>
          </div>

        <div class="form-group">
           <label for="" class="text-info">Promo background</label>
           <select name="promo_bg" id="promo_bg" class="form-control" required>
             <option value="bg-primary">Primary</option>
             <option value="bg-secondary">Secondary</option>
             <option value="bg-info">Info</option>
             <option value="bg-danger">Danger</option>
             <option value="bg-warning">Warning</option>
             <option value="bg-dark">Dark</option>
             <option value="bg-success">Success</option>
             <option value="bg-normal">Normal</option>

           </select>
         </div>

         <div class="form-group">
           <label for="" class="text-info">promotion Desc</label>
           <textarea name="promo_desc" id="post_desc" class="form-control" min="200" max="500" rows="5"></textarea>
         </div>

       <button type="submit" class="btn btn-primary" name="add_promo">Add Promotion</button>
     </form>



    </div>


  </div>





<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("partials/footer.par.php");

?>