<?php
include("partials/header.par.php");
include("partials/nav.par.php");
include("partials/script.par.php");
?>

<!-- Button Group for Different purposes -->
<div class="container">
<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group mr-2" role="group" aria-label="First group">
        <button type="submit" class="btn btn-primary"  id="chang_prof_pic">Change Profile</button>
        <button type="button" class="btn btn-primary"  onclick="window.open('index.php','_self')">Back</button>
    </div>
</div>

<!-- ###########################################################################################
Now For Reading more purpose
################################################################################################-->
<br><br><br>
<?php
$prfl = "SELECT * FROM admin_detail WHERE admin_id = '$_SESSION[admin_id]'";
$prcs = mysqli_query($dbconnect,$prfl);
if((mysqli_num_rows($prcs))>0)
{
    While($rw=mysqli_fetch_assoc($prcs))
    {
    ?>
<div class="container">
<div class = "row">
<div class = "col-sm-6">
    <form action="" method="POST" role="form" id="editMyprofileFrm" enctype = "multipart/form-data">
            <legend>Edit Profile</legend>
    <span>
            <div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" name="ad_id" value='<?php echo $rw['admin_id']?>' hidden>
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name = "ad_name" value="<?php echo $rw['admin_fname'];?>" >
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name = "email" value="<?php echo $rw['email'];?>" >
        </div>
        <div class="form-group">
            <label for="">Contact</label>
            <input type="text" class="form-control" name = "contact" value="<?php echo $rw['contact'];?>" >
        </div>
        <div class="form-group">
            <label for="">DoB</label>
            <input type="text" class="form-control" name = "dob" value="<?php echo $rw['dob'];?>" >
        </div>

        <div class="form-group">
            <label for="">permanent address</label>
            <input type="text" class="form-control" name = "prmnt_adrs" value="<?php echo $rw['permanent_address'];?>" >
        </div>
        <div class="form-group">
            <label for="">current Address</label>
            <input type="text" class="form-control" name = "crnt_adrs" value="<?php echo $rw['current_address'];?>" >
        </div>
        <div class="form-group">
            <label for="">Experience</label>
            <input type="text" class="form-control" name = "expr" value="<?php echo $rw['experience'];?>" >
        </div>


        <div class="form-group">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary" name="btn_update_ad" id="btn_update_ad">Update</button>
        </div>
        </span>
        </form>
        </div>
    </div>
    </div>

    <?php
    }
}
?>
<p id="update_admn"></p>
<!-- <div class="container-fluid">
</div> -->
<form id="prof_pic_upld"  action="includes/admin.inc.php" method="POST" class="form-horizontal" enctype="multipart/form-data" role="form" style="display:none;">
        <div class="form-group">
            <legend>Change Profile</legend>
        </div>

        <!--  -->

        <div class="form-group">
        <label for="upload">
        <i class="fa fa-address-book" style="font-size:48px;color:green;"></i>
            <div class="col-sm-6 col-sm-offset-4" margin="auto">
            <input type="file" accept="image/*"  name="prof_pic" id="upload" style="display:none;" >
            </div>
            </label>
        </div>


        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-0">
                <button type="submit" class="btn btn-primary" name="upld_prfl" id="upld_prof_pic_btn">Submit</button>
            </div>
        </div>
</form>
<script>
function adminTogl()
{
    document.getElementById("prof_pic_upld").style="visibility:False;"
    document.getElementById("editMyprofileFrm").style="visibility:False;"
}
$(document).ready(function(){
$("#chang_prof_pic").click(function(){
     document.getElementById("editMyprofileFrm").style="visibility:False;"
    document.getElementById("prof_pic_upld").style="visibility:True;"
})
})
</script>

<?php
include("partials/footerbrk.php");
include("partials/footer.par.php");
?>