<?php
include('partials/header.par.php');
include('partials/nav.par.php');
?>
<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group mr-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-primary" id="uploadfile">Upload File</button>
        <button type="button" class="btn btn-primary">Remove files</button>
        <button type="button" class="btn btn-primary" id="loadfile">View Files</button>

    </div>
</div>

<br><br><br>

<form action="filemanagement/uploadFile.inc.php" id="fileuploadform" method="POST" enctype="multipart/form-data" style="display:none;">

<legend>Upload Files</legend>
<label for="">Title</label>
<input type="text" name="name" placeholder="give file name/title">
<br>
<br>
<label for="forFile">Choose File</label>
<input type="file" name="file" id="forFile">
<br>
<br>
<input type="submit" name="submit" id="uploadbtn" value="Submit">
</form>


<div class="clearfix"></div>
<!-- Orders -->
<div class="orders">
<div class="row">
    <div class="col-xl-8 col-md-10">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Orders </h4>
            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h" id="filcontent">


                </div> <!-- /.table-stats -->
            </div>
        </div> <!-- /.card -->
    </div>  <!-- /.col-lg-8 -->


</div>
</div>
<!-- /.orders -->

<?php
include("partials/footerbrk.php");
include('partials/footer.par.php');
include('partials/script.par.php');
?>