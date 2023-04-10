<?php 
    require_once './partials/header.php';
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12" id="custom-head">
                            <div class="row">
                                <!-- section to select the course for the faculty -->
                                <div class="col-md-6">
                                    <form name="form1">
                                        <select id="custom-course" name="select" size="1" class=" form-control
                                            form-control-lg" onchange="selectedOption(this.form);">
                                            <option><a href="#">Select Course</a></option>
                                            <?php
                                            $result = $operation->Mycourse($conn);
                                            while($temp = $result->fetch_assoc()){
                                                $crs_id = $temp['crs_id'];
                                                $sql2 = "SELECT crs_name from course_detail where crs_id = '$crs_id'";
                                                $result2= $conn->query($sql2);
                                                $crs_name = implode(" ", $result2->fetch_assoc());     
                                              ?>
                                            <option
                                                value="<?php echo "student_exam.php?search_course=&crs_id=$crs_id";?>">
                                                <?php echo $crs_name;?>
                                            </option>
                                            <?php
                                        }?>
                                        </select>
                                    </form>
                                </div>
                                <!-- section to select the class for the specified course -->
                                <div class="col-md-6">
                                    <form name="form1">
                                        <select id="custom-course" name="select" size="1" class=" form-control
                                            form-control-lg" onchange="selectedOption(this.form);">
                                            <option><a href="#">Select Section</a></option>
                                            <?php
                                             if(isset($_GET['search_course']))
                                             {           
                                                 $fac_id = $_SESSION['fac_id'];
                                                 $crs_id = $_GET['crs_id'];
                                                 $_SESSION['crs_id'] = $crs_id;
                                                 $result = $operation->MyCourseAllocationId($crs_id, $conn);
                                                 $fac_crs_id = implode(" ",$result->fetch_assoc());
                                                 $result =$operation->Mysection($fac_crs_id, $conn);
                                                 while($rows = $result->fetch_assoc()){
                                                     $sec_id =$rows['sec_id'];
                                                     ?>
                                            <option
                                                value="<?php echo "student_exam.php?search_section=&sec_id=$sec_id";?>">
                                                <?php echo $sec_id;?>
                                            </option>
                                            <?php }} ?>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- -->
                    </div>
                    <!-- //selct course and section -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                <div class="row">
                                    <?php
                                    if(isset($_GET['search_section']))
                                    {
                                        if(isset($_GET['message'])){
                                            $message = $_GET['message'];
                                            echo"<script>alert($message);</script>";
                                            }
                                        $fac_id = $_SESSION['fac_id'];
                                        $sec_id = $_GET['sec_id'];
                                        $crs_id = $_SESSION['crs_id'];
                                        $sql = "select * from exam where crs_id = '$crs_id' and sec_id= $sec_id";
                                        $result = $conn->query($sql);
                                    ?>
                                    <!-- view of the activity details for specific section -->
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <div class="text-right">

                                                <button type="button" class="btn btn-primary">
                                                    <i>
                                                        <?php echo"<a href='student_exam.php?upload=&crs_id=$crs_id&sec_id=$sec_id' style='color:black'>Upload New</a>";?></i></button>
                                            </div>
                                            <pre><h3><i class='text-info text-center'>click on status to activate or deactivate exam</i></h3></pre>
                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                style="font-size:12px;">
                                                <thead id="custom-edit">
                                                    <tr>
                                                        <th><i>Exam Type</i></th>
                                                        <th><i>Start Date</i></th>
                                                        <th><i>End Date</i></th>
                                                        <th><i>Status</i></th>
                                                        <th><i>Exam File</i></th>
                                                        <th><i>Exam_link</i></th>
                                                        <th colspan="3"><i>Action</i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    while($rows = $result->fetch_assoc()){
                                                        $id = $rows['exam_id'];
                                                        $sec_id = $rows['sec_id'];
                                                        $link =$rows['exam_link'];
                                                        $exam_file =$rows['exam_file'];
                                                        $exam_status = $rows['exam_status'];
                                                       ?>
                                                    <tr>
                                                        <td><?php echo $rows['exam_name']  ?></td>
                                                        <td><?php echo $rows['start_date']  ?></td>
                                                        <td><?php echo $rows['end_date']  ?></td>
                                                        <td><a href="manage_exam.php?status=<?php echo $id; ?>&sec_id=<?php echo $sec_id; ?>"
                                                                class="btn btn-primary btn-sm"><?php echo $exam_status;  ?></a>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" style="width:120px;"
                                                                    class="btn btn-secondary">
                                                                    <i>
                                                                        <?php echo"<a  style='color:black;' href='../upload/$exam_file' target='_blank'>View File</a>";?></i></button>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" style="width:120px;"
                                                                    class="btn btn-secondary">
                                                                    <i>
                                                                        <?php echo"<a  style='color:black;' href='$link' target='_blank'>View a link</a>";?></i></button>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" style="width:120px;"
                                                                    class="btn btn-success">
                                                                    <i>
                                                                        <?php echo"<a style='color:black;' href='student_exam.php?edit=$id'>Edit</a>";?></i></button>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" class="btn btn-danger"
                                                                    style="width:120px;">
                                                                    <i>
                                                                        <?php echo"<a style='color:black;' href='manage_exam.php?delete=$id&sec_id=$sec_id'>Delete</a>";?></i></button>
                                                            </div>


                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" style="width:120px;" class=" btn
                                                                    btn-secondary">
                                                                    <i>
                                                                        <?php echo"<a style='color:black;' href='student_exam.php?response={$id}&sec_id=$sec_id'>Response</a>";?></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                     }?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>


                                <!-- student response  -->
                                <div class="row">
                                    <?php
                                    if(isset($_GET['response']))
                                    {
                                        $sec_id=$_GET['sec_id'];
                                        $exam_id = $_GET['response'];
                                        $sql = "SELECT * FROM `exam_response` WHERE `exam_id`='$exam_id'";
                                        $result = $conn->query($sql);
                                    ?>
                                    <!-- view of the mark details for specific section -->
                                    <div class="col-md-12">
                                        <div class="table-responsive">

                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                style="font-size:12px;">
                                                <thead id="custom-edit">
                                                    <tr>
                                                        <th><i>Student ID</i></th>
                                                        <th><i>Date Time</i></th>
                                                        <th><i>Status</i></th>
                                                        <th><i>Response File</i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    while($rows = $result->fetch_assoc()){
                                                        $id = $rows['id'];
                                                        $std_id = $rows['std_id'];
                                                        $sub_date = $rows['date_time'];
                                                        $file=$rows['response']; 
                                                       ?>
                                                    <tr>
                                                        <td><?php echo $std_id;  ?></td>
                                                        <td><?php echo $sub_date;  ?></td>
                                                        <td>
                                                            <div class="text-left">
                                                                <b><?php echo $file; ?></b>
                                                                <button type="button" style="width:120px;" class=" btn
                                                                    btn-secondary">
                                                                    <i>
                                                                        <?php echo"<a style='color:black;' href='manage_exam.php?download={$id}&sec_id=$sec_id'>Download file</a>";?></i></button>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                     }?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card-body">
                                    <!-- modify activity -->
                                    <?php
                                        //modify the section mark
                                        if(isset($_GET['edit'])){
                                            $exam_id = $_GET['edit'];
                                            $row = $activity->get_exam_details($exam_id,$conn);
                                            $sec_id = $row['sec_id'];
                                            $crs_id = $row['crs_id'];
                                            // $link = $row['link'];
                                            $title = $row['exam_name'];
                                            $link = $row['exam_link'];
                                            $allot_date = $row['start_date'];
                                            $sub_date = $row['end_date'];
                                            ?>
                                    <form method="POST" action="manage_exam.php" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <legend id="custom-title"
                                                        style="background:#f1f2f3; text-align:center;border-radius:5px;">
                                                        Modify Exam
                                                    </legend>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>exam ID:</label>
                                                    <input type="text" name="exam_id" value="<?php echo $exam_id; ?>"
                                                        class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Course ID:</label>
                                                    <input type="text" name="crs_id" class="form-control"
                                                        value="<?php echo $crs_id ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Section ID:</label>
                                                    <input type="text" name="sec_id" class="form-control"
                                                        value="<?php echo $sec_id ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>File In PDF:</label>
                                                    <input type="file" name="file"
                                                        accept="application/pdf,application/msword"
                                                        class=" form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Link:</label>
                                                    <input type="text" name="link" class=" form-control"
                                                        value="<?php echo $link; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Exam Type:</label>
                                                    <select type="text" name="title" class="form-control">
                                                        <option value="Quiz">Quiz</option>
                                                        <option value="Mid Exam">Mid Exam</option>
                                                        <option value="Final Exam">Final Exam</option>
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Start Date:</label>
                                                        <input type="date" name="allot_date" class="form-control"
                                                            value="" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Start time:</label>
                                                        <input type="time" name="allot_time" class="form-control"
                                                            value="" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>End Date:</label>
                                                        <input type="date" name="sub_date" class="form-control" value=""
                                                            required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>End time:</label>
                                                        <input type="time" name="sub_time" class="form-control" value=""
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="text-center">
                                                        <button name="modify" type="submit"
                                                            class="btn btn-primary">Save/update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php   }?>
                                    <?php
                                    if(isset($_GET['upload']))
                                    {
                                        $crs_id = $_GET['crs_id'];
                                        $sec_id = $_GET['sec_id'];
                                    ?>
                                    <form method="POST" action="manage_exam.php" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <legend id="custom-title"
                                                        style="background:#f1f2f3; text-align:center;border-radius:5px;">
                                                        Upload New Exam
                                                    </legend>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label>Course ID:</label>
                                                    <input type="text" name="crs_id" class="form-control"
                                                        value="<?php echo $crs_id ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Section ID:</label>
                                                    <input type="text" name="sec_id" class="form-control"
                                                        value="<?php echo $sec_id ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>File In PDF:</label>
                                                    <input type="file" name="file"
                                                        accept="application/pdf,application/msword" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    Exam Link<input type="text" name="link" class=" form-control"
                                                        value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <select type="text" name="title" class="form-control">
                                                        <option value="Quiz">Quiz</option>
                                                        <option value="Mid Exam">Mid Exam</option>
                                                        <option value="Final Exam">Final Exam</option>
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Start Date:</label>
                                                        <input type="date" name="allot_date" class="form-control"
                                                            value="" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Start time:</label>
                                                        <input type="time" name="allot_time" class="form-control"
                                                            value="" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Submission Date:</label>
                                                        <input type="date" name="sub_date" class="form-control" value=""
                                                            required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Submission time:</label>
                                                        <input type="time" name="sub_time" class="form-control" value=""
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="text-center">
                                                        <button name="assign" type="submit"
                                                            class="btn btn-primary">Assign Exam</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <?php } ?>
                                </div>
                            </div>

                        </div> <!-- /.row -->

                    </div>


                </div><!-- /# column -->
            </div>
            <!--  /Traffic -->

        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>


    <!-- Footer -->
    <?php
        require_once './partials/footer.php'
      ?>