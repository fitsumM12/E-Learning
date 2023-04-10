<style>
#logoUpload{
    display:none;
}
</style>
<?php
include("partials/header.par.php");
include("partials/nav.par.php");
    require_once $_SERVER['DOCUMENT_ROOT']."/elearning/Admin/includes/university_details.inc.php";
    $unv = new university();
?>
<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group mr-2" role="group" aria-label="First group">
        <a href="university_details.php?changeLogo" class="btn btn-primary">Change Logo</a>
        <a href="university_details.php?modifyUnvDetails" class="btn btn-primary">university Details</a>
        <a href="university_details.php?changeFavi" class="btn btn-primary">Change Favicon</a>
    </div>
</div>
<?php
if(isset($_REQUEST['changeLogo']))
{
?>
<div class="container-fluid">
<form action="includes/university_details.inc.php" method="POST" enctype="multipart/form-data">
<br><br><br><br>
<div class="form-group">
        <label for="logoUpload" class="btn btn-info btn-lg">
            <span class="glyphicon glyphicon-envelope"></span> Logo
        </label>
  <input type="file" id="logoUpload" name="logoFile">
</div>
<label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label>
<div class="form-group">
 <input type="submit" name="changeLogo-btn" class="btn btn-success">
</div>


</form>
</div>

<?php
}
else if(isset($_REQUEST['modifyUnvDetails'])){


    $result = $unv->getUniversityDetails();

?>
<hr width="100%" height="20">
<div class="container-fluid">
<form action="" method="POST">
  <div class="form-group">
    <label for="unv_id">&nbsp;&nbsp;</label>
    <input type="text" class="" id="unv_id" name="unv_id" value='<?php echo $result['unv_id']; ?>' hidden>
  </div>
  <div class="form-group">
    <label for="unv_name">University Name</label>
    <input type="text" class="" id="unv_name" name="unv_name" value='<?php echo $result['unv_name']; ?>'>
  </div>
  <button type="submit" name="changeUnvDetail_btn" class="btn btn-primary">Submit</button>
</form>
</div>

<?php
}

if(isset($_REQUEST['changeUnvDetail_btn']))
{
    $upd = $unv->updateUniversity($_POST['unv_id'],$_POST['unv_name']);
    if($upd){
        echo "<script>alert(\"You've changed university details\")</script>";
    }else{
        echo "<script>alert(\"please try it again\")</script>";
    }

    }

include("partials/footerbrk.php");
include("partials/script.par.php");
?>