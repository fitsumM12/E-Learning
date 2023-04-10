<?php
session_start();
session_destroy();
header("Location:  ../HomePage/login.php");
exit();

?>