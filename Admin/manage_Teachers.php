<?php
include("partials/header.par.php");
include("partials/nav.par.php");
$choose=isset($_GET['p'])?$_GET['p']:'';
?>
<!-- Button Group for Different purposes -->

<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group mr-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-primary" id="approvtchrs">Approve Teacher</button>
        <button type="button" class="btn btn-primary" id="viewTeachers">View Teachers</button>
        <button type="button" class="btn btn-primary" id="blockTeacher">Block Teacher</button>

    </div>
</div>


<br>
<h3 id="msgFromTeach"></h3>
<br><br>

<p id="teacherContent"></p>

<!-- *********************************************
The following is to manage the new teachers/faculty
************************************************-->
<p id="newFacApp">
<div class="container-fluid" id="forapprvalofnewcustomer">
    <form action="includes/manage_teachers.inc.php" method="POST" style="float:right;">
        <button type="submit" name="btn_exportTDataexl" id="btn_exportTDataexl" class="btn btn-primary">Export
            Excel</button>&nbsp;<button type="submit" name="btn_exportTData" id="btn_exportTData"
            class="btn btn-primary">Export PDF</button>
    </form>
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
        $fetch = "SELECT * FROM faculty_detail WHERE emplmntStatus = 'pending' ";
        $selectedFac = mysqli_query($dbconnect,$fetch);
        if(mysqli_num_rows($selectedFac)>0)
            {
                while($rw = mysqli_fetch_assoc($selectedFac))
                {
                ?>
            <tr id="<?php echo $rw["fac_id"]; ?>">
                <td><input type="checkbox" name="fac_id[]" class="teachAlloc_allocation"
                        value="<?php echo $rw['fac_id']; ?>" /></td>

                <td><?php echo $rw['fac_fname'];?></td>
                <td><?php echo $rw['email'];?></td>
                <td><a
                        href="manage_TeachersReadmore.php?teach_id=<?php echo $rw["fac_id"]; ?>&fac_name=<?php echo $rw["fac_name"]; ?>&gender=<?php echo $rw["gender"]; ?>&email=<?php echo $rw["email"]; ?>&	contact=<?php echo $rw["contact"]; ?>&dob=<?php echo $rw["dob"]; ?>&profile_picture=<?php echo $rw["profile_picture"]; ?>&marital_status=<?php echo $rw["marital_status"]; ?>&	permanent_address=<?php echo $rw["permanent_address"]; ?>&current_address=<?php echo $rw["current_address"]; ?>&emergency_mobile=<?php echo $rw["emergency_mobile"]; ?>&emergency_email=<?php echo $rw["emergency_email"]; ?>&emergency_address=<?php echo $rw["emergency_address"]; ?>&residential_certificate	=<?php echo $rw["residential_certificate"]; ?>&btech_certificate=<?php echo $rw["btech_certificate"]; ?>&mtech_certificate=<?php echo $rw["mtech_certificate"]; ?>&phd_certificate=<?php echo $rw["phd_certificate"]; ?>&sdp_id =<?php echo $rw["dpt_prg_id"]; ?>">Read
                        more</a></td>
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
                echo "No Teacher to Add";
                }
                ?>
            <div align="center">
                <button type="submit" name="btn_apprvFacReq" id="btn_apprvFacReq"
                    class="btn btn-success">Approve</button>

            </div>
</div>
</p>

<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
The following code is for blocking students. i.e before blocking the student ,we should
comfirm that wether we are sure to block it or not
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->


<div class="container-fluid" id="blockteachContainer" style="display:none">
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
        $fetch = "SELECT * FROM `faculty_detail` WHERE `emplmntStatus` = 'accepted' ";
        $selectedFac = mysqli_query($dbconnect,$fetch);
        if(mysqli_num_rows($selectedFac)>0)
            {
                while($rw = mysqli_fetch_assoc($selectedFac))
                {
                ?>
                <tr id="<?php echo $rw["fac_id"]; ?>">
                    <td><input type="checkbox" name="fac_id[]" class="teachAlloc_allocation"
                            value="<?php echo $rw['fac_id']; ?>" /></td>

                    <td><?php echo $rw['fac_fname'];?></td>
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
                document.getElementById("blockteachContainer").style = "display:none";
                </script>
                <?php
                echo "No students to Block";
                }
                ?>
                <div align="center">
                    <button type="submit" name="btn_blockfac" id="btn_blockfac" class="btn btn-success">Block</button>
                </div>
    </div>
    <!-- /end  -->

    <p id="apprvmsg"></p>
    <?php
include("partials/footerbrk.php");
include("partials/script.par.php");
?>