<?php
include("partials/header.par.php");
include("partials/nav.par.php");
$choose=isset($_GET['p'])?$_GET['p']:'';
?>

<!-- Button Group for Different purposes -->
<div class="container">
<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group mr-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-primary"  onclick="window.open('manage_Teachers.php','_self')">Back</button>
    </div>
</div>

<!-- ###########################################################################################
Now For Reading more purpose
################################################################################################-->
<br><br><br>
<div class="container">
<div class = "row">
<div class = "col-sm-6">
    <form action="" method="POST" role="form" id="editFacAprovForm" enctype = "multipart/form-data">
            <legend>The Applicant Details</legend>
    <span>
            <div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" name="teach_id" value='<?php echo $_GET['teach_id'];?>' hidden>
        </div>
        <div class="form-group">
            <label for="">Faculty Name</label>
            <input type="text" class="form-control" name = "fac_name" value="<?php echo $_GET['fac_name'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Gender</label>
            <input type="text" class="form-control" name = "gender" value="<?php echo $_GET['gender'];?>" readonly>
    </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name = "email" value="<?php echo $_GET['email'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Contact</label>
            <input type="text" class="form-control" name = "contact" value="<?php echo $_GET['contact'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="">DoB</label>
            <input type="text" class="form-control" name = "dob" value="<?php echo $_GET['dob'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Profile Picture</label><br>
            <img src="<?php echo $_GET['profile_picture'];?>" alt="">
            <input type="text" class="form-control" name = "profile_picture" value="<?php echo $_GET['profile_picture'];?>" hidden>
        </div>
    </span>
    <span>

        <div class="form-group">
            <label for="">marital Status</label>
            <input type="text" class="form-control" name = "marital_status" value="<?php echo $_GET['marital_status'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="">permanent address</label>
            <input type="text" class="form-control" name = "prmnt_adrs" value="<?php echo $_GET['permanent_address'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="">current Address</label>
            <input type="text" class="form-control" name = "crnt_adrs" value="<?php echo $_GET['current_address'];?>" readonly>
    </div>
        <div class="form-group">
            <label for="">Emergency Mobile</label>
            <input type="text" class="form-control" name = "emrg_mbl" value="<?php echo $_GET['emergency_mobile'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Emergency Email</label>
            <input type="text" class="form-control" name = "emrg_email" value="<?php echo $_GET['emergency_email'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Emergency Address</label>
            <input type="text" class="form-control" name = "emrg_adrs" value="<?php echo $_GET['emergency_address'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="">residential_certificate</label><br>
            <img src="<?php echo $_GET['residential_certificate'];?>" alt="">
            <input type="text" class="form-control" name = "rsd_cert" value="<?php echo $_GET['residential_certificate'];?>" hidden>
        </div>
        <div class="form-group">
            <label for="">btech_certificate</label><br>
            <img src="<?php echo $_GET['btech_certificate'];?>" alt="">
            <input type="text" class="form-control" name = "btech_cert" value="<?php echo $_GET['btech_certificate'];?>" hidden>
        </div>
        <div class="form-group">
            <label for="">M.Tech Certificate</label><br>
            <img src="<?php echo $_GET['mtech_certificate'];?>" alt="">
            <input type="text" class="form-control" name = "rsd_cert" value="<?php echo $_GET['mtech_certificate'];?>" hidden>
        </div>
        <div class="form-group">
            <label for="">M.Tech Certificate</label><br>
            <img src="<?php echo $_GET['mtech_certificate'];?>" alt="">
            <input type="text" class="form-control" name = "rsd_cert" value="<?php echo $_GET['mtech_certificate'];?>" hidden>
        </div>
        <div class="form-group">
            <label for="">Ph.D Certificate</label>
            <input type="text" class="form-control" name = "phd_cert" value="<?php echo $_GET['phd_certificate'];?>" readonly>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="btn_aprove">Approve</button>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary" id="btn_reject">Reject</button>
        </div>
        </span>
        </form>
        </div>
</div>
</div>
<p id="aprovl"></p>
<?php
include("partials/footerbrk.php");
include("partials/script.par.php");
?>