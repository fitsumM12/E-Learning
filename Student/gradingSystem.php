<?php
    class gradeSystem{

        
          public function grade($total){
            while($total>=0){
                if($total>=90){
                  $value=='O';
                }
                else if($total<90 && $total>=80){
                  $value == 'E';
                }
                else if($total<80 && $total>=70){
                  $value == 'A';
                }
                else if($total<70 && $total>=60){
                  $value == 'B';
                }
                else if($total<60 && $total>=50){
                  $value == 'C';
                }
                else if($total<50 && $total>=40){
                  $value == 'D';
                }
                else{
                  $value == 'F';

                }
              }
              

          }
  }
?>