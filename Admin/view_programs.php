<?php
include("partials/header.par.php");
include("partials/nav.par.php");
include("partials/script.par.php");

?>
<!-- Search form -->
<div class="md-form active-cyan active-cyan-2 mb-3">
  <input class="form-control" type="text" placeholder="Search" aria-label="Search">
</div>
<div id="viewprogram">
  <h3 class="text-primary text-center bg-flat-color-5">Hover to view the program details</h3>
</div>

<div id="programdetails" class="panel">


</div>

<!-- form for editing the program -->

<form action="" method="POST" role="form" class="progEd">
  <?php
if(!empty($_GET['id'])){
?>
  <legend>Edit The Program</legend>

  <div class="form-group">
    <label for="">program code</label>
    <input type="text" class="form-control" id="" name="editprogid" value="<?php echo $_GET['id'];?>" readonly>
  </div>
  <div class="form-group">
    <label for="">program Name</label>
    <input type="text" class="form-control" name="editprogname" placeholder="<?php echo $_GET['progname'];?>">
  </div>

  <button type="submit" name="editprog" id="editprogForm" class="btn btn-primary">Submit</button>
</form>

<?php
  }
  else{?>
<script>
document.getElementById("progEd").style.visibility = "hidden";
</script>
<?php
}
if(isset($_GET['delet_prog_id'])){
  ?>
<script>
$("#document").ready(function() {
  $.ajax({
    url: "includes/operation.inc.php?p=deletprogram",
    type: "GET",
    cache: false,
    data: {
      query: <?php echo $_GET['delet_prog_id']; ?>
    },
    success: function(response) {
      $("#prog_dlt").html(response);
    }
  });
})
</script>
<?php
}
?>


<h2 id="responsboard"></h2>
<p id="prog_dlt"></p>

<?php
include("partials/footerbrk.php");
include("partials/footer.par.php");
 ?>