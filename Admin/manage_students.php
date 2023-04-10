<?php
include("partials/header.par.php");
include("partials/nav.par.php");
$choose=isset($_GET['p'])?$_GET['p']:'';
?>
<!-- Button Group for Different purposes -->

<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group mr-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-primary" id="approveStudent">provide Admission</button>
        <button type="button" class="btn btn-primary" id="viewstudents">View students</button>
        <button type="button" class="btn btn-primary" id="blockstudents">Block students</button>

    </div>
</div>
<br><br>
<!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
This is to display some of informations of new application
Start approval
*****************************************************************************-->

<div class="container-fluid" id="apprvStudentContainer" style="display:none;">
    <form action="includes/manage_students.inc.php" method="POST" style="float:right;">
        <button type="submit" name="btn_exportTDataexl" id="btn_exportTDataexl" class="btn btn-primary">Export
            Excel</button>&nbsp;<button type="submit" name="btn_exportTData" id="btn_exportTData"
            class="btn btn-primary">Export PDF</button>
    </form>
    <br><br>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $fetch = "SELECT * FROM `student_detail` WHERE `status` = 'pending' ";
        $selectedFac = mysqli_query($dbconnect,$fetch);
        if(mysqli_num_rows($selectedFac)>0)
            {
                while($rw = mysqli_fetch_assoc($selectedFac))
                {
                ?>
                <tr id="<?php echo $rw["std_id"]; ?>">
                    <td><input type="checkbox" name="std_id[]" class="stdappr_allocation"
                            value="<?php echo $rw['std_id']; ?>" /></td>

                    <td><?php echo $rw['std_name'];?></td>
                    <td><?php echo $rw['email'];?></td>
                    <td><a
                            href="manage_studentsReadmore.php?std_id=<?php echo $rw["std_id"]; ?>&studname=<?php echo $rw["std_name"]; ?>&email=<?php echo $rw["email"]; ?>&contact=<?php echo $rw["contact"]; ?>&gender=<?php echo $rw["gender"]; ?>&dob=<?php echo $rw["dob"]; ?>&marital_status=<?php echo $rw["marital_status"]; ?>&current_address=<?php echo $rw["current_address"]; ?>&permanent_address=<?php echo $rw["permanent_address"]; ?>&profile_picture=<?php echo $rw["profile_picture"]; ?>&residential_certificate=<?php echo $rw["residential_certificate"]; ?>">Read
                            more</a></td>
                </tr>
                <?php
                }
                echo "</tbody></table></div>";
            }
            else
                {
                ?>
                <script>
                document.getElementById("apprvStudentContainer").style = "display:none";
                </script>
                <?php
                echo "No students to Add";
                }
                ?>
                <div align="center">
                    <button type="submit" name="btn_apprvstdReq" id="btn_apprvstdReq"
                        class="btn btn-success">Approve</button>

                </div>

    </div>


</div>
<!--^^^^^^^^^^^^^^^^^^^^^^^^
    end of approval
^^^^^^^^^^^^^^^^^^^^^^^ -->

<br>
<h3 id="msgFromTeach"></h3>
<br><br>
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
The following code is for blocking students. i.e before blocking the student ,we should
comfirm that wether we are sure to block it or not
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
<div class="container-fluid" id="blockStudentContainer" style="display:none;">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Check</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>

                </tr>
            </thead>
            <tbody>
                <?php
        $fetch = "SELECT * FROM `student_detail` WHERE `status` = 'accepted' ";
        $selectedFac = mysqli_query($dbconnect,$fetch);
        if(mysqli_num_rows($selectedFac)>0)
            {
                while($rw = mysqli_fetch_assoc($selectedFac))
                {
                ?>
                <tr id="<?php echo $rw["std_id"]; ?>">
                    <td><input type="checkbox" name="std_id[]" class="std_block" value="<?php echo $rw['std_id']; ?>" />
                    </td>
                    <td><?php echo $rw['std_name'];?></td>
                    <td><?php echo $rw['email'];?></td>
                </tr>
                <?php
                }
                echo "</tbody></table></div>";
            }
            else
                {
                ?>
                <script>
                document.getElementById("blockStudentContainer").style = "display:none";
                </script>
                <?php
                echo "No students to Block";
                }
                ?>
                <div align="center">
                    <button type="submit" name="btn_blockstd" id="btn_blockstd" class="btn btn-success">Block</button>




                </div>
    </div>
    <!-- /end  -->
    <p id="stdContent"></p>
    <p id="apprvmsg_std"></p>

    <?php
include("partials/footerbrk.php");
include("partials/script.par.php");
?>