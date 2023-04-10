<?php
include("partials/header.par.php");
include("partials/nav.par.php");
include("partials/script.par.php");
?>
<!-- Button Group for Different purposes -->
<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group mr-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-primary" id="createSectbtn">Add New Section</button>
        <button type="button" class="btn btn-primary" id="viewSectbtn">View Section</button>
        <button type="button" class="btn btn-primary" id="addStudToSectbtn">Add Students</button>
        <button type="button" class="btn btn-primary" id="addFacToSectbtn">Add Teachers</button>

    </div>
</div>

<br>
<h3 id="sectionMessage"></h3>
<br><br>
<h3 id="contentsArea">

</h3>

<!-- To create section -->
<form method="post" id="createSectForm" style="display:none;">
    <div class="form-group">
        <label for="sectname">section Name</label>
        <input type="text" class="form-control" name="sectname">
    </div>
    <div class="form-group">
        <label for="sdpId">dp ID</label>
        <select name="dpt_prg_id" style="width:100px;">
            <?php
        $sdp="SELECT * FROM dpt_program as dp inner join program as pg on dp.prg_id=pg.prg_id
              inner join dpt_detail as dd on dp.dpt_id = dd.dpt_id";

        $res = mysqli_query($dbconnect,$sdp);
          while($row = mysqli_fetch_assoc($res)){
            $sdpid = $row['dpt_prg_id'];
            $dpname = $row['dpt_id'].'-'.$row['sch_id'];
          ?>
            <option value="<?php echo $sdpid ;?>"> <?php echo $dpname; ?></option>;
            <?php } ?>
        </select>
    </div>
    <button type="submit" name="submit" id="createSect" class="btn btn-primary">Submit</button>
</form>
<br><br>

<p class="sectcontent"></p>
<h1 id="responseFromMngSect"></h1>
<!-- Edit Form -->
<form method="post" action="" id="editSectForm">
    <div class="form-group">
        <label for="sectId">section Id</label>
        <input type="text" class="form-control" name="sect_id" value="<?php echo $_GET['id'];?>" readonly>
    </div>
    <div class="form-group">
        <label for="sectname">section Name</label>
        <input type="text" class="form-control" name="sect_name" placeholder="<?php echo $_GET['sec_name'];?>">
    </div>
    <button type="submit" name="submit" id="editSect" class="btn btn-primary">Submit</button>
</form>
<!--
  add student to section

-->
<div id="addStdntToSctnContainer" class="container-fluid" style="display:none;">
    <select class="custom-select" name="StudSectId" id="StudSectId">
        <?php
  $fetch = "SELECT * FROM section_detail WHERE sec_id!=0";
  $selectedSect = mysqli_query($dbconnect,$fetch);
      echo "<option selected>Select Section</option>";
      if(mysqli_num_rows($selectedSect)>0)
      {
        while($row = mysqli_fetch_assoc($selectedSect))
        {
          $imcSec = "SELECT COUNT(*) FROM student_detail WHERE sec_id = '$row[sec_id]'";
          $rs = mysqli_query($dbconnect,$imcSec);
          while($rw = mysqli_fetch_assoc($rs))
          {
          if($rw['COUNT(*)']<30){
            echo "<option value=".$row['sec_id'].">".$row['sec_name']."</option>";
          }

        }
        }
      }
  ?>
    </select>
    <br><br>
    <table class="table table-bordered">
        <thead class="table-dark">
            <?php
  $studentList="SELECT * FROM student_detail WHERE sec_id=0 and `status`='accepted'";
  $selectedStud = mysqli_query($dbconnect,$studentList);
  if(mysqli_num_rows($selectedStud)>0)
  {
  ?>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
while($rw=mysqli_fetch_assoc($selectedStud))
{?>
            <tr id="<?php echo $rw["std_id"]; ?>">
                <th scope="row"><?php echo $rw['std_id'];?></th>
                <td><?php echo $rw['std_name']."&nbsp;".$rw['std_name'];?></td>
                <td><?php echo $rw['gender'];?></td>
                <td><?php echo $rw['email'];?></td>
                <td><input type="checkbox" name="stud_id[]" class="studSection_allocation"
                        value="<?php echo $rw['std_id']; ?>" /></td>
            </tr>
            <?php
}
echo "</tbody></table>";
  }
  else
  {
    ?>
            <script>
            document.getElementById("addStdntToSctnContainer").style = "display:none";
            </script>
            <?php
    echo "No students to Add";
  }
