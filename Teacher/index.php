<?php 
    require_once './partials/header.php';
?>
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <?php
                                    $fac_id = $_SESSION['fac_id'];
                                    $sql = "SELECT  `crs_id` FROM `faculty_course_allocation`where fac_id= '$fac_id'";
                                    $result1 = $conn->query($sql);
                                    $total = 0;
                                    $no_of_std=0;
                                    $crs_no=0; 
                                    while($rows1=$result1->fetch_assoc()){
                                        $crs_no++;
                                        $crs_id = $rows1['crs_id'];
                                        $sql2 = "SELECT `percentage` from student_attendance as att inner join student_detail as std inner join faculty_section_allocation as fsa where att.crs_id='$crs_id' and std.sec_id = fsa.sec_id";
                                        $result2 = $conn->query($sql2);
                                        while($rows2 = $result2->fetch_assoc()){
                                            
                                            $total=$total + $rows2['percentage'];
                                            $no_of_std++;
                                            // echo "<br>";
                                        }

                                    }?>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">



                                    <div class="stat-text">
                                        <?php if($total!=0 and $no_of_std!=0){
                                            echo (int)($total/$no_of_std);
                                        }
                                        else{
                                            echo 0;
                                        } ?>%</div>
                                    <div class="stat-heading">Average attendance</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-note2"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">

                                    <div class="stat-text"><span class="count">
                                            <?php echo $crs_no; ?></span></div>
                                    <div class="stat-heading">Number of course</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">

                                    <div class="stat-text"><span class="count">
                                            <?php echo $no_of_std;?></span></div>
                                    <div class="stat-heading">Number of Student</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- /Widgets -->

        <div class="clearfix"></div>
        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Officials</h4>
                        </div>
                        <?php
                            $sql = "SELECT * FROM employee_detail where 1";
                            $result = $conn->query($sql);
                            
                        ?>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="avatar">officials</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $serial_no = 0;
                                        while($rows = $result->fetch_assoc()){
                                            ?>
                                        <tr>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle"
                                                            src="<?php echo "images/".$rows['pro_pic']; ?>" alt=""></a>
                                                </div>
                                            </td>
                                            <td> <?php echo $rows['emp_id'];?></td>


                                            <td> <span class="name">
                                                    <?php echo $rows['emp_name'];?></span> </td>

                                            <td><span class="name"><?php  print $rows['emp_role'];?></span>
                                            </td>
                                            <td>
                                                <span class="badge badge-complete"> <a style="color:black;"
                                                        href="mailto:<?php echo $rows['emp_email']; ?>">Contact</a>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col-lg-8 -->

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-left">

                                <h4 class="card-title box-title">To Do List</h4>
                            </div>
                            <div class="text-right">
                                <a href="index.php?add_plan="><button type="text"
                                        class="btn btn-primary text-right">&nbsp; Add</button></a>
                                <a href="index.php?view_plan="><button type="text"
                                        class="btn btn-primary text-right">&nbsp; View</button></a>
                            </div>

                            <div class="card-content">
                                <div class="todo-list">
                                    <div class="tdl-holder">
                                        <div class="tdl-content">
                                            <?php
                                            if(isset($_GET['view_plan'])){
                                                    $sql ="SELECT * from faculty_lesson_plan where 1";
                                                    $result = $conn->query($sql);
                                                   
                                            ?>
                                            <ul>
                                                <?php
                                                while($rows = $result->fetch_assoc()){
                                                    ?>
                                                <li>
                                                    <label>
                                                        <input type="checkbox"><i class="check-box"></i><span>
                                                            <?php echo $rows['content'] ." ".$rows['crs_id']."(".$rows['time'].")"; ?></span>
                                                        <a href="lesson_plan.php?delete_plan=<?php echo $rows['id'];  ?>"
                                                            class="fa fa-times"></a>

                                                    </label>
                                                </li>
                                                <?php
                                                }
                                            }?>



                                                <?php 
                                                if(isset($_GET['add_plan'])){
                                                    $fac_id = $_SESSION['fac_id'];
                                                ?>
                                                <div>
                                                    <form method="post" action="lesson_plan.php">
                                                        <div class="form-group" hidden>

                                                            <input type="text" name="fac_id" class="form-control"
                                                                id="fac_id" value="<?php echo $fac_id ; ?>">
                                                        </div>
                                                        <div class=" form-group">

                                                            <select name="crs_id" id="" class="form-control" required>
                                                                <option value="">Select Course</option>
                                                                <?php
                                                            $fac_id = $_SESSION['fac_id'];
                                                            $sql11 = "SELECT * FROM faculty_course_allocation where `fac_id`='$fac_id'";
                                                            $result11 = $conn->query($sql11);
                                                            while($rows11=$result11->fetch_assoc()){?>

                                                                <option value="<?php echo $rows11['crs_id'] ?>">
                                                                    <?php echo  $rows11['crs_id']; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">

                                                            <input required type="time" name="time"
                                                                placeholder="12:12 60" class="form-control" id="time">
                                                        </div>
                                                        <div class="form-group">

                                                            <textarea required class="form-control" name="content" id=""
                                                                cols="10" rows="3"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" name="submit" class="form-control"
                                                                style="background-color:maroon; color:white;"
                                                                value="submit">
                                                        </div>
                                                    </form>
                                                </div>
                                                <?php
                                                }
                                               
                                                ?>




                                            </ul>
                                        </div>
                                    </div>
                                </div> <!-- /.todo-list -->
                            </div>
                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                </div> <!-- /.col-md-4 -->
            </div>
        </div>
        <!-- /.orders -->




    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
<div class="clearfix"></div>
<!-- Footer -->
<?php
        require_once './partials/footer.php'
      ?>