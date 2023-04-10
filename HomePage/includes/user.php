<?php
  class user{
    private $db;
    

    function __construct($db){
      $this->db = $db;
    }
    public function viewProfile($email){
      try{

  
        $sql = "SELECT * FROM `student_detail` st inner join `dpt_program` dp on st.dpt_prg_id=dp.dpt_prg_id
                inner join dpt_detail dd on dd.dpt_id=dp.dpt_id inner join program pr on 
                pr.prg_id=dp.prg_id WHERE st.email=:email";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':email',$email);
                 $stmt->execute(); 
                 $result = $stmt->fetch(); 
                 return $result;
      }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }

    }
    public function updateProfile($std_id,$email,$contact,$ms,$ca,$pa,$pro,$rs){
      try{

          $sql="UPDATE `student_detail` set email=:email,contact=:contact,marital_status=:ms, 
                current_address=:ca,permanent_address=:pa,profile_picture=:pro,residential_certificate=:rs
                where std_id=:std_id";

          $stmt = $this->db->prepare($sql);
          $stmt->bindparam(':email',$email);
          $stmt->bindparam(':contact',$contact);
          $stmt->bindparam(':ms',$ms);
          $stmt->bindparam(':ca',$ca);
          $stmt->bindparam(':pa',$pa);
          $stmt->bindparam(':pro',$pro);
          $stmt->bindparam(':rs',$rs);
          $stmt->bindparam(':std_id',$std_id);
          $stmt->execute();
          return true;
      }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }
    }

    function getCourse($dept,$sem){
      try{

          $sql = "SELECT * from course_detail cr inner join course_allocation ca on cr.crs_id=ca.crs_id
                   where ca.current_sem='$sem' and ca.dpt_prg_id='$dept'" ;
          
          $result = $this->db->query($sql);
          return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }  

    }
    function getFaculty($sec_id){
      try{
        $sql = "SELECT  * from faculty_detail fd inner join faculty_course_allocation fc on fd.fac_id=fc.fac_id
                 inner join faculty_section_allocation fs on fc.fac_crs_id=fs.fac_crs_id where fs.sec_id='$sec_id'";
        $result = $this->db->query($sql);
        return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }  

    }
    function getSection($id){
      try{
        //INNER JOIN section se ON sa.sec_id=se.sec_id
        $sql = "SELECT * FROM `student_detail` st INNER JOIN `section_detail` se on st.sec_id=se.sec_id 
                 where  st.std_id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id',$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }
    

    }
    function getStudentList($sec_id){
      try{
        $sql = "SELECT * from student_detail st where sec_id='$sec_id'";
        $result = $this->db->query($sql);
        return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }  

    }
    function getStudentMark($std_id){
      try{
        $sql = "SELECT * from student_mark ma inner join student_detail st on ma.std_id=st.std_id
                inner join course_detail cr on ma.crs_id=cr.crs_id where ma.std_id='$std_id'";

        $result = $this->db->query($sql);
        return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }  

    }
    function getMaterial($dp_id,$sem,$crs_name){
      try{
        $sql = "SELECT * from student_material mat inner join course_detail crs on mat.crs_id=crs.crs_id where
                mat.dpt_prg_id='$dp_id' and mat.current_sem=$sem and crs.crs_name='$crs_name' ";

        $result = $this->db->query($sql);
        return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }  

    }
    function getAllMaterial($dp_id,$sem){
      try{
        $sql = "SELECT * from student_material mat inner join course_detail crs on mat.crs_id=crs.crs_id where
                mat.dpt_prg_id='$dp_id' and mat.current_sem=$sem; ";

        $result = $this->db->query($sql);
        return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }  

    }
    function downloadFile($title){
      try{
        $sql = "SELECT * from student_material where title=:title LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':title',$title);

        $stmt->execute();
        $result = $stmt->fetch();
        return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }  

    }
    function getPrevExam($std_id,$crs_name){
      try{
        $sql = "SELECT * from previous_exam pe inner join student_detail st on st.current_sem=pe.current_sem 
                inner join course_detail cr on cr.crs_id=pe.crs_id
                where std_id='$std_id' and crs_name='$crs_name' ";

        $result = $this->db->query($sql);
        return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }  

    }
    function getActivity($crs_name,$sec_id,$act_type){
      try{
        $sql = "SELECT * from student_activity ac inner join course_detail cr on ac.crs_id = cr.crs_id
                where ac.sec_id='$sec_id' and cr.crs_name='$crs_name' and ac.act_type='$act_type' LIMIT 1";

        $result = $this->db->query($sql);
        return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }  

    }
    function getAllActivity($sec_id){
      try{
        $sql = "SELECT * from student_activity ac inner join course_detail cr on ac.crs_id = cr.crs_id
                where ac.sec_id='$sec_id'";

        $result = $this->db->query($sql);
        return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }  

    }
    function subimtActivity($act_id,$std_id,$response_file,$sub_date){
      try{
        $sql = "INSERT into `submitted_activity`(`act_id`, `std_id`, `response_file`, `sub_date`)
                VALUES (:act_id,:std_id,:response_file,:sub_date)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':act_id',$act_id);
        $stmt->bindparam(':std_id',$std_id);
        $stmt->bindparam(':response_file',$response_file);
        $stmt->bindparam(':sub_date',$sub_date);
        $stmt->execute();
        return true;
      }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }  
    }
    function updateActivity($act_id,$std_id,$response_file,$sub_date){
      try{
        $sql = "UPDATE `submitted_activity` set response_file=:response_file,sub_date=:sub_date
                where act_id=:act_id and std_id=:std_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':act_id',$act_id);
        $stmt->bindparam(':response_file',$response_file);
        $stmt->bindparam(':sub_date',$sub_date);
        $stmt->bindparam(':std_id',$std_id);
        $stmt->execute();
        return true;
      }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }  
    }
    function viewAttendace($std_id){
      try{
        $sql = "SELECT * from student_attendance att inner join student_detail st on att.std_id=st.std_id
               inner join course_detail crs on att.crs_id=crs.crs_id 
               where st.std_id='$std_id'";

        $result = $this->db->query($sql);
        return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }  

    }
    function insertOTP($mobile,$otp,$created_time,$expire_time){
      try{
  
          $sql = "INSERT INTO otp(mobile,code,created_time,expire_time) 
                  VALUES(:mobile,:otp,:created_time,:expire_time)";
                  $stmt = $this->db->prepare($sql);
                  $stmt->bindparam(':mobile',$mobile);
                  $stmt->bindparam(':otp',$otp);
                  $stmt->bindparam(':created_time',$created_time);
                  $stmt->bindparam(':expire_time',$expire_time);
                  $stmt->execute();
                  return true;
      }
          catch(PDOException $e){
            echo $e->getMessage();
            return false;
    
          }  

    }

    function deleteVerifiedOTP(){
      try{
          $time = date('h:i:s',time());
          $sql = "DELETE FROM  `otp` where `expire_time`-'$time'<0";
          $result = $this->db->query($sql);
          return $result;
      }
          catch(PDOException $e){
            echo $e->getMessage();
            return false;
    
          } 
    }
    function getGradeReport($std_id,$sem,$dp){
      try{

          $sql = "SELECT * from course_detail cr inner join course_allocation cal
                  on cr.crs_id=cal.crs_id inner join student_mark ma on cr.crs_id=ma.crs_id
                   where cal.current_sem='$sem' and cal.dpt_prg_id='$dp' and ma.std_id='$std_id'" ;

          
          $result = $this->db->query($sql);
          return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }  

    }
    function getTimeTable($sec_id,$date){
      try{

          $sql = "SELECT * from time_table tt inner join course_detail cd on tt.crs_id=cd.crs_id
                  inner join section_detail se on se.sec_id=tt.sec_id 
                   where tt.sec_id = '$sec_id' and  date = '$date' order by start_time" ;

          $result = $this->db->query($sql);
          return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }  

    }
    function sendFeedBack($std_id,$sec_id,$crs_id,$fac_id,$fb_catagory,$message,$sub_date){
      try{
  
          $sql = "INSERT INTO student_feedback(std_id,sec_id,crs_id,fac_id,fb_category,message,sub_date) 
                  VALUES(:std_id,:sec_id,:crs_id,:fac_id,:fb_catagory,:message,:sub_date)";
                  $stmt = $this->db->prepare($sql);
                  $stmt->bindparam(':std_id',$std_id);
                  $stmt->bindparam(':sec_id',$sec_id);
                  $stmt->bindparam(':crs_id',$crs_id);
                  $stmt->bindparam(':fac_id',$fac_id);
                  $stmt->bindparam(':fb_catagory',$fb_catagory);
                  $stmt->bindparam(':message',$message);
                  $stmt->bindparam(':sub_date',$sub_date);
                  $stmt->execute();
                  return true;
      }
          catch(PDOException $e){
            echo $e->getMessage();
            return false;
    
          }  

    }
    function viewExam($sec_id){
      try{

          $sql = "SELECT * from exam ex inner join course_detail cd on ex.crs_id=cd.crs_id
                  inner join section_detail se on se.sec_id=ex.sec_id 
                  where ex.sec_id = '$sec_id' order by start_date" ;

          $result = $this->db->query($sql);
          return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }  

    }
    function goToClassRoom($crs_name){
      try{

          $sql = "SELECT * from google_link gl inner join section_detail st on gl.sec_id = st.sec_id
                  inner join course_detail cd on gl.crs_id=cd.crs_id 
                  where cd.crs_name = '$crs_name' " ;

          $result = $this->db->query($sql);
          return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }  

    }
    function getNotice($sec_id){
      try{
      
          $sql = "SELECT * from notice where sec_id='$sec_id' ";
          $result = $this->db->query($sql);
          return $result;
      }
      catch(PDOException $e){
                echo $e->getMessage();
                return false;
      }

    } 
    function NoticeDetail($notice_id){
      try{

          $sql = "SELECT * from notice where id=:notice_id";
          $stmt = $this->db->prepare($sql);
          $stmt->bindparam(':notice_id',$notice_id);
          $stmt->execute();
          $result = $stmt->fetch();
          return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }  

    }
    function ViewMentor($sec_id){
      try{

          $sql = "SELECT * FROM `section_mentor_list` me inner join `faculty_detail` fc on me.fac_id = fc.fac_id
                   WHERE me.sec_id = $sec_id";
           $result = $this->db->query($sql);
           return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }  

    }
    function ViewAcademic_Calendar(){
      try{

          $sql = "SELECT * FROM `academic_calender`";
           $result = $this->db->query($sql);
           return $result;

      }
       catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }  

    }

    function makePayment($std_id,$name,$email,$card_num,$card_cvc,$exp_month,$exp_year,$itemName,$itemNumber
    ,$itemPrice,$currency,$amount,$balance_transaction,$status,$date){
       try{
        $sql = 
        "INSERT INTO orders(std_id,name,email,card_num,card_cvc,card_exp_month,card_exp_year,
        item_name,item_number,item_price,item_price_currency,paid_amount,
        paid_amount_currency,txn_id,payment_status,created,modified) 

        VALUES(:std_id,:name,:email,:card_num,:card_cvc,:card_exp_month,:card_exp_year,:itemName,
        :itemNumber,:itemPrice,:item_currency,:amount,:paid_currency,:balance_transaction,
        :status,:created,:modified)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindparam($std_id,':std_id');
        $stmt->bindparam($name,':name');
        $stmt->bindparam($email,':email');
        $stmt->bindparam($card_num,':card_num');
        $stmt->bindparam($card_cvc,':card_cvc');
        $stmt->bindparam($exp_month,':card_exp_month');
        $stmt->bindparam($exp_year,':card_exp_year');
        $stmt->bindparam($itemName,':item_name');
        $stmt->bindparam($itemNumber,':item_number');
        $stmt->bindparam($itemPrice,':item_price');
        $stmt->bindparam($currency,':item_currency');
        $stmt->bindparam($amount,':amount');
        $stmt->bindparam($currency,':paid_currency');
        $stmt->bindparam($balance_transaction,':balance_transaction');
        $stmt->bindparam($status,':status');
        $stmt->bindparam($date,':created');
        $stmt->bindparam($date,':modified');
        $stmt->execute();
        return true;
      }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }  
  }
  function Pending_Payment($std_id){
    try{

        $sql = "SELECT * FROM `student_fee` sf inner join `student_detail` st on sf.std_id=st.std_id WHERE sf.std_id='$std_id'";
         $result = $this->db->query($sql);
         return $result;

    }
     catch(PDOException $e){
      echo $e->getMessage();
      return false;

  }  

  }
  function Payment_history($std_id){
    try{

        $sql = "SELECT * FROM `payment` pa inner join `student_detail` st on pa.std_id=st.std_id WHERE pa.std_id='$std_id'";
         $result = $this->db->query($sql);
         return $result;

    }
     catch(PDOException $e){
      echo $e->getMessage();
      return false;

  }  

  }
 
 }

?>