<?php
include_once "partials/head.php";
include_once "includes/php.inc.php";
include_once "includes/db.inc.php";
$result= FacultyDetail($conn);
?>


<body>
  <!-- ////////////////////////////////////////////// -->
  <!-- left panel or the faculty menu option area -->
  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">

          <li>
            <a href="index.php"> <i class="menu-icon fa fa-th"></i>Dashboard</a>
          </li>
          <li>
            <a href="googleClassroom.php"> <i class="menu-icon fa fa-th"></i>Classroom</a>
          </li>
          <li>
            <a href="manage_student.php"> <i class="menu-icon fa fa-list-alt"></i>Manage Student</a>
          </li>
          <li>
            <a href="attendance.php"> <i class="menu-icon fa fa-users" aria-hidden="true"></i>Student
              Attendance</a>
          </li>
          <li>
            <a href="mark.php"> <i class="menu-icon fa fa-check-square"></i>Student Marks</a>
          </li>
          <li>
            <a href="student_activity.php"> <i class="menu-icon fa fa-file"></i>Student Activities</a>
          </li>
          <li>
            <a href="material.php"> <i class="menu-icon fa fa-desktop"></i>Manage Materials</a>
          </li>
          <li>
            <a href="student_exam.php"> <i class="menu-icon fa fa-desktop"></i>Examination</a>
          </li>
          <li>
            <a href="mentee.php"> <i class="menu-icon fa fa-list"></i>List of Mentee</a>
          </li>
          <li>
            <a href="calendar.php"> <i class="menu-icon fa fa-calendar"></i>Calendar</a>
          </li>
          <li>
            <a href="student_feedback.php"> <i class="menu-icon fa fa-comments"></i>Feedbacks</a>
          </li>
          <li>
            <a href="officials.php"> <i class="menu-icon fa fa-users"></i>Designated Officials</a>
          </li>

          <li>
            <a href="account.php"> <i class="menu-icon fa fa-cog"></i>Accounts</a>
          </li>
          <li>
            <a href="notice.php"> <i class="menu-icon fa fa-bars"></i>Notice</a>
          </li>

        </ul>
      </div>
    </nav>
  </aside>
  <!-- /#left-panel -->
  <!-- ////////////////////////////////////////////// -->


  <!-- Right Panel -->
  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
      <div class="top-left">
        <div class="navbar-header">
          <!-- <a class="navbar-brand" href="./">Teacher DB</a> -->
          <a class="navbar-brand" href="./"><img src="images/logo.jpeg" style="height:35px; border-radius:10px;"
              alt="Logo"></a>
          <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
      </div>
      <div class="top-right">
        <div class="header-menu">
          <div class="header-left">

            <button class="search-trigger"><i class="fa fa-search"></i></button>
            <div class="form-inline">
              <!--  search optionn hereunder-->
              <form class="search-form">
                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
              </form>
            </div>




            <?php
                                $fac_id = $_SESSION['fac_id'];
                                $sql = "SELECT * FROM notice where 1;";
                                $result22 = $conn->query($sql);
                                $no_of_rows = $result22->num_rows;

                                $sql33= "SELECT * FROM student_feedback where fac_id='$fac_id';";
                                $result33= $conn->query($sql33);
                                $no_of_rows33= $result33->num_rows; 
                                $no_of_rows = $no_of_rows+$no_of_rows33;                                 
                               ?>




            <!-- notification page to be implemented -->
            <div class="dropdown for-notification">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell"></i>
                <span class="count bg-danger"><?php  echo $no_of_rows;?>
                </span>
              </button>
              <div class="dropdown-menu" aria-labelledby="notification">
                <p class="red">You have <?php  echo $no_of_rows;?> Notification</p>

                <?php
                                    while($rows = $result22->fetch_assoc()){
                                        ?>
                <a class="dropdown-item media" href="notice.php?View=">
                  <i class="fa fa-check"></i>
                  <p><?php echo  substr($rows['message'],0,30);  ?></p>
                </a>
                <?php
                                    }
                                ?>

                <?php
                                    while($rows33= $result33->fetch_assoc()){
                                        ?>
                <a class="dropdown-item media" href="student_feedback.php">
                  <i class="fa fa-check"></i>
                  <p><?php echo  substr($rows33['message'],0,30);  ?></p>
                </a>
                <?php
                                    }
                                ?>


              </div>
            </div>



          </div>
          <!-- user profile page to be implemented -->
          <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <img class="user-avatar rounded-circle" style="width:55px;height:45px;"
                src="images/<?php echo $result['pro_pic']; ?>" alt="user">
            </a>

            <div class="user-menu dropdown-menu">
              <a class="nav-link" href="viewProfile.php"><i class="fa fa- user"></i>My Profile</a>
              <!-- <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a> -->

              <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
            </div>
          </div>

        </div>
      </div>
    </header>
    <!-- /#header -->