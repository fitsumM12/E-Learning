<?php
include("partials/header.par.php");
include("partials/nav.par.php");
include("partials/script.par.php");
?>
<div class="col-md-6">
    <form action="" method="POST">
        <h3 class="text-center text-success">Students Section wise</h3>
        <div class="col-md-4 px-0 py-3">
            <select name="section_id" id="section_id" class="form-control" required="required">
                <option value="">Select Section</option>
                <?php
                $sql = "SELECT * FROM section_detail";
                $result = $dbconnect->query($sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<option value='$row[sec_id]'>".$row['sec_name']."</option>";
                }
                ?>

            </select>
        </div>

        <div class="col-md-4 px-2 py-3">
            <input type="submit" class="btn btn-primary" name="fetch_stud_btn" value="Apply">
        </div>
    </form>

    <?php


// get students by section id

function getStudBySecId($dbconnect,$secid)
{
    $studSecWise = "SELECT * FROM student_detail WHERE student_detail.sec_id = '$secid'";
    $excu = mysqli_query($dbconnect,$studSecWise);
    if(mysqli_num_rows($excu)>0){
        ?>

    <div class="table-responsive table-bordered">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
        while($rows = mysqli_fetch_assoc($excu))
        {
            ?>
                <tr>
                    <td><?php echo $rows['std_id'];?></td>
                    <td><?php echo $rows['std_name'];?></td>
                    <td><a href="mngStudSectWise.php?man=<?php echo $rows['std_id'];?>">Details</a></td>
                    <td><a href="mngStudSectWise.php?remov=<?php echo $rows['std_id'];?>">Remove</a></td>

                </tr>

                <?php
        }
        echo "</tbody></table></div>";
    }
}

// get student by his id
function getStudById($dbconnect,$std_id)
{
    // To load the data from faculty details tbl
        $details = "SELECT std_id,std_name,email,gender,contact,current_sem FROM student_detail WHERE std_id = '$std_id'";
        $outputOfQuery=mysqli_query($dbconnect,$details);
        if($outputOfQuery){
        ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student Id</th>
                                <th>Student Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        while(($row=mysqli_fetch_assoc($outputOfQuery))>0){
                        ?>
                            <tr>
                                <td><?php echo $row['std_id'];?></td>
                                <td><?php echo $row['std_name'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['gender'];?></td>
                                <td><?php echo $row['contact'];?></td>
                                <td><?php echo $row['current_sem'];?></td>
                            </tr>
                            <?php
                        }
                    echo"</tbody>";
                echo "</table>";
            echo "</div>";
        }

}
function removeStudFromSect($dbconnect,$std_id)
{
// default section id is 0
//  set the student section id to 0
        $remvStd = "update student_detail set sec_id = 0 WHERE std_id = '$std_id'";
        $outputOfQuery=mysqli_query($dbconnect,$remvStd);
        if($outputOfQuery){
            echo "<script>alert('Student is remove from the section')</script>";

        }

}

if(isset($_POST['fetch_stud_btn']))
{
    $sect_id =$_POST['section_id'];
    getStudBySecId($dbconnect,$sect_id);

}
else if(isset($_GET['man'])){
    $std_id = $_GET['man'];
    getStudById($dbconnect,$std_id);
}
else if(isset($_REQUEST['remov'])){
    $std_id = $_REQUEST['remov'];
    removeStudFromSect($dbconnect,$std_id);
}

include("partials/footerbrk.php");
include("partials/footer.par.php");
?>