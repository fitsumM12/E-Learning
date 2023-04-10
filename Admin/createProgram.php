<?php
 include("partials/header.par.php");
 include("partials/nav.par.php");
 ?>
 <br>
 <hr width="100%" hieght="20px">
 <h2 class="text-center">Create New Program</h2>
 <hr width="100%" hieght="20px">
<div class="container-fluid" style="width:50%">
<form method="post">
  <div class="form-group">
    <label for="progCode">program code</label>
    <input type="text" class="form-control" id="progCode" name="prog_id" aria-describedby="emailHelp" placeholder="eg. 01023">
  </div>
  <div class="form-group">
    <label for="prgname" class="text-center">progam Name</label>
    <input type="text" class="form-control" name="progname" id="prgname" placeholder="B.Tech">
  </div>
  <button type="submit"  name ="submit" id="createPro" class="btn btn-primary form-control">Submit</button>
</form>
</div>

<h1 id="som"></h1>
<p id="pr"></p>


<?php
include("partials/footerbrk.php");
include("partials/footer.par.php");

include("partials/script.par.php");


?>
<script>

</script>
