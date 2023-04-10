<?php
include("partials/header.par.php");
include("partials/nav.par.php");

?>


<style>
.calender-container{
    width:80%;
}
.calender-container .category{
    width: 100%;
    border:1px solid black;
}
.calender-container .category select{

}
</style>
<!-- Button Group for Different purposes -->
<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group mr-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-primary" id="addmtngAcadCalender">Add Calender</button>
        <button type="button" class="btn btn-primary" id = "viewmcal">View Calender</button>

    </div>
</div>
<p id="calenderContent"></p>
<!--******************************
    create department
*******************************-->
<br>
<h3 id="calendermsg"></h3>
<br><br>
<div class= "calender-container">
        <form method="post" id="createmtngCalenderForm" action= "includes/manage_calender.inc.php" enctype="multipart/form-data">
            <div class="form-group category">
            <select class="custom-select" name="calTypes"  id="inputGroupSelect01">
                    <option value=" ">Type of Calender</option>
                    <option value="academic">Academic</option>
                    <option value="examdate">Exam</option>
                    <option value="meeting">Meeting</option>
                    <option value="othervents">Other Events</option>
            </select>
            </div>



            <div class="form-group">
                <label for="acadcaltitl">Title</label>
                <input type="text" class="form-control" name="caltitl" id="caltitl">
            </div>

            <div class="form-group">
                <label for="mdescription">description</label><br>
                <textarea name="mdescriptioncal" id="mdescription" cols="60" rows="10"></textarea>
            </div>
            <div class="input-group">
                <button type="submit"  name ="createmtngAcadCal" id="createCal_btnall"  class="btn btn-primary btn-lg btn-block">Create</button>
            </div>

        </form>
</div>

<br><br>
<p id="mcontentArea"></p>
<p id="calDltd"></p>

<!-- ************************************************
Edit manage the academic calender
*****************************************************-->
<?php
if(isset($_GET['cal_id'])){
?>
<form action="includes/manage_calender.inc.php" method="POST" role="form" id="editExamCalForm">
    <?php
       if(!empty($_GET['cal_id'])&&!empty($_GET['cal_type']))
       {
            ?>
        <div class="calender-container">


            <legend>Edit School Info</legend>
            <div class="form-group">
                <label for=""></label>
                <input type="text" class="form-control" name="cal_id" value='<?php echo $_GET['cal_id'];?>' hidden>
            </div>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name = "cal_ttl" placeholder="<?php echo $_GET['cal_type'];?>">
            </div>

            <div class="form-group">
                <label for="">Message</label>
                <textarea name="mdescriptioncal2" id="mdescription2" cols="30" rows="10">

                    <?php
                     $cal="SELECT * FROM `tbl_calender` WHERE `cal_id`=$_GET[cal_id]";
                     $outputOfQuery=mysqli_query($dbconnect,$cal);
                     $rw = mysqli_fetch_assoc($outputOfQuery);
                      echo $rw['cal_description'];
                     ?>
                </textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="editExmSchdlbtn">Update</button>
            </div>
            </div>
</form>
            <?php
    }
    else
    {

        ?>
        <script>
            document.getElementById("#editExamCalForm").style.visibility = "hidden";

        </script>


<?php

     }     }
if(!empty($_GET['cal_del_id'])){
  ?>
<script>
$("#document").ready(function(){
  $.ajax({
            url : "includes/manage_calender.inc.php?p=deletCal",
            type: "POST",
            cache :false,
            data:{query:<?php echo $_GET['cal_del_id']; ?>},
            success:function(response){
              $("#calDltd").html(response);
            }
          });
})
</script>
  <?php
}

include("partials/footerbrk.php");
 include("partials/script.par.php");
?>