<?php require_once 'includes/header.php'?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Certified Teacher</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Teacher <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
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

<?php require_once 'includes/footer.php'?>
		
   