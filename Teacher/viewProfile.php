<?php 
require_once './partials/header.php';
$result= FacultyDetail($conn);
?>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">


        <!-- viewing profile section for faculty -->
        <div class="container rounded bg-white mt-5" id="facViewProfile">
            <div class="row">

                <div class="col-md-4 ">
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                            class="rounded-circle mt-5" src="images/<?php echo $result['pro_pic'];   ?>"
                            width="90"><span class="font-weight-bold">
                            <?php echo $result['fac_name'] ?></span><span
                            class="text-black-50"><?php echo $result['fac_email'] ?></span><span><?php echo $result['permanent_address'] ?></span>
                        <button class="profile-button btn btn-primary" onclick="EditProfile();" type="button">Edit
                            Picture
                        </button>
                    </div>

                </div>

                <div class="col-md-4 ">
                </div>


            </div>
        </div>




        <!-- editting the profile picture -->
        <div class="container rounded bg-white mt-5" id="facEditProfile" style="display:none;">
            <form action="includes/facultyProfile.php" method="POST" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-4 ">
                        <div hidden class="col-md-6" style="display:none;"><span>ID </span> <input type="text"
                                class="form-control" name="fac_id" value="<?php echo $_SESSION['fac_id'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-5" src="images/<?php echo $result['pro_pic'];?>" width="90">

                            <input type="file" id="img" name="img" value="images/<?php echo $result['pro_pic'];?>"
                                accept="image/*" style="display:none;" required />
                            <label for="img"
                                style="background-color: #FFFff0; margin:5px; padding:10px; border:1px solid;border-radius:5px;">Change
                                Picture</label>
                            <button class="profile-button btn btn-primary" name="update" type="submit">Save
                                Profile</button>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                    </div>


                </div>

            </form>


        </div>
    </div>
</div>
</div><!-- /# column -->
</div>
<!--  /Traffic -->
</div>
<!-- .animated -->
</div>

<?php  require_once './partials/footer.php'; ?>