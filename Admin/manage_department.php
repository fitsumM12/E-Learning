<?php
include("partials/header.par.php");
include("partials/nav.par.php");
?>
<!-- Button Group for Different purposes -->
<div class="container-fluid">
    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" class="btn btn-primary" id="createDepartbtn">Add New Department</button>
            <button type="button" class="btn btn-primary" id="sdp">Add program</button>
            <button type="button" class="btn btn-primary" id="viewExistingDepart">View Departments</button>

        </div>
    </div>
</div>
<!-- create department -->
<br>
<h3 id="departmessage"></h3>
<br><br>
<p id="sdpResp"></p>

<div class="container-fluid col-md-8 col-sm-12">
    <form method="post" id="createDepartForm" style="display:none;">
        <!-- fetch school id -->
        <div class="form-group">
            <label for="progDepId">Choose School</label>

            <select name="schl_Id" style="width:150px;">
                <?php
                $school="select * from school_detail";
                $schlRes=mysqli_query($dbconnect,$school);
                if(mysqli_num_rows($schlRes)>0)
                {
                    while($row2=mysqli_fetch_assoc($schlRes))
                    {
                        $school_id=$row2['sch_id'];
                        $schlName=$row2['sch_name'];
                        echo"<option value='$school_id'> $schlName </option>";
                    }
                }
            ?>
            </select>
        </div>
        <!-- /end of school  -->
        <div class="form-group">
            <label for="departnam">Department Name</label>
            <input type="text" class="form-control" name="departname" id="departnam" placeholder="IT">
        </div>
        <button type="submit" name="createDepart" id="createDepart" class="btn btn-primary">Create</button>
    </form>
</div>
<br><br>

<div class="container-sm">
    <div id="contentArea">
    </div>
</div>
<!--/ create department -->
<!-- make a combination with the school and programs -->

<div class="container-fluid col-md-8 col-sm-12">
    <form method="post" id="createsdpForm" style="display:none;">
        <!-- To fetch the department id -->
        <div class="form-group">
            <label for="departnam">Choose Department</label>
            <select name="depart_Id" style="width:100px;">
                <?php
                $department="select * from `dpt_detail`";
                $departres=mysqli_query($dbconnect,$department);
                if(mysqli_num_rows($departres)>0)
                {
                    while($row=mysqli_fetch_assoc($departres))
                    {
                        $depart_id=$row['dpt_id'];
                        $departname=$row['dpt_name'];
                        echo"<option value='$depart_id'> $departname </option>";
                    }
                }
            ?>
            </select>
        </div>

        <!-- fetch program -->
        <div class="form-group">
            <label for="progDepId">Choose Program</label>
            <select name="prg_id" style="width:150px;">
                <?php
                    $program="select * from program";
                    $progRes=mysqli_query($dbconnect,$program);
                    if(mysqli_num_rows($progRes)>0)
                    {
                        while($row3=mysqli_fetch_assoc($progRes))
                        {
                            $program_id=$row3['prg_id'];
                            $progname=$row3['prg_name'];
                            echo"<option value='$program_id'> $progname </option>";
                        }
                    }
                ?>
            </select>
        </div>
        <!-- /fetch program -->
        <div class="form-group">
            <label for="dur">Duration</label>
            <input type="text" class="form-control" name="duration" id="dur" placeholder="4">
        </div>
        <button type="submit" name="sdpComb" id="sdpComb" class="btn btn-primary">Add</button>
    </form>
</div>
<br><br>
<!-- /make a combination with the school and programs -->

<!-- Load Department -->
<!-- /Load Department -->
<div class="container-fluid col-md-8 col-sm-12">
    <!-- Edit Department -->
    <?php
        if(!empty($_GET['id'])&&!empty($_GET['dep_name']))
        {?>
    <form action="" method="POST" role="form" id="editDepartForm">
        <legend>Edit Department Info</legend>
        <div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" name="departEdit_id" value='<?php echo $_GET['id'];?>' hidden>
        </div>
        <div class="form-group">
            <label for="">Department Name</label>
            <input type="text" class="form-control" name="depart_name" placeholder="<?php echo $_GET['dep_name'];?>">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="editDprtbtn">Submit</button>
        </div>
    </form>
    <?php
        }else{
            ?>
    <script>
    document.getElementById("#editDepartForm").style.visibility = "hidden";
    </script>

    <?php
        }


        ?>
    <!-- /Edit Department -->
</div>


<!-- Delete Department -->
<!-- /Delete Department -->
<p id="editdpinfo"></p>

<?php
include("partials/footerbrk.php");
include("partials/script.par.php");
?>