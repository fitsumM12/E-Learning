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
                        <h4 class="box-title">Student Feedback</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-body">
                                <div id="feedback">
                                    <?php
                                    studentFeedback($conn);
                                   ?>

                                </div>
                                <button id="btn-for-feedback" onclick="display();">Read More Feedback</button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card-body">
                                <div class="progress-box progress-1">
                                    <h4 class="por-title">Feedback Category</h4>
                                </div>
                                <div class="progress-box progress-2">
                                    <div class="por-txt">
                                        <button>Grade</button>
                                    </div>
                                </div>
                                <div class="progress-box progress-2">
                                    <div class="por-txt">
                                        <button>Attendance</button>
                                    </div>
                                </div>
                                <div class="progress-box progress-2">
                                    <div class="por-txt">
                                        <button>Others</button>
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

    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
<div class="clearfix"></div>
<!-- Footer -->
<?php
        require_once './partials/footer.php'
      ?>