<?php 
 include("../partials/header.par.php");
 include("../partials/nav.par.php");
 
 ?>

 <form method="post">
  <div class="form-group">
    <label for="progCode">program code</label>
    <input type="text" class="form-control" id="progCode" name="prog_id" aria-describedby="emailHelp" placeholder="eg. 01023">
  </div>
  <div class="form-group">
    <label for="prgname">progam Name</label>
    <input type="text" class="form-control" name="progname" id="prgname" placeholder="B.Tech">
  </div>
  <div class="form-group">
    <label for="prg_dur">progam duration</label>
    <input type="text" class="form-control" name="prog_dur" id="prg_dur" placeholder="eg. 4 year">
  </div>
  
  <button type="submit"  name ="submit" id="createPro" class="btn btn-primary">Submit</button>
</form>
<h1 id="som"></h1>
<p id="pr">hover</p>
<?php include("../partials/footer.par.php");
include("../partials/script.par.php");
?>
<script>
 
</script>
