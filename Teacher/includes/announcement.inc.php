<?php
 class Announcement{
  public  function get_notice($conn){
    
        $sql = "SELECT * from notice";
        $result = $conn->query($sql);
        // $no_of_rows = $result->num_rows;
        return $result;
    }
}
$notification = new Announcement();

?>