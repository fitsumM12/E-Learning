<?php require_once 'includes/header.php'?>

    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Courses</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Courses <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section" >

		<div class="row">
<?php 
$search_array = array();
if(isset($_POST['search_btn'])){
  $saerch_result = $_POST['search_result'];
	$search_course = $crud->search_course($saerch_result);
  while($row = $search_course->fetch(PDO::FETCH_ASSOC)){ 
		// $data['id'] = $row['dpt_id'];
		$data['value'] = $row['dpt_name'];
		array_push($search_array,$data);
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
								<p><?php echo $row['dpt_detail'];?></p>

									<?php if(isset($_SESSION['email'])) {?>
									<a href="form.php"  class="btn btn-primary"><button disabled class="btn btn-primary">Apply now</button></a>
									<?php }
										else{?>
										<a href="form.php"  class="btn btn-primary"><button class="btn btn-primary">Apply now</button></a>
									<?php	}?>
							</div>
						</div>
						
<?php 
	} 
	// echo json_encode($search_array);
}
?>
				</div>
			</div>
		</section>
		</section>


		
		<?php require_once 'includes/footer.php'?>
