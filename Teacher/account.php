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
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                            class="rounded-circle mt-5" src="images/<?php echo $result['pro_pic'];   ?>"
                            width="90"><span class="font-weight-bold">
                            <?php echo $result['fac_name'] ?></span><span
                            class="text-black-50"><?php echo $result['fac_email'] ?></span><span><?php echo $result['permanent_address'] ?></span>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="p-3 py-5">
                        <div class="row mt-2">
                            <div class="col-md-6"><span>Full Name: </span> <input type="text" class="form-control"
                                    placeholder="first name" value="<?php echo $result['fac_name'] ?>" disabled></div>

                            <div class="col-md-6"><span>Permanent Address: </span><input type="text"
                                    class="form-control" value="<?php echo $result['permanent_address'] ?>"
                                    placeholder="permanent address" disabled>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><span>Email Address: </span><input type="email" class="form-control"
                                    placeholder="Email" value="<?php echo $result['fac_email'] ?>" disabled></div>

                            <div class="col-md-6"><span>Contact Number: </span><input type="text" class="form-control"
                                    value="<?php echo $result['fac_contact'] ?>" placeholder="Phone number" disabled>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><span>Current Address: </span><input type="text" class="form-control"
                                    placeholder="Bank Name" value="<?php echo $result['current_address'] ?>" disabled>
                            </div>
                            <div class="col-md-6"><span>Date Of Birth:</span><input type="text" class="form-control"
                                    value="<?php echo $result['dob'] ?>" disabled placeholder="Account Number">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><span>Emergency Email: </span><input type="text" class="form-control"
                                    placeholder="emergenecy email" value="<?php echo $result['emergency_email'] ?>"
                                    disabled>
                            </div>
                            <div class="col-md-6"><span>Emergency Mobile Number: </span><input type="text"
                                    class="form-control" value="<?php echo $result['emergency_mobile'] ?>"
                                    placeholder="emergency mobile" disabled></div>
                        </div>
                        <div class="mt-5 text-right">

                            <button class="profile-button btn btn-primary" onclick="EditProfile();" type="button">Edit
                                Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- editting the profile picture -->
        <div class="container rounded bg-white mt-5" id="facEditProfile" style="display:none;">
            <form action="includes/facultyProfile.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-5" src="images/<?php echo $result['pro_pic'];?>" width="90">

                            <input type="file" id="img" name="img" value="images/<?php echo $result['pro_pic'];?>"
                                accept="image/*" style="display:none;" required />
                            <label for="img"
                                style="background-color: #FFFff0; margin:5px; padding:10px; border:1px solid;border-radius:5px;">Change
                                Picture</label><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                <path
                                    d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                <path
                                    d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                            </svg>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="row mt-2">
                                <div class="col-md-6" style="display:none;"><span>ID </span> <input type="text"
                                        class="form-control" placeholder="faculty id" name="fac_id"
                                        value="<?php echo $result['fac_id'] ?>">
                                </div>

                                <div class="col-md-6"><span>Full Name: </span> <input type="text" class="form-control"
                                        placeholder="first name" name="fac_name"
                                        value="<?php echo $result['fac_name'] ?>" readonly>
                                </div>

                                <div class="col-md-6"><span>Permanent Address: </span><input type="text"
                                        class="form-control" name="permanent_address"
                                        value="<?php echo $result['permanent_address'] ?>"
                                        placeholder="permanent address">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><span>Email Address: </span><input type="email"
                                        class="form-control" name="email_address" placeholder="Email"
                                        value="<?php echo $result['fac_email'] ?>"></div>

                                <div class="col-md-6"><span>Contact Number: </span><input type="text"
                                        class="form-control" name="fac_contact"
                                        value="<?php echo $result['fac_contact'] ?>" placeholder="Phone number">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><span>Current Address: </span><input type="text"
                                        class="form-control" placeholder="address Name" name="current_address"
                                        value="<?php echo $result['current_address'] ?>">
                                </div>
                                <div class="col-md-6"><span>Date Of Birth:</span><input type="text" class="form-control"
                                        value="<?php echo $result['dob'] ?>" name="dob" placeholder="Account Number"
                                        readonly>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><span>Emergency Email: </span><input type="text"
                                        class="form-control" name="emergency_email" placeholder="emergenecy email"
                                        value="<?php echo $result['emergency_email'] ?>">
                                </div>
                                <div class="col-md-6"><span>Emergency Mobile Number: </span><input type="text"
                                        class="form-control" name="emergency_mobile"
                                        value="<?php echo $result['emergency_mobile'] ?>"
                                        placeholder="emergency mobile"></div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="mt-5 text-right">
                    <button class="profile-button btn btn-primary" name="edit" value="submit" type="submit">Save
                        Profile</button>
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