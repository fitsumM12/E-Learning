    <?php

    ob_start();
    require_once '../HomePage/includes/session.php';
    require_once '../HomePage/includes/auth.php';
    require_once '../HomePage/includes/crud.php';
 require_once "db.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/elearning/HomePage/includes/db.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/elearning/Admin/includes/auth.php";

     require_once $_SERVER['DOCUMENT_ROOT']."/elearning/Admin/includes/university_details.inc.php";
    $unv = new university();
    ?>

    <!doctype html>
    <html class="no-js" lang="">

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>E-Learning</title>
      <meta name="description" content="Ethiopian E-learning platform">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
      <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
      <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
      <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

      <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
      <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
      <!-- // data table -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">

      <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" />

      <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>

      <style>
      #weatherWidget .currentDesc {
        color: #ffffff !important;
      }

      .traffic-chart {
        min-height: 335px;
      }

      #flotPie1 {
        height: 150px;
      }

      #flotPie1 td {
        padding: 3px;
      }

      #flotPie1 table {
        top: 20px !important;
        right: -10px !important;
      }

      .chart-container {
        display: table;
        min-width: 270px;
        text-align: left;
        padding-top: 10px;
        padding-bottom: 10px;
      }

      #flotLine5 {
        height: 105px;
      }

      #flotBarChart {
        height: 150px;
      }

      #cellPaiChart {
        height: 160px;
      }
      </style>
    </head>

    <body>

      <!-- Left Panel -->
      <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
          <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="index.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a>
              </li>
              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user-circle-o" aria-hidden="true"></i> Admins</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-table"></i><a href="manage_admn.php">manage Admins</a></li>

                </ul>
              </li>

              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                    class="fa fa-cogs" aria-hidden="true"></i> Manage System</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-table"></i><a href="university_details.php">University Details</a>
                  </li>
                  <li><i class="fa fa-table"></i><a href="posts.php">Posts</a></li>
                  <li><i class="fa fa-table"></i><a href="post_category.php">Category</a></li>
                  <li><i class="fa fa-bars"></i><a href="post_comment.php">Comments</a></li>
                  <li><i class="fa fa-bars"></i><a href="promotion.php">Promotion</a></li>
                  <li><i class="fa fa-bars"></i><a href="#">About Detail</a></li>

                </ul>
              </li>

              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                    class="fa fa-line-chart" aria-hidden="true"></i> Analytics</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-area-chart" aria-hidden="true"></i> <a href="stats.php">Stats</a>
                  </li>


                </ul>
              </li>

              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i> program</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-puzzle-piece"></i><a href="createProgram.php">Add New Program</a>
                  </li>
                  <li><i class="fa fa-bars"></i><a href="view_programs.php">view programs</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                  School</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-puzzle-piece"></i><a href="manage_school.php">Manage School</a></li>


                </ul>
              </li>
              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                  Department</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="menu-icon fa fa-fort-awesome"></i><a href="manage_department.php">Manage
                      Department</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                    class="fa fa-graduation-cap" aria-hidden="true"></i>
                  Section</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="menu-icon fa fa-fort-awesome"></i><a href="manageSection.php">Manage
                      Section</a></li>

                </ul>
              </li>
              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-users" aria-hidden="true"></i> Teachers</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-puzzle-piece"></i><a href="manage_Teachers.php">Manage Teachers</a>
                  </li>

                </ul>
              </li>
              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-users" aria-hidden="true"></i> Student</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-table"></i><a href="manage_students.php">manage Students</a></li>
                  <li><i class="menu-icon fa fa-fort-awesome"></i><a href="mngStudSectWise.php">Students
                      by section</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                  Courses</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="menu-icon fa fa-fort-awesome"></i><a href="manage_courses.php">Manage
                      Courses</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-calendar" aria-hidden="true"></i> Calender</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <a href="manage_calender.php">Manage
                      Calender</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-money" aria-hidden="true"></i> Payment</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="menu-icon fa fa-line-chart"></i><a href="payment.php">manage Payment
                      Detail</a></li>

                </ul>
              </li>
              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-file" aria-hidden="true"></i> File Managemnet</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-table"></i><a href="file_management.php">File Management</a></li>
                  <li><i class="fa fa-table"></i><a href="#">Student document</a></li>
                  <li><i class="fa fa-bars"></i><a href="#">Employee Document</a></li>
                  <li><i class="fa fa-certificate" aria-hidden="true"></i> <a href="#">Certificates</a>
                  </li>
                </ul>
              </li>

              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-map-marker" aria-hidden="true"></i> Maps</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.php">Google Maps</a></li>
                  <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector
                      Maps</a></li>
                </ul>
              </li>
              <li class="menu-title">Extras</li><!-- /.menu-title -->
              <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                    class="fa fa-globe" aria-hidden="true"></i> Pages</a>
                <ul class="sub-menu children dropdown-menu">
                  <li><i class="menu-icon fa fa-sign-in"></i><a href="../HomePage/index.php">HomE</a></li>
                  <li><i class="menu-icon fa fa-sign-in"></i><a href="#">About us</a></li>
                  <li><i class="menu-icon fa fa-paper-plane"></i><a href="#">Alumni</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </nav>
      </aside>
      <!-- /#left-panel -->
      <!-- Right Panel -->
      <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
          <div class="top-left">
            <div class="navbar-header">
              <?php
                        $log = $unv->getLogo();
                        $logoPath = $log['logo'];
                        ?>
              <a class="navbar-brand" href="./"><img src="images/E-logo.png" alt="Logo" width="60" height="35"></a>

              <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
          </div>
          <div class="top-right">
            <div class="header-menu">
              <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                  <form class="search-form">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                    <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                  </form>
                </div>
                <!-- notification -->

                <?php

                            $counter="SELECT * FROM notice where 1";
                            $rs=mysqli_query($dbconnect,$counter);
                            $i=0;
                            $count;
                            if($rs){
                            ?>
                <div class="dropdown for-notification">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="notification"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="count bg-danger" id="count"></span>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="notification">
                    <p class="red">You have <cite id="count"></cite> Notification</p>
                    <?php
                                // start while loop
                                    while(($row=mysqli_fetch_assoc($rs))>0){
                                    $i=$i+1;
                                    ?>
                    <a class="dropdown-item media" href="#?id=<?php echo $row['not_id'];?>">
                      <p><i class="fa fa-check"></i> <?php echo $row['not_description']; ?></p>
                    </a>

                    <!-- /while loop -->
                    <?php } ?>
                  </div>
                </div>
                <?php
                            }else{
                            $i=0;
                            }
                            ?>
                <script>
                document.getElementById("count").innerHTML = "<?php echo $i; ?>"
                </script>

              </div>
              <?php
                        $msg=" SELECT * FROM `admin_detail` where `admin_id` = $_SESSION[admin_id] ";
                        $rs=mysqli_query($dbconnect,$msg);

                        if($rs){
                        while(($row=mysqli_fetch_assoc($rs))>0){
                                $_SESSION['profile_picture']=$row['profile_picture'];
                                $_SESSION['admin_fname']=$row['admin_fname'];
                                }
                            }
                        ?>
              <script>
              document.getElementById("msgcounter").innerHTML = "<?php echo $unread_msg;?>"
              </script>
              <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <img class="user-avatar rounded-circle" src="<?php echo "images/".$_SESSION['profile_picture'];?>"
                    alt="User Avatar">

                </a>
                <div class="user-menu dropdown-menu">
                  <a class="nav-link" href="#"><i class="fa fa- user"></i><?php echo $_SESSION['admin_fname']; ?></a>
                  <a class="nav-link" href="myprofile.php"><i class="fa fa- user"></i>My Profile</a>
                  <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>
                  <a class="nav-link" href="../HomePage/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                </div>
              </div>

            </div>
          </div>
        </header>