<?php require_once 'includes/header.php'?>
<!-- increment blog view_counter each time the blog is clicked -->
<?php 
  if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];  
    $result = $crud->update_post_view_counter($post_id); 
  }
?>
<?php
  if(isset($_POST['submit_comment'])){
    $post_id = $_GET['post_id'];
    $comment = $_POST['comment'];
    $date = date('Y-m-d h:i:sa');
   if(isset($_SESSION['std_id'])){
     $comment_author = $_SESSION['username'];
     $comment_email = $_SESSION['email'];
     $result = $crud->insertComment($post_id,$comment_author,$comment_email,$comment,$date);
   }
   else{
    $comment_author = $_POST['username'];
    $comment_email = $_POST['email'];
    $result = $crud->insertComment($post_id,$comment_author,$comment_email,$comment,$date);

   }
   if($result){
     echo "<script>alert('comment submitted successfully');</script>";
    
   }else{
    echo "<script>alert('comment failed please try again');</script>";
   }
   
  }

?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Blog Single</h1>
             <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="index.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		
		<section class="ftco-section">
			<div class="container">
				<div class="row">
        <?php 
        if(isset($_GET['post_id'])){
          $post_id = $_GET['post_id'];
        }

					$result = $crud->get_singleBlog($post_id);
					while($row = $result->fetch(PDO::FETCH_ASSOC)){
				?>
          <div class="col-lg-8 ftco-animate">
          <h2 class="heading"><a href="blog_single.php?post_id=<?php echo $row['post_id']; ?>"><?php echo $row['post_title']; ?></a></h2>
            <p><?php echo substr($row['post_desc'],0,200); ?></p>
            <p>
              <img src="images/image_2.jpg" alt="" class="img-fluid">
            </p>
            <p><?php echo substr($row['post_desc'],200,400); ?></p>
            <p><?php echo substr($row['post_desc'],400,600); ?></p>
            <p><?php echo substr($row['post_desc'],600,800); ?></p>
            <p><?php echo substr($row['post_desc'],800,1000); ?></p>

            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                <a href="blog.php" class="tag-cloud-link">Life</a>
                <a href="blog.php" class="tag-cloud-link">Sport</a>
                <a href="blog.php" class="tag-cloud-link">Tech</a>
                <a href="blog.php" class="tag-cloud-link">Travel</a>
              </div>
            </div>
            
            <div class="about-author d-flex p-4 bg-light">
              <div class="bio mr-5">
                <img src="images/teacher-1.jpg" alt="Image placeholder" class="img-fluid mb-4">
              </div>
              <div class="desc">
                <h3><p><?php echo $row['post_author']; ?></p></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              </div>
            </div>
            <?php }?>

            <?php 
              if(isset($_GET['post_id'])){
                $post_id = $_GET['post_id'];
              }
              $result = $crud->comment_counter($post_id);
              while($row=$result->fetch(PDO::FETCH_ASSOC)){
                 $counter = $row['counter'];
              }  
            ?>

            <div class="pt-5 mt-5">
              <h3 class="mb-5 h4 font-weight-bold"><?php echo $counter;?> Comments</h3>
              <?php
               if(isset($_GET['post_id'])){
                $post_id = $_GET['post_id'];
                $result = $crud->get_comments($post_id);
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
            ?>
              <ul class="comment-list">

                <li class="comment">
                  <div class="vcard bio">
                    <img src="http://placehold.it/64x64" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3><?php echo $row['comment_author'];?></h3>
                    <div class="meta mb-2"><?php echo substr($row['comment_date'],0,10).' '.'at '.substr($row['comment_date'],11,19) ?></div>
                    <p><?php echo $row['comment']; ?></p>
                    <p><a href="blog_single.php?$post_id=<?php echo $post_id;?>&comment_id=<?php echo $row['comment_id'] ?>" class="reply" name="replay">Reply</a></p>
                    <?php
                    
                    ?>
                  </div>
                  <?php }}?>
                </li>



              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5 h4 font-weight-bold">Leave a comment</h3>
                <form action="" class="p-5 bg-light" method="post">
                <?php if(isset($_SESSION['username'])){?>

                  <div class="form-group">
                    <label hidden for="name">Name *</label>
                    <input hidden type="text" class="form-control border-primary rounded" id="name" name="username">
                  </div>
                  <div class="form-group">
                    <label hidden for="email">Email *</label>
                    <input hidden type="email" class="form-control border-primary rounded" id="email" name="email">
                  </div>

                  <?php } else { ?>
                    <div class="form-group">
                    <label  for="name">Name *</label>
                    <input type="text" class="form-control border-primary rounded" id="name" name="username">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control border-primary rounded" id="email" name="email">
                  </div>
                  <?php }?>
                  <!-- <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website" name="website">
                  </div> -->
                  <div class="form-group">
                    <label for="message">Comment</label>
                    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control border-primary rounded"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" name="submit_comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>
          </div> <!-- .col-md-8 -->
