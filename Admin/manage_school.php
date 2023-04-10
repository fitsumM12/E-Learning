<?php
error_reporting(0);
include("partials/header.par.php");
include("partials/nav.par.php");
?>
<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <button type="button" class="btn btn-primary" id="createSchoolbtn">Add New School</button>
    <button type="button" class="btn btn-primary" id="viewSchool">View Schools</button>
  </div>
</div>
<br>
<br>
<br>
<p id="schlcontent"></p>

<!-- create school section -->
<form method="post" id="createschoolForm" style="display:none;">
  <div class="form-group">
    <label for="schlname">School Name</label>
    <input type="text" class="form-control" name="schlname" id="schlname" placeholder="Computer engineering">
  </div>
  <button type="submit" name="createClass" id="createClass" class="btn btn-primary">Create</button>
</form>
<!-- /create -->

<h1 id="responseFromMngSchool" style="color:green;"></h1>
<br>
<br>
<div id="schoolContent"></div>

<form action="" method="POST" role="form" id="editSchlForm">

  <?php
if(!empty($_GET['id'])&&!empty($_GET['school_name']))
{?>
  <legend>Edit School Info</legend>
  <div class="form-group">
    <label for=""></label>
    <input type="text" class="form-control" name="school_code" value='<?php echo $_GET['id'];?>' hidden>
  </div>
  <div class="form-group">
    <label for="">School Name</label>
    <input type="text" class="form-control" name="schoolname" placeholder="<?php echo $_GET['school_name'];?>">
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary" id="editschlbtn">Submit</button>
  </div>
</form>
<?php
    }else{
        ?>
<script>
document.getElementById("#editSchlForm").style.visibility = "hidden";
</script>

<?php
    }

?>


<?php

if(isset($_GET['delet_schl_id'])){
  ?>
<script>
$("#document").ready(function() {
  $.ajax({
    url: "includes/manage_school.inc.php?p=deletschlid",
    type: "POST",
    cache: false,
    data: {
      school_del_query: <?php echo $_GET['delet_schl_id']; ?>
    },
    success: function(response) {
      $("#school_dlt").html(response);
    }
  });
})
</script>
<?php
}
?>
<p id="school_dlt"></p>

<?php
include("partials/footerbrk.par.php");
include("partials/footer.par.php");
include("partials/script.par.php");
?>