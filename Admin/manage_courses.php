<?php
include("partials/header.par.php");
include("partials/nav.par.php");
?>
<!-- Button Group for Different purposes -->
<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group mr-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-primary" id="addCourse">Add course</button>
        <button type="button" class="btn btn-primary" id="viewCourse">View course</button>
        <button type="button" class="btn btn-primary" id="allteachr">Allocate Teacher</button>
        <button type="button" class="btn btn-primary" id="allocateCourses">Allocate Courses</button>
        <button type="button" class="btn btn-primary" id="allocateCourses"><i class="fa fa-add">more</i></button>
    </div>
</div>
<!-- To load courses -->
<div class="container-fluid" id="courseContent">

</div>

<!-- create department -->
<br>
<h3 id="coursemsg"></h3>
<br><br>

<form method="post" id="createCourseForm">
    <div class="form-group">
        <label for="coursenam">Course Name</label>
        <input type="text" class="form-control" name="coursename" id="coursenam" placeholder="java">
    </div>
    <div class="form-group">
        <label for="course">Credit Hour </label>
        <input type="text" class="form-control" name="credithr" id="credithr" placeholder="4">
    </div>
    <button type="submit" name="createCours" id="createCourse" class="btn btn-primary">Create</button>
</form>
<br><br>
<div id="contentArea"></div>
<!--/ create course -->
<!-- Load course -->
<div class="courseContent">
</div>
<!-- /Load course -->
<!--
  Edit Course
* here I will display the editable form data
-->
<?php
    if(!empty($_GET['crs_id'])&&!empty($_GET['course_name']))
    {
    ?>
<form action="" method="POST" role="form" id="editCourseForm">
    <legend>Edit Course Info</legend>

    <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control" name="course_id" value='<?php echo $_GET['crs_id'];?>' readonly>
    </div>
    <div class="form-group">
        <label for="">Course Name</label>
        <input type="text" class="form-control" name="course_name" placeholder="<?php echo $_GET['course_name'];?>">
    </div>
    <div class="form-group">
        <label for="">Credit Hrs </label>
        <input type="text" class="form-control" name="credit_hr" placeholder="<?php echo $_GET['credit_hr'];?>">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" id="editCoursebtn">Submit</button>
        &nbsp;
        <button type="submit" class="btn btn-primary" id="distroy">X</button>
    </div>
</form>
<?php
    }
    else
      {
      ?>
<script>
document.getElementById("#editDepartForm").style.visibility = "hidden";
</script>
<?php
      }
    ?>
<!-- /Edit Department -->


<!--
    course allocation
-->
<div id="allocateCoursesContainer" class="container-fluid" style="display:none;">
    <label for="sem_Id">Semester Number</label><br>&nbsp;
    <input type="text" name="sem_Id" id="sem_Id" placeholder="1" required="True">
    <br><br>
    <select class="custom-select" name="sdp_Id" id="sdp_Id">
        <?php
  $fetch = "SELECT * FROM dpt_program";
  $selectedprog = mysqli_query($dbconnect,$fetch);
      echo "<option selected>Select The program</option>";
      if(mysqli_num_rows($selectedprog)>0)
      {
        while($row = mysqli_fetch_assoc($selectedprog))
        {
          echo "<option value=".$row['dpt_prg_id'].">".$row['dpt_prg_name']."</option>";
        }
      }
  ?>
    </select>
    <br><br>
    <table class="table table-bordered">
        <thead class="table-dark">
            <?php
    $studentList="SELECT * FROM course_detail";
    $selectedStud = mysqli_query($dbconnect,$studentList);
    if(mysqli_num_rows($selectedStud)>0)
    {
  ?>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Course Name</th>
                <th scope="col">Credit Hr</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
  while($rw=mysqli_fetch_assoc($selectedStud))
  {?>
            <tr id="<?php echo $rw["crs_id"]; ?>">
                <th scope="row"><?php echo $rw['crs_id'];?></th>
                <td><?php echo $rw['crs_name'];?></td>
                <td><?php echo $rw['crs_credit'];?></td>
                <td><input type="checkbox" name="course_id[]" class="courseAlloc_allocation"
                        value="<?php echo $rw['crs_id']; ?>" /></td>
            </tr>
            <?php
  }
  echo "</tbody></table>";
    }
  else
  {
    ?>
            <script>
            document.getElementById("allocateCoursesContainer").style = "display:none";
            </script>
            <?php
    echo "No students to Add";
  }
  ?>
            <div align="center">
                <button type="button" name="btn_allocCourse" id="btn_allocCourse" class="btn btn-success">Submit
                    Allocation</button>
            </div>
</div>
<p id="crsAll"></p>
<!--***********************
      End of course allocation
     ********************** -->
<!--
        Teachers allocation
      -->
<div id="allocateFacultyContainer" class="container-fluid" style="display:none;">
    <select class="custom-select" name="crs_Id" id="crs_Id">
        <?php
  $fetch = "SELECT * FROM course_detail";
  $selectedCrs = mysqli_query($dbconnect,$fetch);
      echo "<option selected>Select Course</option>";
      if(mysqli_num_rows($selectedCrs)>0)
      {
        while($row = mysqli_fetch_assoc($selectedCrs))
        {
          echo "<option value=".$row['crs_id'].">".$row['crs_name']."</option>";
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
                <th scope="col">Faculty Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
          $fetch = "SELECT * FROM faculty_detail";
          $selectedFac = mysqli_query($dbconnect,$fetch);
            if(mysqli_num_rows($selectedFac)>0)
              {
                  while($rw = mysqli_fetch_assoc($selectedFac))
                  {
                    ?>
            <tr id="<?php echo $rw["fac_id"]; ?>">
                <th scope="row"><?php echo $rw['fac_id'];?></th>
                <td><?php echo $rw['fac_fname'];?></td>
                <td><?php echo $rw['email'];?></td>
                <td><input type="checkbox" name="fac_id[]" class="teachAlloc_allocation"
                        value="<?php echo $rw['fac_id']; ?>" /></td>
            </tr>
            <?php
                    }
                    echo "</tbody></table>";
              }
              else
                  {
                    ?>
            <script>
            document.getElementById("allocateFacultyContainer").style = "display:none";
            </script>
            <?php
                    echo "No students to Add";
                  }
                  ?>
            <div align="center">
                <button type="button" name="btn_allocTeach" id="btn_allocTeach" class="btn btn-success">Submit
                    Allocation</button>
            </div>
</div>
<p id="crsAll"></p>

<?php
  include("partials/footerbrk.php");
  include("partials/script.par.php");
  ?>