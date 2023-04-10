<?php require_once 'includes/header.php'?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Contact Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex contact-info">
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Address</h3>
	            <p class="text-primary">KIIT UNIVERSITY KP8 Boys Hostel</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Contact Number</h3>
	            <p><a href="tel://91 63 09 81 41 95" class="text-primary">+ 91 63 09 81 41 95</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Email Address</h3>
	            <p><a href="mailto:e-learning@gmail.com" class="text-primary">e-learning@gmail.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Website</h3>
	            <p><a href="index" class="text-primary">tcoder.com</a></p>
	          </div>
          </div>
        </div>
      </div>
    </section>

 <?php 
    require_once 'contactMail.php';
    require_once 'includes/db.php';
    if(isset($_POST['sendmessage'])){
      if(isset($_SESSION['std_id'])){
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
      }else{
        $username = $_POST['username'];
        $email = $_POST['email'];
      }
      $subject = $_POST['subject'];
      $message = $_POST['message'];
      $result = $crud->insertContact($username,$email,$subject,$message);
      if($result){
        $sendEmail = myPHPMailer::sendEmail($email, $message);
        if($sendEmail){
          echo "<script>alert('email sent successfully')</script>";
          header('Location:index.php');
        }
        else{
          echo "<script>alert('failed to deliver please try again')</script>";
          //header('Location: contact.php');
        }

      }

    }
?>
		
		<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container">
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
          <h3 class="text-center"> Contact Us</3>
						<form action="" method="post">
            <?php
              if(isset($_SESSION['username'])){
            ?>
              <div class="form-group">
                <input hidden type="text" class="form-control border-primary rounded" name="username" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input hidden type="text" class="form-control border-primary rounded" name="email" placeholder="Your Email">
              </div>
              <?php } else{ ?>
                <div class="form-group">
                <input type="text" class="form-control border-primary rounded" name="username" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control border-primary rounded" name="email" placeholder="Your Email">
              </div>
              <?php } ?>
              <div class="form-group">
                <input type="text" class="form-control border-primary rounded" name="subject" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="message" id="message" cols="30" rows="7" class="form-control border-primary rounded" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" name="sendmessage" class="btn btn-primary btn-md">Send Message</button>
              </div>
            </form>
					</div>
					<div class="col-md-6 d-flex align-items-stretch">
						<div id="map"></div>
					</div>
				</div>
			</div>
		</section>


		
    <?php require_once 'includes/footer.php'?>