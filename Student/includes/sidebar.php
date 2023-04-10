<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
            <!-- <li class="active">
                 <button  class="btn btn-primary bg_color" onclick="changeColor();">Change color</button>
            </li> -->
            <?php
            if(isset($_SESSION['email'])){  ?>


                <li class="active">
                    <a href="index.php"><i class="menu-icon fa fa-laptop"></i><?php echo $username;?></a>
                </li>
            <?php }else{ ?>
            
                <li class="active">
                    <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                </li>
             <?php }  ?>

                <!-- <li class="menu-title">UI elements</li> /.menu-title --> 
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>CLASSROOM</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><i class="fa fa-puzzle-piece"></i><a href="classroom.php"><?php echo "SECTION(".$result['sec_name'].")" ; ?></a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="timetable.php">Timetable</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="subject.php">subjects</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="allotedTeacher.php">Teachers</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="student_list.php">Students</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="mark.php">Marks</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="view_mentor.php">View Mentors</a></li>
                    </ul>
                </li>
 
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Exam</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="viewExam.php">View Exam</a></li>

                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Activity</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="assignment.php">Assighment</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="project.php">Project</a></li>
                    </ul>
                </li>

                <li class="menu-title"></li><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Attendance</a>
                     <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="viewAttendance.php">View Attendance</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="feedback.php">Feedback</a></li>
                     </ul> 
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Materail</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="note.php">Notes</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="video.php">Videos</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="previousExam.php">Pre-exam</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Calendar</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="academic_calendar.php">accademic calendar</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="exam_schedule.php">Exam calander</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="event.php">Event calander</a></li>
                    </ul>
                </li>

                <li>
                    <a href="gradeReport.php"> <i class="menu-icon fa fa-th"></i>Grade Report</a>
                </li>
                <li>
                    <a href="event.php"> <i class="menu-icon fa fa-th"></i>Event Set</a>
                </li>
                <li>
                    <a href="displayNotice.php"> <i class="menu-icon fa fa-th"></i>Notice </a>
                </li>

                 <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Contact</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="FAQ.php">FAQ</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="view_mentor.php">Help desk</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="feedback.php">fedback</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>account</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="viewProfile.php?id=<?php echo $_SESSION['email'] ?>">view account</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="editProfile.php?id=<?php echo $_SESSION['email'];?>">update account</a></li>
                        <li><i class="menu-icon fa fa-th"></i>
                        <a href="index.php" onclick="confirm('you should clear school fee before leaving')">Delete account</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Payments</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="../stripe-payment/index.php">make payments</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="pendingFee.php">pending pyments</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="paymentHistory.php">payment history</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>View Address</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                        <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="../HOmePage/index.php">Homepage</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="../HomePage/contact.php">Contact US</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="../HomePage/about.php">About US</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="https://www.facebook.com/Temamhash">Facebook PAge</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</aside>