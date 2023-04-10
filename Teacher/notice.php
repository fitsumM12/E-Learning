<?php
require_once './partials/header.php';
?>
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">


                                <div class="col-md-12">

                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary">
                                            <i><a style="color:black;" href="notice.php?AddNotice=">Add
                                                    Notice</a></i></button>
                                        <button type="button" class="btn btn-primary">
                                            <i><a style="color:black;" href="notice.php?MyNotice=">My
                                                    Notice</a< /i></button> <button type="button"
                                            class="btn btn-primary">
                                            <i><a style="color:black;" href="notice.php?View=">View
                                                    All</a></i></button>
                                    </div>

                                </div>


                            </div>
                            <br>
                            <div class="row">

                                <?php
                                    if(isset($_GET['View'])){
                                    $sql = "SELECT * FROM notice";
                                    $result = $conn->query($sql);
                                    while($rows = $result->fetch_assoc()){
                                    $id = $rows['id'];
                                    $from = $rows['noticer_email'];
                                    $message = $rows['message'];
                                    $date = $rows['ann_date'];
                                    $sch_id = $rows['sch_id'];
                                    $dpt_id = $rows['dpt_id'];
                                    $sec_id = $rows['sec_id'];
                                    ?>
                                <div class="col-md-3" style="border:1px solid; margin:10px; border-radius:5px; ">
                                    <div class="text-right">
                                        <?php
                                        echo "Date:".$date;
                                        echo "<br>";
                                        echo "From:"." ".$from;
                                    ?>
                                    </div>
                                    <div class="text-center">
                                        <blockquote style="text-align:justify;text-justify:inter-word;">
                                            <?php
                                            echo "<br>";
                                            echo $message;
                                            ?>
                                        </blockquote>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-info">
                                            <i>
                                                <a style="color:black;" href="mailto:<?php echo $from;?>">Send
                                                    email</a>
                                            </i>
                                        </button>

                                    </div>
                                </div>
                                <?php }}?>

                            </div>
                            <div class="row">
                                <div class="col-md-8">

                                    <?php
                                    if(isset($_GET['AddNotice'])){
                                        ?>
                                    <div class="text-center"> <b>Add Notice</b>
                                    </div>


                                    <!-- add notice begin -->
                                    <form method="GET" enctype="multipart/form-data" id="custom-edit">
                                        <div class="form-group">
                                            <?php 
                                                $fac_id = $_SESSION['fac_id'];
                                                $sql = "SELECT fac_email FROM faculty_detail where fac_id = '$fac_id';";
                                                $res = $conn->query($sql);
                                                $rows= $res->fetch_assoc();
                                                $fac_email =$rows['fac_email'];
                                                echo "<input type='email' value='$fac_email' name='noticer_email' hidden  class='form-control'>";
                                                ?>

                                        </div>
                                        <div class="form-group">
                                            <label>Message:</label>

                                            <textarea name="message" class="form-control" required cols="30" rows="10">

                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Date:</label>
                                            <input type="date" name="ann_date" required class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <?php
                                            $fac_id = $_SESSION['fac_id'];
                                            $sql1 ="SELECT * FROM `dpt_detail` INNER JOIN faculty_section_allocation as fsa INNER JOIN faculty_course_allocation as fca INNER JOIN dpt_program as dp INNER JOIN section_detail as sd
                                            where fca.fac_crs_id=fsa.fac_crs_id and fca.fac_id ='$fac_id' and fsa.sec_id=sd.sec_id and sd.dpt_prg_id=dp.dpt_prg_id and dp.dpt_id=dpt_detail.dpt_id;";
                                            
                                            $output = $conn->query($sql1);
                                            ?>
                                            <label>Department:</label>
                                            <select name="dpt_id" id="" class="form-control">
                                                <?php
                                                while($rows=$output->fetch_assoc()){?>

                                                <option value="<?php echo $rows['dpt_id'] ?>">
                                                    <?php echo $rows['dpt_name'] ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <?php
                                            
                                            $fac_id=$_SESSION['fac_id'];
                                            $sql22="SELECT * FROM section_detail as sd INNER JOIN faculty_section_allocation as fsa INNER JOIN faculty_course_allocation as fca where fca.fac_crs_id=fsa.fac_crs_id and fca.fac_id ='$fac_id' and fsa.sec_id=sd.sec_id;";
                                            $result333 = $conn->query($sql22);
?>
                                            <label>Section:</label>
                                            <select name="sec_id" class="form-control">
                                                <?php
                                                while($rowws = $result333->fetch_assoc()){
                                                    ?>

                                                <option value="<?php echo $rowws['sec_id'] ?>">
                                                    <?php echo $rowws['sec_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">

                                            <button type="button" class="btn btn-info">
                                                <input type="submit" name="Add" value="Add">
                                            </button>
                                        </div>
                                    </form>
                                    <?php
                                    }
                                    ?>





























                                    <?php
                                    if(isset($_GET['Edit'])){
                                        // session_start();
                                        $_SESSION['id']= $_GET['Edit'];
                                        
                                        ?>
                                    <div class="text-center"> <b>Add Notice</b>
                                    </div>


                                    <!-- add notice begin -->
                                    <form method="GET" enctype="multipart/form-data" id="custom-edit">
                                        <div class="form-group">
                                            <?php 
                                                $fac_id = $_SESSION['fac_id'];
                                                $sql = "SELECT fac_email FROM faculty_detail where fac_id = '$fac_id';";
                                                $res = $conn->query($sql);
                                                $rows= $res->fetch_assoc();
                                                $fac_email =$rows['fac_email'];
                                                echo "<input type='email' value='$fac_email' name='noticer_email' hidden class='form-control'>";
                                                ?>

                                        </div>
                                        <div class="form-group">
                                            <label>Message:</label>

                                            <textarea name="message" class="form-control" value="" required cols="30"
                                                rows="10">

                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Date:</label>
                                            <input type="date" name="ann_date" required class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <?php
                                            $fac_id = $_SESSION['fac_id'];
                                            $sql1 ="SELECT * FROM `dpt_detail` INNER JOIN faculty_section_allocation as fsa INNER JOIN faculty_course_allocation as fca INNER JOIN dpt_program as dp INNER JOIN section_detail as sd
                                            where fca.fac_crs_id=fsa.fac_crs_id and fca.fac_id ='$fac_id' and fsa.sec_id=sd.sec_id and sd.dpt_prg_id=dp.dpt_prg_id and dp.dpt_id=dpt_detail.dpt_id;";
                                            
                                            $output = $conn->query($sql1);
                                            ?>
                                            <label>Department:</label>
                                            <select name="dpt_id" id="" class="form-control">
                                                <?php
                                                while($rows=$output->fetch_assoc()){?>

                                                <option value="<?php echo $rows['dpt_id'] ?>">
                                                    <?php echo $rows['dpt_name'] ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <?php
                                            
                                            $fac_id=$_SESSION['fac_id'];
                                            $sql22="SELECT * FROM section_detail as sd INNER JOIN faculty_section_allocation as fsa INNER JOIN faculty_course_allocation as fca where fca.fac_crs_id=fsa.fac_crs_id and fca.fac_id ='$fac_id' and fsa.sec_id=sd.sec_id;";
                                            $result333 = $conn->query($sql22);
?>
                                            <label>Section:</label>
                                            <select name="sec_id" class="form-control">
                                                <?php
                                                while($rowws = $result333->fetch_assoc()){
                                                    ?>

                                                <option value="<?php echo $rowws['sec_id'] ?>">
                                                    <?php echo $rowws['sec_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">

                                            <button type="button" class="btn btn-info">
                                                <input type="submit" name="update" value="update">
                                            </button>
                                        </div>
                                    </form>
                                    <?php
                                    }
                                    ?>


                                    <?php
                                    // insert my own notice
                                    if(isset($_GET['update'])){
                                        $id =$_SESSION['id'];
                                        $noticer_email = $_GET['noticer_email'];
                                        $message = $_GET['message'];
                                        $ann_date = $_GET['ann_date'];
                                        $dpt_id = $_GET['dpt_id'];
                                        $sec_id = $_GET['sec_id'];
                                        $sql = "UPDATE `notice` set `noticer_email`='$noticer_email', `dpt_id`='$dpt_id', `sec_id`='$sec_id', `ann_date`='$ann_date', `message`='$message' where id = $id";
                                        $result = $conn->query($sql);
                                        if($result){
                                            
                                            echo "<script>alert('updated successfully')</script>";
                                        }
                                        else{
                                            echo "Not Announced ".$conn->error;
                                        }
                                    }


                                    ?>


















                                    <?php
                                    // insert my own notice
                                    if(isset($_GET['Add'])){
                                        $noticer_email = $_GET['noticer_email'];
                                        $message = $_GET['message'];
                                        $ann_date = $_GET['ann_date'];
                                        $dpt_id = $_GET['dpt_id'];
                                        $sec_id = $_GET['sec_id'];
                                        $sql = "INSERT INTO `notice`(`noticer_email`, `dpt_id`, `sec_id`, `ann_date`, `message`) VALUES ('$noticer_email','$dpt_id','$sec_id','$ann_date','$message')";
                                        $result = $conn->query($sql);
                                        if($result){
                                            
                                            echo "<script>alert('uploaded successfully')</script>";
                                        }
                                        else{
                                            echo "Not Announced ".$conn->error;
                                        }
                                    }


                                    ?>
                                </div>
                            </div>








                            <div class="row">

                                <?php
                                    if(isset($_GET['MyNotice'])){
                                    $sql = "SELECT * FROM notice";
                                    $result = $conn->query($sql);
                                    while($rows = $result->fetch_assoc()){
                                    $id = $rows['id'];
                                    $from = $rows['noticer_email'];
                                    $message = $rows['message'];
                                    $date = $rows['ann_date'];
                                    $sch_id = $rows['sch_id'];
                                    $dpt_id = $rows['dpt_id'];
                                    $sec_id = $rows['sec_id'];
                                         ?>
                                <div class="col-md-3" style="border:1px solid; margin:10px; border-radius:5px; ">
                                    <div class="text-right">
                                        <?php
                                    echo "Date:".$date;
                                    echo "<br>";
                                    echo "From:"." ".$from;
                                         ?>
                                    </div>
                                    <div class="text-center">
                                        <blockquote style="text-align:justify;text-justify:inter-word;">
                                            <?php
                                        echo "<br>";
                                        echo $message;
                                    ?>
                                        </blockquote>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-success">
                                            <i><a style="color:black;"
                                                    href="notice.php?Edit=<?php echo $id; ?>">Edit</a></i></button>
                                        <button type="button" class="btn btn-info">
                                            <i><a style="color:black;"
                                                    href="notice.php?Delete=<?php echo $id; ?>">Delete</a></i></button>

                                    </div>
                                </div>
                                <?php }}?>
                                <?php
                                    // insert my own notice
                                    if(isset($_GET['Delete'])){
                                        $id= $_GET['Delete'];
                                        $sql = "DELETE FROM `notice` where id=$id";
                                        $result = $conn->query($sql);
                                        if($result){
                                            echo "<script>alert('deleted successfully')</script>";
                                        }
                                        else{
                                            
                                        }
                                    }


                                    ?>

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
<div class=" clearfix"></div>
<!-- Footer -->
<?php
        require_once './partials/footer.php';
      ?>