<?php
require_once './partials/header.php';
?>
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

        <!--  Traffic  -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">


                                <div class="col-md-7">
                                    <!-- VIEW STUDENT LIST -->
                                    <?php
                                    if(isset($_GET['View']))
                                    {?>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead id="custom-edit">
                                                <tr>
                                                    <th></th>
                                                    <th>Student ID</th>
                                                    <th>Student Name</th>
                                                    <th>Action</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sec_id = $_GET['sec_id'];
                                                $sql = "select * from student_detail where sec_id = $sec_id";
                                                $result = $conn->query($sql);
                                                 while($rows = $result->fetch_assoc())
                                                {
                                                $std_id = $rows['std_id'];
                                                $std_name = $rows['std_name'];
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $std_id ?></td>
                                                    <td><?php echo $std_name ?></td>
                                                    <td>
                                                        <div class="text-center">
                                                            <?php echo"<a href='mentee.php?View=&readmore=&sec_id=$sec_id&std_id=$std_id'><button type='button'
                                                                class='btn btn-primary'>Readmore</button> </a>";?></a>


                                                        </div>

                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div>



                                </div>
                                <div class="col-md-5">
                                    <form name="form1">
                                        <select id="custom-course" name="select" size=="1" class=" form-control
                                            form-control-lg" onchange="selectedOption(this.form);">
                                            <option><a href="#" selected="true">Select Section</a></option>
                                            <?php
                                                $fac_id =$_SESSION['fac_id'];
                                                $sql = "SELECT sec_id from section_mentor_list where fac_id = '$fac_id'";
                                                $result= $conn->query($sql);
                                                while($rows=$result->fetch_assoc()){
                                                    $sec_id = $rows['sec_id'];
                                                      ?>
                                            <option value="<?php echo "mentee.php?View=&sec_id=$sec_id";?>">
                                                <?php echo $sec_id;?>
                                            </option>
                                            <?php
                                        }?>
                                        </select>
                                    </form>
                                    <br>
                                    <br>
                                    <br>

                                    <?php if(isset($_GET['readmore'])){
                                    $std_id = $_GET['std_id'];
                                    $sql = "SELECT * from student_detail where std_id='$std_id'";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <div style="border:0.5px solid; border-radius:5px; padding:5px;">
                                        <div class="form-group">
                                            <div class="text-center">Student Detail</div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <pre>Student ID:    <i><?php echo $row['std_id']; ?></i></pre>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <pre>Student Name:    <i><?php echo $row['std_name']; ?></i></pre>
                                            </label>

                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <pre>Student Email:    <i><?php echo $row['email']; ?></i></pre>
                                            </label>

                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <pre>Contact:    <i><?php echo $row['contact']; ?></i></pre>
                                            </label>

                                        </div>
                                    </div>
                                    <?php
                                    } ?>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /.row -->

        </div>
    </div><!-- /# column -->
</div>
<!--  /Traffic -->
<!-- /.content -->
<div class="clearfix"></div>
<!-- Footer -->
<?php
        require_once './partials/footer.php'
      ?>