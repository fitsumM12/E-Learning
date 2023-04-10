<?php
class user{
    
    function getTimeTable($crs_id,$conn,$sec_id,$date){
    
            $sql = "SELECT * from time_table Where sec_id='$sec_id' and crs_id='$crs_id'  and  date = '$date' order by start_time" ;
  
            $result = $conn->query($sql);
            
            if($result){

                return $result;
            }
            else{
                return "NO DATA FOUND";
            }

  
      }
}
$user = new user();
?>