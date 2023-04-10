<?php require_once 'includes/header.php'?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Our Latest Blog</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		
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
        if(isset($_GET['cat_id'])){
          $cat_id = $_GET['cat_id'];
        }
					$result = $crud->get_Blog_by_category($cat_id);
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
                <h3 class="heading"><a href="blog_single.php?post_id=<?php echo $row['post_id'];?>" ><?php echo $row['post_title']; ?></a></h3>
                <p><?php echo substr($row['post_desc'],0,150); ?></p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="blog_single.php?post_id=<?php echo $row['post_id'];?>" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="blog_single.php?post_id=<?php echo $row['post_id'];?>" class="mr-2">Comment</a>
	                	<a href="blog_single.php?post_id=<?php echo $row['post_id'];?>" class="meta-chat"><span class="icon-chat"></span></a>
	                </p>
                </div>
              </div>
            </div>
          </div>
					<?php }?>
        </div>
			</div>
		</section>

<?php require_once 'includes/footer.php'?>
   