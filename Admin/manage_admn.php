<?php
include("partials/header.par.php");
include("partials/nav.par.php");
include("partials/script.par.php");
?>
<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group mr-2" role="group" aria-label="First group">
        <a type="submit" class="btn btn-primary" href="manage_admn.php?createadmnbtn" id="createadmnbtn">Add
            Admin</a>
        <a type="submit" class="btn btn-primary" href="manage_admn.php?viewadmnbtn" id="viewadmnbtn">View Admin</a>
    </div>
</div>
<br>
<br>
<!-- view the admin for the university -->
<?php 
if(isset($_REQUEST['viewadmnbtn'])){
       $emp1 = "SELECT * FROM admin_detail";
        $res1 = mysqli_query($dbconnect,$emp1);
        ?>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
            </tr>
        </thead>
        <tbody>

            <?php
        while($row=mysqli_fetch_assoc($res1)){
        ?>
            <tr>
                <td><?php echo $row['admin_fname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['contact']; ?></td>
            </tr>

            <?php     }     ?>
        </tbody>
    </table>
</div>
<?php }
else if(isset($_REQUEST['createadmnbtn'])){ ?>
<div class="contanter-fluid" style="width:50%;">
    <form action="" method="POST" class="form-block" role="form" width="30%">

        <div class="form-group">
            <label class="sr-only" for="">Email</label>
            <select name="hgr_officials" id="hgr_officials" class="form-control" required>
                <option value="">Select Employee</option>
                <?php
                $emp = "SELECT * FROM employee_detail";
                $res = mysqli_query($dbconnect,$emp);
                while($row=mysqli_fetch_assoc($res)){
                    echo"<option value=\"$row[emp_id]\">".$row['emp_name']."</option>";
                }
                ?>

            </select>

        </div><br>

        <div class="form-group">
            <input type="text" class="form-control" id="admnpassword" name="tempopass">
        </div>

        <button type="submit" name="addAdmin_btn" class="btn btn-primary form-control">Submit</button>
    </form>
</div>
<?php
}
include("partials/footerbrk.php");
include("partials/footer.par.php");
?>