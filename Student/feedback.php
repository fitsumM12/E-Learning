<?php 
      require_once 'includes/header.php';
      require_once '../HomePage/redirect.php';
      $navigate = new navigate();
      // mention sessionstored
      $std_id = $_SESSION['std_id'];
      $sec_id = $_SESSION['sec_id'];
      $dp_id = $_SESSION['dp_id'];
      $sem = $_SESSION['current_sem'];
      //call method
      $faculty = $user->getFaculty($sec_id);
      $course = $user->getCourse($dp_id,$sem);

?>
<style>
.feed_sec {
    margin: 12px;
    padding: 5px;
    border: 3px solid gray;
    border-radius: 5px;
    border-spacing: 5px;
    height: auto;
}

.row {
    margin: 12px;
    padding: 10px;
    align: center;
}

label {
    color: skyblue;
    position: center;
    float: center;

}
</style>


<h3 class="text-primary text-center">FeedBack</h3>
<form action="<?php htmlentities($_SERVER['PHP_SELF'])?>" method="POST" role="form">
    <!--Section: Contact v.2-->
    <section class="feed_sec mb-4">

        <!--Section heading-->

        <div class="row">

            <div class="row">
                <div class="input-field col s6">
                    <label for="first_name">Your Name</label>
                    <input class="form-control" name="std_name" value="<?php echo $_SESSION['username']?>" type="text">

                </div>
                <div class="input-field col s6">
                    <label for="first_name">Your ID</label>
                    <input class="form-control" name="std_id" value="<?php echo $_SESSION['std_id']?>" type="text">
                </div>
            </div>

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">



                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Catagory</label>
                            <select class="form-control" name="catagory" default="" Required>
                                <option value=""></option>
                                <option value="attendance">Attendance</option>
                                <option value="mark">Mark</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Course</label>
                            <select class="form-control" name="course" default="" Required>
                                <?php while($res = $course->fetch(PDO::FETCH_ASSOC)){ ?>
                                <option value=""></option>
                                <option value="<?php echo $res['crs_id'] ?>"><?php echo $res['crs_name']?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Faculty</label>
                            <select class="form-control" name="faculty" Required>
                                <?php while($res = $faculty->fetch(PDO::FETCH_ASSOC)){ ?>
                                <option value=""></option>
                                <option value="<?php echo $res['fac_id'] ?>"><?php echo $res['fac_name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <label for="message">Feedback Detail</label>
                            <textarea type="text" id="message" name="message" rows="3" Required
                                class="form-control md-textarea"></textarea>

                        </div>

                    </div>
                </div>
                <!--Grid row-->

                <div class="text-center text-md-left">
                    <button class="btn btn-primary" name="send_feedback" id="send_feedback">Send</button>
                </div>
                <div class="status"></div>
            </div>
            <!--Grid column-->


    </section>
</form>
<!--Section: Contact v.2-->
<?php
    if(isset($_POST['send_feedback'])){
      
      $std_id = $_SESSION['std_id'];
      $sec_id = $_SESSION['sec_id'];
      $message = $_POST['message'];
      $fb_catagory = $_POST['catagory'];
      $crs_id = $_POST['course'];
      $fac_id = $_POST['faculty'];
      $sub_date = date('y-m-d');


      $result = $user->sendFeedBack($std_id,$sec_id,$crs_id,$fac_id,$fb_catagory,$message,$sub_date);
      if($result){
        echo "<script>alert('feedback submitted successfully')</script>";
        $navigate->redirect('index.php'); 
      }else{
        echo "<script>alert('unable to dispatch your feedback please try again')</script>";
      }

    }
?>




</tbody>
</table>



















<br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>