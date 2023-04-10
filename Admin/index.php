<?php
include("partials/header.par.php");
include("partials/nav.par.php");

require_once $_SERVER["DOCUMENT_ROOT"]."/elearning/Admin/tracker.php";
$tra = new tracker($_SERVER['PHP_SELF'],$_SERVER['REMOTE_ADDR'],date('d/m/y'));
$tra->trackAllUsrs();
?>
<div class="container-fluid">
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Search</span>
            <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details"
                class="form-control" />
        </div>
    </div>
</div>

<!-- testing for gelchu -->



<br />
<div id="result"></div>



<!-- Widgets  -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-1">
                        <i class="pe-7s-cash"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text">$<span class="count">23569</span></div>
                            <div class="stat-heading">Revenue</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-2">
                        <i class="pe-7s-cart"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">3435</span></div>
                            <div class="stat-heading">Sales</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-3">
                        <i class="pe-7s-users"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <?php
                                                require_once "includes/dbh.inc.php";
                                                $numbOffac = "SELECT * FROM faculty_detail WHERE emplmntStatus = 'accepted'";
                                                    $i=0;
                                                    $nof=mysqli_query($dbconnect,$numbOffac);
                                                    while($row=mysqli_fetch_assoc($nof))
                                                    {
                                                        $i=$i+1;
                                                    }
                                                ?>

                            <div class="stat-text"><span class="count"><?php echo $i;?></span></div>
                            <div class="stat-heading">Teachers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-4">
                        <i class="pe-7s-users"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <?php

                                                $numbOfstd = "SELECT * FROM student_detail WHERE `status` = 'accepted'";
                                                    $i2=0;
                                                    $nof=mysqli_query($dbconnect,$numbOfstd);
                                                    while($row=mysqli_fetch_assoc($nof))
                                                    {
                                                        $i2=$i2+1;
                                                    }
                                                ?>


                            <div class="stat-text"><span class="count"><?php echo $i2; ?></span></div>
                            <div class="stat-heading">Students</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--  Traffic  -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Traffic </h4>
            </div>
            <div class="row">

                <!-- graph -->
                <div class="col-lg-8">
                    <div class="card-body">
                        <canvas id="TrafficChart"></canvas>
                        <div id="trafficchart" class="trafficchart"></div>
                    </div>
                </div>

                <!--/ graph -->
                <div class="col-lg-4">
                    <div class="card-body">
                        <div class="progress-box progress-1">
                            <h4 class="por-title">Visits</h4>
                            <select name="yr" id="">
                                <option value="">Change Year</option>
                                <?php
                                                    function getYear($dt){
                                                        $start = strlen($dt) - 2;
                                                        $str1 = '';

                                                        for ($x = $start; $x < strlen($dt); $x++) {

                                                            // Appending characters to the new string
                                                            $str1 .= $dt[$x];
                                                        }

                                                        // Print new string
                                                        return $str1;
                                                    }
                                                    $yr=$tra->getYr();
                                                    while($row = mysqli_fetch_assoc($yr)){

                                                        ?>
                                <option value='<?php echo 1;?>'> <a type="submit"
                                        href="index.php?yer='<?php echo 2000+getYear($row['vistime']);?>'"><?php echo 2000+getYear($row['vistime']);?>
                                    </a></option>
                                <?php
                                                    }

                                                    ?>
                            </select>
                            <?php
                                            require_once $_SERVER["DOCUMENT_ROOT"]."/elearning/Admin/tracker.php";
                                            $tra = new tracker($_SERVER['REMOTE_ADDR'],$_SERVER['PHP_SELF'],date('d/m/y: h:m:s'));

                                            $tvisitor=$tra->getTotalVisits();
                                            $unvisitor=$tra->getUnqVisits();
                                            $trgus=$tra->trgUsr();

                                            ?>
                            <div class="por-txt"><?php echo $tvisitor."\tUsers"; ?></div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 40%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-box progress-2">
                            <h4 class="por-title">Bounce Rate</h4>
                            <div class="por-txt">3,220 Users (24%)</div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 24%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-box progress-2">
                            <h4 class="por-title">Unique Visitors</h4>
                            <div class="por-txt">
                                <?php echo $unvisitor."\tUsers(".$tra->averageCal($unvisitor,$tvisitor)."%)"; ?></div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-3" role="progressbar"
                                    style="width: <?php echo $tra->averageCal($unvisitor,$tvisitor);?>%;"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-box progress-2">
                            <h4 class="por-title">Targeted Visitors</h4>
                            <div class="por-txt">
                                <?php echo $trgus."\tUsers(".$tra->averageCal($trgus,$tvisitor)."%)"; ?></div>

                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-4" role="progressbar"
                                    style="width: <?php echo $tra->averageCal($trgus,$tvisitor);?>%;" aria-valuenow="90"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div> <!-- /.card-body -->
                </div>
            </div> <!-- /.row -->
            <div class="card-body"></div>
        </div>
    </div><!-- /# column -->
</div>
<!--  /Traffic -->


<div class="clearfix"></div>
<!-- Orders -->
<div class="orders">
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Courses</h4>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <?php
                                        $emp="SELECT * FROM course_detail limit 5";
                                        $res=mysqli_query($dbconnect,$emp);
                                        if(mysqli_num_rows($res)>0){
                                        $n=0;
                                        ?>
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Course Id</th>
                                    <th>course Name</th>
                                    <th>Credit Hr</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            while($rows=mysqli_fetch_assoc($res))
                                            {
                                                $n=$n+1;
                                                ?>

                                <tr>
                                    <td class="serial"><?php echo $n; ?>.</td>

                                    <td> <span class="name"><?php echo $rows['crs_id']; ?></span> </td>
                                    <td> <span class="product"><?php echo $rows['crs_name']; ?></span> </td>
                                    <td><span class="count"><?php echo $rows['crs_credit']; ?></span></td>
                                </tr>

                                <?php
                                            }
                                                }

                                                ?>
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->

        <div class="col-xl-4">
            <div class="row">
                <div class="col-lg-6 col-xl-12">
                    <div class="card br-0">
                        <div class="card-body">
                            <div class="chart-container ov-h">
                                <div id="flotPie1" class="float-chart"></div>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>

                <div class="col-lg-6 col-xl-12">
                    <div class="card bg-flat-color-3  ">
                        <div class="card-body">
                            <h4 class="card-title m-0  white-color ">August 2018</h4>
                        </div>
                        <div class="card-body">
                            <div id="flotLine5" class="flot-line"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.col-md-4 -->
    </div>
</div>
<!-- /.orders -->


<?php
include("partials/footer.par.php");
include("partials/script.par.php");
?>