<?php 
	require_once 'session.php';
  ob_start();

	// delete verified otp
    // echo password_hash('1234',PASSWORD_DEFAULT);
	include "db.php";
	$result = $user->deleteVerifiedOTP();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Learning</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script type="text/javascript" src="script.js"></script>


    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
    .logo {
        width: 150px;
        margin: 0;
        padding: 0;
    }
    </style>

</head>

<body>
    <!-- navbar start -->
    <div class="bg-top navbar-light">
        <div class="container">
            <div class="row no-gutters d-flex align-items-center align-items-stretch ">
                <div class="col-md-4 align-items-center py-4 px-lg-0">
                    <a class="navbar-brand ml-left" href="index.html"> <img class="logo"
                            src="../HomePage/images/E-logo.png" alt="logo"> </a>
                </div>
                <div class="col-lg-8 d-block">
                    <div class="row d-flex">
                        <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                            <div class="icon d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <div class="text">
                                <span class="text-info"> <a href="mailto:e-learning@gmail.com">
                                        e-learning@gmail.com</a></span>
                            </div>
                        </div>
                        <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                            <div class="icon d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span></div>
                            <div class="text">

                                <span class="text-info"> <a href="tel://91 63 09 81 41 95"> + 91 63 09 81 41 95
                                    </a></span>
                            </div>
                        </div>
                        <div class=" d-flex align-items-center justify-content-end">
                            <p class="mb-0">
                                <?php if(!isset($_SESSION['std_id'])){ ?>
                                <a href="form.php"
                                    class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
                                    <span>APPLY NOW</span>

                                </a>
                                <?php }else{ ?>
                                <a href="javascript:history.go(-1)"
                                    class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
                                    <span></span>
                                </a>
                                <?php } ?>

                            </p>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <p class="mb-0">
                                <?php if(!isset($_SESSION['email'])){ ?>
                                <a href="login.php"
                                    class="btn py-2 px-3 btn-info d-flex align-items-center justify-content-center">
                                    <span>LOGIN</span>
                                </a>
                                <?php } else{ ?>
                                <a href="logout.php"
                                    class="btn py-2 px-3 btn-info d-flex align-items-center justify-content-center">
                                    <span>LOGOUT</span>
                                </a>
                                <?php }?>

                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container d-flex align-items-center px-4">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <form action="search_course.php" class="searchform order-lg-last" method="post">
                <div class="form-group d-flex">
                    <input type="text" class="form-control pl-3" placeholder="Search Courses" name="search_result"
                        id="search_result">
                    <button type="submit" placeholder="" class="form-control search" name="search_btn"><span
                            class="ion-ios-search"></span></button>
                </div>
            </form>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <?php 
						require_once 'db.php';
						$result = $crud->insertMenu();
						while($row = $result->fetch(PDO :: FETCH_ASSOC)){
		

				?>
                <ul class="navbar-nav mr-auto" id="navMenu">
                    <li class="nav-item"><a href="<?php echo $row['menu_path']; ?>"
                            class="nav-link pl-0"><?php echo $row['menu_name']; ?></a></li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </nav>
    <script>
    $(document).ready(function() {
        //Get CurrentUrl variable by combining origin with pathname, this ensures that any url appendings (e.g. ?RecordId=100) are removed from the URL
        var CurrentUrl = window.location.origin + window.location.pathname;
        //Check which menu item is 'active' and adjust apply 'active' class so the item gets highlighted in the menu
        //Loop over each <a> element of the NavMenu container
        $('#navMenu a').each(function(Key, Value) {
            //Check if the current url
            if (Value['href'] === CurrentUrl) {
                //We have a match, add the 'active' class to the parent item (li element).
                $(Value).parent().addClass('active');
            }
        });
    });
    </script>
    <!-- END nav -->

    <!-- auto complete search -->
    <script>
    $(function() {
        $("#search_result").autocomplete({
            source: 'course_search.php'
        });
    });
    </script>