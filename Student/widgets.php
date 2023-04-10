  <!-- class room -->
  <?php
$id = $_SESSION['std_id'];
$result1 = $user->getSection($id);

//course count
$dept = $_SESSION['dp_id'];
$sem = $_SESSION['current_sem'];

$result2 = $user->getCourse($dept,$sem);
$course_count = $result2->rowCount();

//attendance count
$std_id = $_SESSION['std_id'];
                                                                         
$result3 = $user->viewAttendace($std_id);
$count = $result3->rowCount();
$sum=0;
$attendance =0;
while($row = $result3->fetch(PDO:: FETCH_ASSOC)){
    $sum = $sum+$row['percentage'];
    $attendance = $sum/$count;

}
//student count
$sec_id = $_SESSION['sec_id'];
                                        
                                     
$result4 = $user->getStudentList($sec_id);
$student_count = $result4->rowCount();

//exam count
$sec_id = $_SESSION['sec_id'];
$result5 = $user->viewExam($sec_id);
$exam_count = $result5->rowCount();

//activity section
$sec_id = $_SESSION['sec_id'];

$result6 = $user->getAllActivity($sec_id);
$activity_count = $result6->rowCount();

// faculty counter
$sec_id = $_SESSION['sec_id'];
$result7 = $user->getFaculty($sec_id);
$faculty_count = $result7->rowCount();

         

// note section 

$dp_id = $_SESSION['dp_id'];
$sem = $_SESSION['current_sem'];

$result8 = $user->getAllMaterial($dp_id,$sem);
$note_count = $result8->rowCount();


               //  video 

$dp_id = $_SESSION['dp_id'];
$sem = $_SESSION['current_sem'];

$result9 = $user->getAllMaterial($dp_id,$sem);
$video_count = $result9->rowCount();
                                  
?>
  <a href="classroom.php">
      <div class="stat-content">
          <div class="text-left dib">
              <div class="stat-text"><?php echo strtoupper($result1['sec_name']); ?></div>
              <div class="stat-heading">ClassRoom</div>
          </div>
      </div>
      </div>
      </div>
      </div>
      </div>
  </a>
  <!-- course section -->

  <div class="col-lg-3 col-md-6">
      <div class="card">
          <div class="card-body">
              <div class="stat-widget-five">
                  <div class="stat-icon dib flat-color-2">
                      <i class="fa fa-book"></i>
                  </div>
                  <a href="subject.php">
                      <div class="stat-content">
                          <div class="text-left dib">
                              <div class="stat-text"><span class="count"><?php echo $course_count; ?></span></div>
                              <div class="stat-heading">Courses</div>
                          </div>
                      </div>
              </div>
          </div>
      </div>
  </div>
  </a>

  <div class="col-lg-3 col-md-6">
      <div class="card">
          <div class="card-body">
              <div class="stat-widget-five">
                  <div class="stat-icon dib flat-color-3">
                      <i class="pe-7s-browser"></i>
                  </div>
                  <!-- attendance -->
                  <a href="viewAttendance.php">
                      <div class="stat-content">
                          <div class="text-left dib">
                              <div class="stat-text"><span><?php echo $attendance; ?></span></div>
                              <div class="stat-heading">Attendance</div>
                          </div>
                      </div>
              </div>
          </div>
      </div>
  </div>
  </a>

  <div class="col-lg-3 col-md-6">
      <div class="card">
          <div class="card-body">
              <div class="stat-widget-five">
                  <div class="stat-icon dib flat-color-4">
                      <i class="fa fa-graduation-cap"></i>
                  </div>
                  <!-- student list -->
                  <a href="student_list.php">
                      <div class="stat-content">
                          <div class="text-left dib">
                              <div class="stat-text"><span class="count"><?php echo  $student_count;?></span></div>
                              <div class="stat-heading">Students</div>
                          </div>
                      </div>
              </div>
          </div>
      </div>
  </div>
  </div>
  </a>

  <!-- row two -->
  <div class="content">
      <!-- Animated -->
      <div class="animated fadeIn">
          <!-- Widgets  -->
          <div class="row">
              <div class="col-lg-3 col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="stat-widget-five">
                              <div class="stat-icon dib flat-color-1">
                                  <i class="fa fa-check-circle-o"></i>
                              </div>
                              <!-- exam section -->

                              <a href="viewExam.php">
                                  <div class="stat-content">
                                      <div class="text-left dib">
                                          <div class="stat-text"><?php echo $exam_count; ?></div>
                                          <div class="stat-heading">Exam</div>
                                      </div>
                                  </div>
                          </div>
                      </div>
                  </div>
              </div>
              </a>
              <!-- activity section -->


              <div class="col-lg-3 col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="stat-widget-five">
                              <div class="stat-icon dib flat-color-2">
                                  <i class="fa fa-shield"></i>
                              </div>
                              <a href="assignment.php">
                                  <div class="stat-content">
                                      <div class="text-left dib">
                                          <div class="stat-text"><span
                                                  class="count"><?php echo $activity_count; ?></span></div>
                                          <div class="stat-heading">Activity</div>
                                      </div>
                                  </div>
                          </div>
                      </div>
                  </div>
              </div>
              </a>

              <div class="col-lg-3 col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="stat-widget-five">
                              <div class="stat-icon dib flat-color-3">
                                  <i class="fa fa-table"></i>
                              </div>
                              <!-- time table -->
                              <a href="timetable.php">
                                  <div class="stat-content">
                                      <div class="text-left dib">
                                          <div class="stat-text"><span>TT</span></div>
                                          <div class="stat-heading">TimeTable</div>
                                      </div>
                                  </div>
                          </div>
                      </div>
                  </div>
              </div>
              </a>

              <div class="col-lg-3 col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="stat-widget-five">
                              <div class="stat-icon dib flat-color-1">
                                  <i class="pe-7s-users"></i>
                              </div>
                              <!-- faculty -->
                              <a href="allotedTeacher.php">
                                  <div class="stat-content">
                                      <div class="text-left dib">
                                          <div class="stat-text"><span class="count"><?php echo $faculty_count?></span>
                                          </div>
                                          <div class="stat-heading">Faculty</div>
                                      </div>
                                  </div>
                          </div>
                      </div>
                  </div>
              </div>
              </a>




              <hr>
              <hr>