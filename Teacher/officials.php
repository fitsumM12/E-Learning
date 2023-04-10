<?php 
    require_once './partials/header.php';
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="card-body">
                                <div class="row">
                                    <?php
                                        $fac_id = $_SESSION['fac_id'];
                                        $sql ="SELECT dpt_detail.dpt_id from dpt_detail inner join dpt_program on dpt_detail.dpt_id = dpt_program.dpt_id inner join section_detail on dpt_program.dpt_prg_id=section_detail.dpt_prg_id inner join faculty_section_allocation on section_detail.sec_id=faculty_section_allocation.sec_id inner join faculty_course_allocation on faculty_course_allocation.fac_crs_id=faculty_section_allocation.fac_crs_id where faculty_course_allocation.fac_id = '$fac_id' limit 1";
                                        $result = $conn->query($sql);
                                        $rows = $result->fetch_assoc();
                                        $dpt_id =$rows['dpt_id'];
                                        $sql = "SELECT * FROM employee_detail where dpt_id= '$dpt_id' ";
                                        $result = $conn->query($sql);
                                        while($rows = $result->fetch_assoc()){
                                            $emp_name = $rows['emp_name'];
                                            $emp_email = $rows['emp_email'];
                                            $emp_contact = $rows['emp_contact'];
                                            $emp_role = $rows['emp_role'];
                                            $pro_pic =$rows['pro_pic'];
                                            ?>

                                    <div class="col-md-6">
                                        <div class="text-center" style=" margin:5px;padding:5px;">
                                            <div class="text-center">
                                                <img width="200" height="200" src="images/<?php echo $pro_pic   ?>"
                                                    alt=""><br>
                                            </div>
                                            Name: <i><?php echo $emp_name   ?></i><br>
                                            Email: <i><?php echo $emp_email  ?></i><br>
                                            Contact: <i><?php echo $emp_contact  ?></i><br>
                                            Position: <i><?php echo $emp_role  ?></i><br>
                                            <div class=" text-cneter">
                                                <a style="color:black;" href="mailto:<?php echo $emp_email; ?>"><button
                                                        type='button' class='btn btn-primary'>contact</button></a>


                                                <a style="color:black;" href=""><button type='button'
                                                        class='btn btn-primary'>read more</button></a>

                                            </div>

                                        </div>
                                    </div>

                                    <?php
                                        }?>



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