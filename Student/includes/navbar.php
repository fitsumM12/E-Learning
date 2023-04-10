<div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand " href="./"><img src="../HomePage/images/E-logo.png" alt="Logo" 
                 style="width: auto; height: 60px;"></a>
                <a class="navbar-brand hidden" href="./"><img src="../HomePage/images/E-logo.png" alt="Logo"></a>
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
                
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
<!-- notification page to be implemented -->

                <?php   
                    $sec_id = $_SESSION['sec_id'];
                    $result = $user->getNotice($sec_id); 
                    $count = $result->rowCount();
                ?>

                    <div class="dropdown for-notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger"><?php echo $count;?></span>
                        </button>

                        <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red text-warning">You have <?php echo $count;?> Notification</p>
                            <?php while($notice = $result->fetch(PDO::FETCH_ASSOC)){?>
                            <a class="dropdown-item media text-success" href="viewNotice.php?notice_id=<?php echo  $notice['id']?>; ?>">
                                <i class="fa fa-check"></i>
                                <p class="text-success"><?php echo substr($notice['message'],0,20)?></p>
                            </a>
                            <?php } ?>
                        </div>
                    </div>

<!-- message page to be implemented -->
                    <div class="dropdown for-message">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-envelope"></i>
                            <span class="count bg-primary">4</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <div class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                    <p>Hello, this is an example msg</p>
                                </div>
                            </a> 
                            <a class="dropdown-item media" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <div class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </div>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <div class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                    <p>Hello, this is an example msg</p>
                                </div>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <div class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
<!-- user profile page to be implemented -->
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img  class="user-avatar rounded-circle" style="width:55px;height:45px;"
                            src="<?php echo empty($profile) ? "../upload/blank.png" : "../upload/".$profile ?>" 
                            alt="user">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="viewProfile.php?id=<?php echo $_SESSION['email'] ?>"><i class="fa fa-user"></i>My Profile</a>

                        <a class="nav-link" href="displayNotice.php"><i class="fa fa-bell"></i>Notifications<span class="count"><?php echo $count?></span></a>

                        <a class="nav-link" href="setting.php"><i class="fa fa-cog"></i>Settings</a>

                        <a class="nav-link" href="../HomePage/logout.php"><i class="fa fa-power-off"></i>Logout</a>
                    </div>
                </div>

            </div>
        </div>