<?php
  if(!isset($_SESSION['std_id']) && !isset($_SESSION['admin_id']) && !isset($_SESSION['fac_id']) ){
    header('Location: ../HomePage/login.php');
  }
?>