<!-- search blog by name or description -->
          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="blog_search.php" class="searchform order-lg-last" method="post">
                <div class="form-group d-flex">
                  <input type="text" class="form-control pl-3" placeholder="Search Blog" name="blog_search_result" id="blog_search_result">
                  <button type="submit" placeholder="" class="form-control search" name="blog_search_btn"><span class="ion-ios-search"></span></button>
                </div>
              </form>
            </div>

            <div class="sidebar-box ftco-animate">
            	<h3>Category</h3>
              <ul class="categories">
                  <?php 
                    $result = $crud->get_Category();
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                      $cat_id = $row['cat_id'];
                      $cat_title = $row['cat_title'];
                    ?>
                <li><a href="blog_category.php?cat_id=<?php echo $cat_id; ?>"><?php echo $cat_title?><span></span></a></li>
                     <?php } ?>
              </ul>
            </div>
         
            <div class="sidebar-box ftco-animate">
              <h3>Popular Articles</h3>
              <?php 
                $result = $crud->get_popularBlog();
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
              ?>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="blog_single.php?post_id=<?php echo $row['post_id']; ?>"><?php echo $row['post_title']; ?></a></h3>
                  <div class="meta">
                    <div><a href="blog_single.php?post_id=<?php echo $row['post_id']; ?>"><span class="icon-calendar"></span><?php echo substr($row['post_date'],0,10); ?></a></div>
                    <div><a href="blog_single.php?post_id=<?php echo $row['post_id']; ?>"><span class="icon-person"></span><?php echo $row['post_author']; ?></a></div>
                    <div><a href="blog_single.php?post_id=<?php echo $row['post_id']; ?>"><span class="icon-chat"></span> </a></div>
                  </div>
                </div>
              </div>
              <?php }?>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <ul class="tagcloud m-0 p-0">
                <a href="blog.php" class="tag-cloud-link">School</a>
                <a href="blog.php" class="tag-cloud-link">Kids</a>
                <a href="blog.php" class="tag-cloud-link">Nursery</a>
                <a href="blog.php" class="tag-cloud-link">Daycare</a>
                <a href="blog.php" class="tag-cloud-link">Care</a>
                <a href="blog.php" class="tag-cloud-link">Kindergarten</a>
                <a href="blog.php" class="tag-cloud-link">Teacher</a>
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
            	<h3>Archives</h3>
              <ul class="categories">
              <?php 
                $result = $crud->get_archiveBlog();
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                  $post_id = $row['post_id'];

              ?>
              	<li><a href="blog_single.php?post_id=<?php echo $post_id;?>"><?php echo $row['post_date'];?><span>(<?php echo $result->rowCount();?>)</span></a></li>
              <?php }?>
              </ul>
            </div>


            <!-- <div class="sidebar-box ftco-animate">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div> -->

          </div><!-- END COL -->
        </div>
			</div>
		</section>
		
    <?php require_once 'includes/footer.php'?>