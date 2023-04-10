<?php
$db=mysqli_connect("localhost","root","","elearning");
    //write query
    
        $counter="SELECT * FROM notice where 1";
        $rs=mysqli_query($db,$counter);
        $i=0;
        if($rs){
            
        while(($row=mysqli_fetch_assoc($rs))>0){
            $i=$i+1;
            echo $row['id'];
            echo substr($row['message'],0,80);
            echo '<br>';
        }

        echo $i;
    }else{
        $i=0;
    }
            
            
        ?>