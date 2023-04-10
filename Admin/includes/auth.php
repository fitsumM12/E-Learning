<?php
  if(!isset($_SESSION['admin_id'])){
    header('Location: ../../../../HomePage/login.php');
  }
?>