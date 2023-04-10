<?php
include("partials/header.par.php");
include("partials/nav.par.php");
require_once $_SERVER["DOCUMENT_ROOT"]."/elearning/Admin/tracker.php";
$wm = new webMetrics();
?>

<div class="clearfix">

</div>




   <br />




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
                    <!-- start -->
                          <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text">$<span class="count">1000</span></div>
                                                <div class="stat-heading">Average Salary</div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                                   <!-- start -->
                          <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text">$<span class="count">20000</span></div>
                                                <div class="stat-heading">Investment</div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                                   <!-- start -->
                          <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text">$<span class="count">1000</span></div>
                                                <div class="stat-heading">Sale</div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
</div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card br-0">
                                        <div class="card-body">
                                            <div class="chart-container ov-h">
                                                <div id="flotPie1" class="float-chart"></div>
                                            </div>
                                        </div>
                                    </div><!-- /.card -->
                                </div>


                                <div class="col-md-6 ">
                                    <div class="card bg-flat-color-3">
                                        <div class="card-body">
                                            <h4 class="card-title m-0  white-color ">April 2021</h4>
                                        </div>
                                         <div class="card-body">
                                             <div id="flotLine5" class="flot-line"></div>

                                         </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tabular representation -->


                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>User Ip</th>
                                            <th>visited page</th>
                                            <th>date</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stmt1 = $wm->getTotalVisits();
                                    while($result=mysqli_fetch_assoc($stmt1)){
                                     ?>
                                        <tr>
                                            <td><?php echo $result['usr_ip'];?></td>
                                            <td><?php echo $result['page'];?></td>
                                            <td><?php echo $result['vistime'];?></td>
                                            <!-- block user -->
                                            <td><button class="btn-warning"><i class="fa fa-ban" aria-hidden="true"></i></button></td>
                                            <td>
                                            <!-- target user -->
                                            <button class="btn-success"><i class="fa fa-bullseye" aria-hidden="true"></i></button></td>

                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>





                   </div>


<?php
include("partials/footerbrk.php");
include("partials/footer.par.php");
include("partials/script.par.php");
?>
