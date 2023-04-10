<?php 
require_once './partials/header.php';
$result= FacultyDetail($conn);
?>

<div class="content">
  <div class="animated fadeIn">

    <div class="container rounded bg-white mt-5" id="facViewProfile">
      <div class="row">

        <div class="col-md-2">
        </div>
        <div class="col-md-8">




          <pre>
          <h2 class="text-primary text-center">Academic Calendar</h2></pre>
          <table class="user table table-hover table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Calander Year</th>
                <th>Semester</th>
                <th>Mid Exam</th>
                <th>Final Exam</th>
                <th>Summar Break</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 
            $count = 1;
            $sql ="SELECT `acad_cal_id`, `acad_cal_title`, `acad_cal_strtng_date`, `acad_cal_end_date`, `mid_exam_start_date`, `mid_exam_end_date`, `final_exam_start_date`, `final_exam_end_date`, `break`, `acad_cal_description` FROM `academic_calendar` WHERE 1";
            $result=$conn->query($sql);
            while($row = $result->fetch_assoc()){
          ?>
              <tr>

                <td> <?php echo $count; ?> </td>
                <td> <?php echo $row['acad_cal_strtng_date']." - ".$row['acad_cal_end_date']; ?> </td>
                <td> <?php echo $row['acad_cal_title']; ?> </td>
                <td> <?php echo $row['mid_exam_start_date']." - ".$row['mid_exam_end_date']; ?> </td>
                <td> <?php echo $row['final_exam_start_date']." - ".$row['final_exam_end_date'];; ?> </td>
                <td> <?php echo $row['break']; ?> </td>
              </tr>
              <?php $count = $count+1; } ?>
              </tr>
            </tbody>
          </table>



        </div>

        <div class="col-md-2">
        </div>


      </div>
    </div>
    <div class="container rounded bg-white mt-5" id="facViewProfile">
      <div class="row">

        <div class="col-md-2">
        </div>
        <div class="col-md-8">




          <pre>
          <h2 class="text-primary text-center">Events</h2></pre>
          <table class="user table table-hover table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>
                  <Title>Event title</Title>
                </th>
                <th>Starting Date</th>
                <th>Ending Date</th>
                <th>Descriptions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 
            $sql ="SELECT `evnt_id`, `evnt_title`, `evnt_strtng_date`, `evnt_endng_date`, `evnt_descrptn` FROM `events` WHERE 1";
            $result=$conn->query($sql);
            while($row = $result->fetch_assoc()){
          ?>
              <tr>

                <td> <?php echo $row['evnt_id']?> </td>
                <td> <?php echo $row['evnt_title']?> </td>
                <td> <?php echo $row['evnt_strtng_date']; ?> </td>
                <td> <?php echo $row['evnt_endng_date']; ?> </td>
                <td> <?php echo $row['evnt_descrptn']; ?> </td>
              </tr>
              <?php  } ?>
              </tr>
            </tbody>
          </table>



        </div>

        <div class="col-md-2">
        </div>


      </div>
    </div>


  </div>
</div>
</div>
</div>
</div>
</div>

<?php  require_once './partials/footer.php'; ?>