<?php 
require_once 'includes/header.php';
require_once 'includes/db.php';
require_once 'validate_form.php';
// $dept = $crud->getDepartmentById($id);  


?>
    
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/bg_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
            <h1 class="mb-4">Education Needs Complete Solution</h1>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            <p><a href="#" class="btn btn-primary px-4 py-3 mt-3">Contact Us</a></p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/bg_2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
            <h1 class="mb-4">University, College School Education</h1>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            <p><a href="contact.php" class="btn btn-primary px-4 py-3 mt-3">Contact Us</a></p>
          </div>
        </div>
        </div>
      </div>
    </section>

    <section class="ftco-services ftco-no-pb">
			<div class="container-wrap">
				<div class="row no-gutters">
									<!-- get all promotion from db -->
		<?php
			$result = $crud->view_promotion();
			while($row = $result->fetch(PDO::FETCH_ASSOC)){

		?>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate <?php echo $row['background'];?>">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="<?php echo $row['promo_image'];?>"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading"><?php echo $row['promo_title']; ?></h3>
                <p><?php echo $row['promo_desc']; ?>.</p>
              </div>
            </div>   
          </div>
					
			<?php	}?>   
			</div>
		</section>


		
		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-5 order-md-last wrap-about wrap-about d-flex align-items-stretch">
						<div class="img" style="background-image: url(images/about.jpg); border"></div>
					</div>
					<div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
          	<h2 class="mb-4">What We Offer</h2>
						<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
						<div class="row mt-5">
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-security"></span></div>
									<div class="text pl-3">
										<h3>Safety First</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-reading"></span></div>
									<div class="text pl-3">
										<h3>Regular Classes</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-diploma"></span></div>
									<div class="text pl-3">
										<h3>Certified Teachers</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-education"></span></div>
									<div class="text pl-3">
										<h3>Sufficient Classrooms</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-jigsaw"></span></div>
									<div class="text pl-3">
										<h3>Creative Lessons</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-kids"></span></div>
									<div class="text pl-3">
										<h3>Sports Facilities</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		

		<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2 d-flex">
    			<div class="col-md-6 align-items-stretch d-flex">
    				<div class="img img-video d-flex align-items-center" style="background-image: url(images/about-2.jpg);">
    					<div class="video justify-content-center">
								<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
									<span class="ion-ios-play"></span>
		  					</a>
							</div>
    				</div>
    			</div>
          <div class="col-md-6 heading-section heading-section-white ftco-animate pl-lg-5 pt-md-0 pt-5">
            <h2 class="mb-4">E-Learning</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          </div>
        </div>	
		<!-- find number of student, course , fucalty, award from our database -->
		<?php
		// course counter
			$course = $crud->course_detail();
			$course_counter = $course->rowCount();
			// student counter
			$student = $crud->student_detail();
			$student_counter = $student->rowCount();
			// course counter
			$faculty = $crud->faculty_detail();
			$faculty_counter = $faculty->rowCount();
			
		?>

    		<div class="row d-md-flex align-items-center justify-content-center">
    			<div class="col-lg-12">
    				<div class="row d-md-flex align-items-center">
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="<?php echo	$faculty_counter+30;?>">0</strong>
		                <span>Certified Teachers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="<?php echo	$student_counter+300;?>">0</strong>
		                <span>Students</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="<?php echo	$course_counter+10;?>">0</strong>
		                <span>Courses</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="12">0</strong>
		                <span>Awards Won</span>
		              </div>
		            </div>
		          </div>
	          </div>
          </div>
        </div>
    	</div>
    </section>



		<section class="ftco-section">
			<div class="container-fluid px-4">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Our</span> Courses</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>	
				<div class="row">
