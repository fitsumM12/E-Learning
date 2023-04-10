<?php  require_once 'includes/header.php'; ?>

<?php
    if(!isset($_GET['id'])){
        echo "<alert>Invalid User Id try again error 101</alert>";
    }else{
        $email = $_GET['id'];
        $result = $user->viewProfile($email);
        $profile = $result['profile_picture'];
    }
?>
<style>
.card {
    width: 120%;
    float: left;
    border: 4px solid white;
    text-align: center;
    margin: auto;
}

.bottom {}
</style>
<button class="btn btn-primary btn-center" type="button" onclick="changeColor()">Change Color</button>

<!-- view profile -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3">

            <div class="card hovercard">
                <div class="cardheader">
                    <h3 color="skyblue">Your Profile</h3>
                </div>
                <div class="avatar">
                    <img width="220" height="180" alt=""
                        src="<?php echo empty($profile) ? "../upload/blank.png" : "../upload/".$profile ?>">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="index.php"><?php echo strtoupper($result['std_name'])?></a>
                    </div><br><br>
                    <div class="desc"><?php echo "<b class='text-primary'>Student Id </b>".$result['std_id']?></div><br>
                    <div class="desc"><?php echo "<b class='text-primary'>email </b>".$result['email']?></div><br>
                    <div class="desc"><?php echo "<b class='text-primary'>department of </b>".$result['dpt_name']?>
                    </div><br>
                    <div class="desc"><?php echo "<b class='text-primary'>Under program of </b>".$result['prg_name']?>
                    </div><br>
                    <div class="desc"><?php echo "<b class='text-primary'>contact No </b>".$result['contact']?></div>
                    <br>
                    <div class="desc">
                        <?php echo "<b class='text-primary'>current_address </b>".$result['current_address']?></div><br>
                    <div class="desc">
                        <?php echo "<b class='text-primary'>permanent_address </b>".$result['permanent_address']?></div>
                    <br>
                </div>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher" href="#">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher" href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="#">
                        <i class="fa fa-behance"></i>
                    </a>
                </div>
            </div>
            <div class="bottom">
                <a class="btn btn-warning" href="editProfile.php?id=<?php echo $_SESSION['email']?>">
                    <i>Edit Profile</i>
                </a>
                <a class="btn btn-info" href="index.php">
                    <i>Return Home</i>
                </a>
            </div>

        </div>

    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>

<?php  require_once './includes/footer.php'; ?>