?>
            <div align="center">
                <button type="button" name="btn_AddtoSect" id="btn_AddtoSect" class="btn btn-success">Add to
                    Section</button>
            </div>
</div>
<!--
    End of Add student to section
    -->
<!-- ******************************************
to add the teacher and courses to the section
  *********************************************
-->
<div id="allocSectToTeachContainer" class="container-fluid" style="display:none;">
    <select class="custom-select" name="sect_Id" id="sect_Id">
        <?php
      $fetch = "SELECT * FROM section_detail WHERE sec_id!=0";
      $selectedSect = mysqli_query($dbconnect,$fetch);
      echo "<option selected>Select Section</option>";
      if(mysqli_num_rows($selectedSect)>0)
      {
        while($row = mysqli_fetch_assoc($selectedSect))
        {
          $sec_id=$row['sec_id'];
          echo "<option value=".$row['sec_id'].">".$row['sec_name']."</option>";
        }
      }
  ?>
    </select>
    <br><br>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">Faculty ID</th>
                <th scope="col">Faculty Name</th>
                <th scope="col">Course Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            /****************************************
              select faculty and course combinations
             ******************************************/
            $fetch = "SELECT * FROM faculty_course_allocation as fca INNER JOIN faculty_detail as fa ON
                      fca.fac_id = fa.fac_id INNER JOIN course_detail as cr ON fca.crs_id = cr.crs_id";
            $selectedFacCrs = mysqli_query($dbconnect,$fetch);
            if(mysqli_num_rows($selectedFacCrs)>0)
              {

                  while($rw = mysqli_fetch_assoc($selectedFacCrs))
                  {

                    ?>
            <tr id="<?php echo $rw['fac_crs_id']; ?>">
                <th scope="row"><?php echo $rw['fac_id'];?></th>
                <td><?php echo $rw['fac_fname'];?></td>
                <td><?php echo $rw['crs_name'];?></td>
                <td><input type="checkbox" name="fac_crs_id[]" class="sectFac_allocation"
                        value="<?php echo $rw['fac_crs_id']; ?>" /></td>
            </tr>
            <?php

                    }
                    echo "</tbody></table>";
              }
              else
                  {
                    ?>
            <script>
            document.getElementById("allocSectToTeachContainer").style = "display:none";
            </script>
            <?php
                    echo "No Teacher to Add";
                  }
                  ?>
            <div align="center">
                <button type="button" name="btn_allocSectTeach" id="btn_allocSectTeach" class="btn btn-success">Submit
                    Allocation</button>
            </div>
</div>
<p id="sectAll"></p>
<p id="sectAll2"></p>
<!-- View allocated teacher -->




<!-- end of viewing allocated teacher -->

<!-- ************************************************
    The end of adding courses and teachers to the section
    ************************************** *************-->
<?php if(empty($_GET['id'])){
echo "<script>document.getElementById(\"editSectForm\").style=\"visibility:hidden;\";</script>";
  }

  if(isset($_GET['delet_']))
  {
    ?>
<script>
$(document).ready(function() {
    $.ajax({
        url: 'includes/operation.inc.php?p=delet_Section',
        type: "POST",
        data: {
            deleteSection: '<?php echo $_GET['delet_'];?>'
        },
    })
})
</script>
<?php
  }
    ?>

<?php
include("partials/footerbrk.php");
include("partials/footer.par.php");

?>