<?php 
$course_detail = $crud->course_detail();
while($row = $course_detail->fetch(PDO::FETCH_ASSOC)){ 
	
?>
					<div class="col-md-3 course ftco-animate">
						<div class="img" style="background-image: url(images/<?php echo $row['promo_image'];?>);"></div>
						<div class="text pt-4">
							<p class="meta d-flex">
								<span><i class="icon-user mr-2"></i><?php echo $row['dpt_head'];?></span>
								<span><i class="icon-table mr-2"></i><?php echo $row['no_of_seat'];?> seats</span>
								<span><i class="icon-calendar mr-2"></i><?php echo $row['duration'];?> Years</span>
							</p>
							<h3><a href="form.php"><?php echo $row['dpt_name'];?></a></h3>
							<p><?php echo substr($row['dpt_detail'],0,150);?></p>

								 <?php if(isset($_SESSION['email'])) {?>
								<a href="form.php"  class="btn btn-primary"><button disabled class="btn btn-primary">Apply now</button></a>
								<?php }
									else{?>
									<a href="form.php"  class="btn btn-primary"><button class="btn btn-primary">Apply now</button></a>
								<?php	} ?>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>
		</section>


		<section class="ftco-section bg-light">
			<div class="container-fluid px-4">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Certified Teachers</h2>
            <p>Find out all our professional and certified teachers</p>
          </div>
        </div>

				<div class="row">
				<?php 
					$result = $crud->faculty_promotion();
					while($row = $result->fetch(PDO::FETCH_ASSOC)){
				?>
			
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/<?php echo $row['profile_picture']; ?>);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3><?php echo $row['fac_name']; ?></h3>
								<span class="position mb-2"><?php echo $row['fac_title']; ?></span>
								<div class="faded">
									<p><?php echo $row['promotion_desc']; ?></p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						 </div>
					 </div>
					 <?php }?>
					</div>
				</div>
			</div>
		</section>
<!-- request quote section removed -->


		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Recent</span> Blog</h2>
            <p>Find out all of our Recent blog</p>
          </div>
        </div>
				<div class="row">
				<?php 
					$result = $crud->get_recentBlog();
					while($row = $result->fetch(PDO::FETCH_ASSOC)){
				?>
			
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog_single.php?post_id=<?php echo $row['post_id'];?>"  class="block-20 d-flex align-items-end" style="background-image: url('images/<?php echo $row['post_image']; ?>');">
								<div class="meta-date text-center p-2">
									<span class="year"><?php echo substr($row['post_date'],0,4)?></span>
                  <span class="day"><?php echo substr($row['post_date'],5,7)?></span>
 
                  
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="blog_single.php?post_id=<?php echo $row['post_id'];?>"><?php echo $row['post_title']; ?></a></h3>
                <p><?php echo substr($row['post_desc'],0,150); ?></p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="blog_single.php?post_id=<?php echo $row['post_id'];?>"  class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="blog_single.php?post_id=<?php echo $row['post_id'];?>"  class="mr-2">Comment</a>
	                	<a href="blog_single.php?post_id=<?php echo $row['post_id'];?>"  class="meta-chat"><span class="icon-chat"></span></a>
	                </p>
                </div>
              </div>
            </div>
          </div>
					<?php }?>
        </div>
			</div>
		</section>

		<section class="ftco-section testimony-section">
      <div class="container">

        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Student Says About Us</h2>
            <p>based on our professional 24X7 service some of our student reviewed our site as follow</p>
          </div>
        </div>

        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
							<?php
									$result = $crud->get_studentReview();
									while($row = $result->fetch(PDO::FETCH_ASSOC)){
							?>
							<div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/<?php echo $row['reviewee_image'];?>)"></div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p><?php echo $row['review_desc']; ?></p>
                    <p class="name"><?php echo $row['review_author']; ?></p>
                    <span class="position"><?php echo $row['reviewee_title']; ?></span>
										<span class="position"><?php echo $row['review_date']; ?></span>
                  </div>
                </div>
              </div>
							<?php } ?>
					
            </div>
          </div>
        </div>
      </div>
    </section>

	<!-- extra section removed -->
		<?php require_once 'includes/footer.php' ?>
	