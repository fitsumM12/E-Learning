<?php
include("partials/header.par.php");
include("partials/nav.par.php");
include("partials/script.par.php");
?>



<?php
if(isset($_GET['edit_id'])){
  $promo_id = $_GET['edit_id'];
}
//display value inside the input field

$result = $crud->view_single_promotion($promo_id);
while($row = $result->fetch(PDO::FETCH_ASSOC)){
  $promo_title = $row['promo_title'];
  $promo_image_db = $row['promo_image'];
  $promo_bg = $row['background'];
  $promo_desc = $row['promo_desc'];
  $promo_date = $row['promo_date'];


}
//    <!-- update post query -->
  if(isset($_POST['update_promo'])){
    $promo_title = $_POST['promo_title'];
    $promo_image = $_POST['promo_image'];
    $promo_desc = $_POST['promo_desc'];
    $promo_bg = $_POST['background'];
    $promo_date = date('Y-m-d');
    $promo_image =$_POST['promo_image'];


    
    if(empty($promo_image)){
      $promo_image = $promo_image_db;
    }
  
    //move to folder we need
  


    $result = $crud->updatePromo($promo_id,$promo_title,$promo_bg,$promo_image,$promo_desc,$promo_date);
    if($result){
      echo "<script>alert('Promotion Updated successfully')</script>";
      header('Location:promotion.php');
    }else{
      echo "<script>alert('Failed to Update Promotion try again later')</script>";
    }

  }

    
?>

<form action="" method="POST" enctype="multipart/form-data">
       <legend class="text-center text-success">Edit Promotion</legend>
<!-- referece id -->
          <input type="hidden" name="promo_id" value="<?php echo $row['promo_id'];?>">
     
       <div class="form-group">
           <label for="" class="text-info">Promotion Title</label>
           <input type="text" class="form-control" id="promo_title" name="promo_title" value="<?php echo $promo_title; ?>">
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
           <label for="" class="text-info">Promo Description</label>
           <textarea name="promo_desc" id="post_desc" class="form-control" rows="5"><?php echo $promo_desc; ?></textarea>
         </div>

         
         <div class="form-group">
           <label for="" class="text-info">Promo background</label>
           <select name="background" id="background" class="form-control" required>
           <option value="">Select Background</option>
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
       
     
       <button type="submit" class="btn btn-primary" name="update_promo">Update Promotion</button>
     </form>


     
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("partials/footer.par.php");

?>