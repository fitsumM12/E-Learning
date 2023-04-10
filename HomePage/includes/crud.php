<?php
    class crud{
      private $db;

      function __construct($conn){
        $this->db = $conn;
      }
      public function insertForm($std_id,$name,$email,$mobile,$gender,$dob,$maritalStatus,$current_address,$permanent_address,$destination1,$destination2,$destination3,$p10thPercentage,$p12thPercentage,$destination4,$em_name,$em_email,$em_mobile,$date,$mypass,$sdp_id,$current_sem){
  
      try{
        // one student can only registered once
        $count = $this->InsertOneUserOnly($email);
        if($count['num']>0){
          echo "user already exist<br>";
          return false;
        }
        else{
            
          $sql = "INSERT INTO `student_detail`(`std_id`, `std_name`, `email`, `contact`, `gender`, `dob`, `marital_status`, `current_address`, `permanent_address`, `profile_picture`,`10th_certificate`, `12th_certificate`, `10th_percentage`, `12th_percentage`, `residential_certificate`, `em_name`, `em_email`, `em_mobile`, `issue_date`, `password`, `dpt_prg_id`, `current_sem`) 
                                VALUES (:std_id,:std_name,:email,:mobile,:gender,:dob,:maritalStatus,:current_address,:permanent_address,:cpro,:c10th,:c12th,:p10th,:p12th,:RC,:em_name,:em_email,:em_mobile,:issue_date,:mypass,:sdp_id,:current_sem)";
          $stmt = $this->db->prepare($sql);

          $stmt->bindparam(':std_id',$std_id);
          $stmt->bindparam(':std_name',$name);
          $stmt->bindparam(':email',$email);
          $stmt->bindparam(':mobile',$mobile);
          $stmt->bindparam(':gender',$gender);
          $stmt->bindparam(':dob',$dob);
          $stmt->bindparam(':maritalStatus',$maritalStatus);
          $stmt->bindparam(':current_address',$current_address);
          $stmt->bindparam(':permanent_address',$permanent_address);
          $stmt->bindparam(':cpro',$destination1);
          $stmt->bindparam(':c10th',$destination2);
          $stmt->bindparam(':c12th',$destination3);
          $stmt->bindparam(':p10th',$p10thPercentage);
          $stmt->bindparam(':p12th',$p12thPercentage);
          $stmt->bindparam(':RC',$destination4);
          $stmt->bindparam(':em_name',$em_name);
          $stmt->bindparam(':em_email',$em_email);
          $stmt->bindparam(':em_mobile',$em_mobile);
          $stmt->bindparam(':issue_date',$date);
          // $stmt->bindparam(':prog_id',$prog_id);
          // $stmt->bindparam(':dpt_id',$dpt_id);
          $stmt->bindparam(':mypass',$mypass);
          $stmt->bindparam(':sdp_id',$sdp_id);
          $stmt->bindparam(':current_sem',$current_sem);

          $stmt->execute();
          return true;

        }


      }
       catch(EXCEPTION $e){
         return false;
         echo $e->getMessage();
         echo PDO::errorinfo();
       }
     }
    public function getDept_prog($dpt_id,$prg_id){
      try{

        $sql = "SELECT dpt_prg_id FROM `dpt_program` dp inner join `dpt_detail` dd  on dp.dpt_id=dd.dpt_id
                inner join program pr on dp.prg_id=pr.prg_id where dd.dpt_id=:dpt_id and pr.prg_id=:prg_id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':dpt_id',$dpt_id);
                $stmt->bindparam(':prg_id',$prg_id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
      }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }

    }
    public function getDepartment(){
      try{

        $sql = "SELECT * FROM `dpt_detail`";
        $result = $this->db->query($sql);
        return $result;
      }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }

    }
    public function getProgram(){
      try{

        $sql = "SELECT * FROM `program`";
        $result = $this->db->query($sql);
        return $result;
      }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }

    }
    public function InsertOneUserOnly($email){
      try{

    
        $sql = "SELECT count(*) AS num FROM `student_detail` WHERE email=:email";
        $stmt = $this->db->prepare($sql);
        //bind parameter
        $stmt->bindparam(':email',$email);
        //excuete stmnt
        $stmt->execute();
        //fetch into result
        $result = $stmt->fetch();
        // return the result
        return $result;
      }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }

    }

    public function getDepartmentById($id){
      try{

        $sql = "SELECT * FROM `dpt_detail` WHERE dpt_id=:id";
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

    public function stdLogin($email){
      try{
  
        
              
        $sql = "SELECT * FROM `student_detail` WHERE email=:email or contact=:contact";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':email',$email);
        $stmt->bindparam(':contact',$email);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;

      }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }

    }

    public function adminLogin($email){
      try{
  
              
          $sql = "SELECT * FROM `admin_detail` WHERE email=:email";
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
    public function facultyLogin($email){
      try{
  
              
          $sql = "SELECT * FROM `faculty_detail` WHERE fac_email=:email";
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
    public function updatePassword($email,$pass){
      try{

        $sql = "UPDATE `student_detail` set password=:pass where email=:email";

        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':email',$email);
        $stmt->bindparam(':pass',$pass);
        $result  = $stmt->execute();
        return $result;
    }
    catch(PDOException $e){
      echo $e->getMessage();
      return false;

    }

    }
    public function getDeptDetail($dpt_id){
      try{       
          $sql = "SELECT * FROM `dpt_detail` WHERE dpt_id=:dpt_id";
          $stmt = $this->db->prepare($sql);
          $stmt->bindparam(':dpt_id',$dpt_id);
          $stmt->execute();
          $result = $stmt->fetch();
          return $result;
      }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }

    }
    public function insertContact($username,$email,$subject,$message){
      try{       
          $sql = "INSERT INTO `contact`(username,email,subject,message)VALUES(:username,:email,:subject,:message)";
          $stmt = $this->db->prepare($sql);
          $stmt->bindparam(':username',$username);
          $stmt->bindparam(':email',$email);
          $stmt->bindparam(':subject',$subject);
          $stmt->bindparam(':message',$message);
          $stmt->execute();
          return true;
      }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;

      }

    }
    public function insertMenu(){
      try{

        $sql = "SELECT  * from menu";
        $result = $this->db->query($sql);
        return $result;
      }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }

    }
    public function course_detail(){
      try{
        $sql = "SELECT * FROM dpt_detail";
        $result = $this->db->query($sql);
        return $result;
      
    }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;
      }

  }
  public function faculty_detail(){
    try{
      $sql = "SELECT * FROM faculty_detail";
      $result = $this->db->query($sql);
      return $result;
    
  }
    catch(PDOException $e){
      echo $e->getMessage();
      return false;
    }

}
public function student_detail(){
  try{
    $sql = "SELECT * FROM student_detail";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}
  public function search_course($keyword){
    try{
      
      $sql = "SELECT * FROM  dpt_detail WHERE dpt_name LIKE '%$keyword%' OR dpt_detail LIKE '%$keyword%'";
      $result = $this->db->query($sql);
      return $result;
    
  }
    catch(PDOException $e){
      echo $e->getMessage();
      return false;
    }

}
public function view_promotion(){
  try{
    
    $sql = "SELECT * FROM  promotion";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}
public function view_single_promotion($promo_id){
  try{
    
    $sql = "SELECT * FROM  promotion where promo_id=$promo_id";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}
public function faculty_promotion(){
  try{
    
    $sql = "SELECT * FROM  faculty_detail";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }
}


public function insertPost($post_title,$post_desc,$post_status,$post_date,$post_category,$post_author,$post_image){
  try{       
      $sql = "INSERT INTO `blogs`(post_title,post_desc,post_status,post_date,post_category_id,post_author,post_image)
              VALUES(:ptitle,:pdesc,:pstatus,:pdate,:pcat,:pauthor,:pimage)";
      $stmt = $this->db->prepare($sql);
      $stmt->bindparam(':ptitle',$post_title);
      $stmt->bindparam(':pdesc',$post_desc);
      $stmt->bindparam(':pstatus',$post_status);
      $stmt->bindparam(':pdate',$post_date);
      $stmt->bindparam(':pcat',$post_category);
      $stmt->bindparam(':pauthor',$post_author);
      $stmt->bindparam(':pimage',$post_image);
      $stmt->execute();
      return true;
  }
  catch(PDOException $e){
    echo $e->getMessage();
    return false;

  }

}
  public function get_recentBlog(){
    try{
      
      $sql = "SELECT * FROM  blogs where post_status='published'";
      $result = $this->db->query($sql);
      return $result;
    
  }
    catch(PDOException $e){
      echo $e->getMessage();
      return false;
    }
  }
  public function View_allBlog(){
    try{
      
      $sql = "SELECT * FROM  blogs b inner join blog_category bc on b.post_category_id=bc.cat_id";
      $result = $this->db->query($sql);
      return $result;
    
  }
    catch(PDOException $e){
      echo $e->getMessage();
      return false;
    }
  }
  public function delete_Blog($post_id){
    try{
      
      $sql = "DELETE FROM  blogs WHERE post_id=$post_id";
      $result = $this->db->query($sql);
      return $result;
    
  }
    catch(PDOException $e){
      echo $e->getMessage();
      return false;
    }
  }
  public function get_popularBlog(){
    try{
      
      $sql = "SELECT * FROM  blogs where post_status='published' order by post_view_counter desc Limit 5;";
      $result = $this->db->query($sql);
      return $result;
    
  }
    catch(PDOException $e){
      echo $e->getMessage();
      return false;
    }
  }
  
  public function get_singleBlog($post_id){
      try{
        
        $sql = "SELECT * FROM  blogs WHERE post_id='$post_id'";
        $result = $this->db->query($sql);
        return $result;
      
    }
      catch(PDOException $e){
        echo $e->getMessage();
        return false;
      }

}
  
public function get_Blog_by_category($cat_id){
  try{
    
    $sql = "SELECT * FROM  blogs WHERE post_category_id='$cat_id'";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}
public function get_archiveBlog(){
  try{
    
    $sql = "SELECT * FROM  blogs WHERE post_status='archive' order by post_date desc";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}
public function searchBlog($keyword){
  try{
    
    $sql = "SELECT * FROM  blogs WHERE post_title LIKE '%$keyword%' OR post_desc LIKE '%$keyword%' ";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}

public function update_post_view_counter($post_id){
  try{
    $sql = "UPDATE `blogs` set post_view_counter=post_view_counter+1 where post_id=:post_id";

    $stmt = $this->db->prepare($sql);
    $stmt->bindparam(':post_id',$post_id);
    $result  = $stmt->execute();
    return $result;
}
catch(PDOException $e){
  echo $e->getMessage();
  return false;

}

}
public function updateBlog($post_id,$post_title,$post_category_id,$post_image,$post_desc,$post_status){
   try{
    $sql = "UPDATE `blogs` set `post_title`=:post_title,`post_image`=:post_image,`post_desc`=:post_desc,
            `post_status`=:post_status,`post_category_id`=:post_category_id WHERE post_id=:post_id";

    $stmt = $this->db->prepare($sql);
    $stmt->bindparam(':post_id',$post_id);
    $stmt->bindparam(':post_title',$post_title);
    $stmt->bindparam(':post_category_id',$post_category_id);
    $stmt->bindparam(':post_image',$post_image);
    $stmt->bindparam(':post_desc',$post_desc);
    $stmt->bindparam(':post_status',$post_status);
    $result  = $stmt->execute();
    return $result;
  }
  catch(PDOException $e){
    echo $e->getMessage();
    return false;

  }

}
public function updatePostStatus($post_id,$post_status){
  try{
   $sql = "UPDATE `blogs` set `post_status`=:post_status WHERE post_id=:post_id";

   $stmt = $this->db->prepare($sql);
   $stmt->bindparam(':post_id',$post_id);
   $stmt->bindparam(':post_status',$post_status);
   $result  = $stmt->execute();
   return $result;
 }
 catch(PDOException $e){
   echo $e->getMessage();
   return false;

 }

}
public function insertCategory($cat_title){
  try{       
      $sql = "INSERT INTO `blog_category`(cat_title)VALUES(:cat_title)";
      $stmt = $this->db->prepare($sql);
      $stmt->bindparam(':cat_title',$cat_title);
      $stmt->execute();
      return true;
  }
  catch(PDOException $e){
    echo $e->getMessage();
    return false;

  }

}
public function get_Category(){
  try{
    
    $sql = "SELECT * FROM  blog_category";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}

public function get_singleCategory($cat_id){
  try{
    
    $sql = "SELECT * FROM  blog_category WHERE cat_id=$cat_id";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}
public function updateCategory($cat_id,$cat_title){
  try{
   $sql = "UPDATE `blog_category` set `cat_title`=:cat_title WHERE cat_id=:cat_id";

   $stmt = $this->db->prepare($sql);
   $stmt->bindparam(':cat_id',$cat_id);
   $stmt->bindparam(':cat_title',$cat_title);
   $result  = $stmt->execute();
   return $result;
 }
 catch(PDOException $e){
   echo $e->getMessage();
   return false;

 }

}
public function delete_category($cat_id){
  try{
    
    $sql = "DELETE FROM  blog_category WHERE cat_id=$cat_id";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }
}
public function Category_counter($cat_id){
  try{
    
    $sql = "SELECT count(post_category_id) FROM  blogs where post_category_id=$cat_id";
    $stmt = $this->db->query($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}
public function get_studentReview(){
  try{
    
    $sql = "SELECT * FROM `student_review` WHERE `review_status`='approved'";
    $result = $this->db->query($sql);
    return $result;
  }
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}


public function insertComment($post_id,$comment_author,$comment_email,$comment,$date){
  try{       
      $sql = "INSERT INTO `blog_comment`(post_id,comment_author,comment_email,comment,comment_date)VALUES(:post_id,:comment_author,:comment_email,:comment,:date)";
      $stmt = $this->db->prepare($sql);
      $stmt->bindparam(':post_id',$post_id);
      $stmt->bindparam(':comment_author',$comment_author);
      $stmt->bindparam(':comment_email',$comment_email);
      $stmt->bindparam(':comment',$comment);
      $stmt->bindparam(':date',$date);
      $stmt->execute();
      return true;
  }
  catch(PDOException $e){
    echo $e->getMessage();
    return false;

  }

}
public function insertReplayComment($post_id,$comment,$date){
  try{       
      $sql = "INSERT INTO `blog_comment`(post_id,comment_author,comment_email,comment,comment_date)VALUES(:post_id,:comment_author,:comment_email,:comment,:date)";
      $stmt = $this->db->prepare($sql);
      $stmt->bindparam(':post_id',$post_id);
      $stmt->bindparam(':comment_author',$comment_author);
      $stmt->bindparam(':comment_email',$comment_email);
      $stmt->bindparam(':comment',$comment);
      $stmt->bindparam(':date',$date);
      $stmt->execute();
      return true;
  }
  catch(PDOException $e){
    echo $e->getMessage();
    return false;

  }

}
public function get_All_Comment(){
  try{
    
    $sql = "SELECT * FROM  blog_comment bc inner join blogs bg on bc.post_id-bg.post_id";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}
public function delete_comment($comment_id){
  try{
    
    $sql = "DELETE FROM  blog_comment WHERE comment_id=$comment_id";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }
}
public function updateCommentStatus($comment_id,$comment_status){
  try{
   $sql = "UPDATE `blog_comment` set `comment_status`=:comment_status WHERE comment_id=:comment_id";

   $stmt = $this->db->prepare($sql);
   $stmt->bindparam(':comment_id',$comment_id);
   $stmt->bindparam(':comment_status',$comment_status);
   $result  = $stmt->execute();
   return $result;
 }
 catch(PDOException $e){
   echo $e->getMessage();
   return false;

 }

}
public function get_comments($post_id){
  try{
    
    $sql = "SELECT * FROM blog_comment where post_id=$post_id";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}
public function get_comment_replay($comment_id){
  try{
    
    $sql = "SELECT * FROM  comment_replay WHERE comment_id='$comment_id'";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}
public function comment_counter($post_id){
  try{
    
    $sql = "SELECT COUNT(*) as counter FROM  blog_comment WHERE post_id='$post_id'";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }

}
public function insertPromo($promo_title,$promo_desc,$promo_date,$promo_image,$promo_bg){
  try{       
      $sql = "INSERT INTO `promotion`(promo_title,promo_desc,promo_date,promo_image,background)
              VALUES(:ptitle,:pdesc,:pdate,:pimage,:pbg)";
      $stmt = $this->db->prepare($sql);
      $stmt->bindparam(':ptitle',$promo_title);
      $stmt->bindparam(':pdesc',$promo_desc);
      $stmt->bindparam(':pdate',$promo_date);
      $stmt->bindparam(':pimage',$promo_image);
      $stmt->bindparam(':pbg',$promo_bg);
      $stmt->execute();
      return true;
  }
  catch(PDOException $e){
    echo $e->getMessage();
    return false;

  }

}
public function delete_promotion($promo_id){
  try{
    
    $sql = "DELETE FROM  promotion WHERE promo_id=$promo_id";
    $result = $this->db->query($sql);
    return $result;
  
}
  catch(PDOException $e){
    echo $e->getMessage();
    return false;
  }
}
public function updatePromo($promo_id,$promo_title,$promo_bg,$promo_image,$promo_desc,$promo_date){
  try{
   $sql = "UPDATE `promotion` set `promo_title`=:promo_title,`background`=:promo_bg,
   `promo_image`=:promo_image,`promo_desc`=:promo_desc,`promo_date`=:promo_date
    WHERE promo_id=:promo_id";

   $stmt = $this->db->prepare($sql);
   $stmt->bindparam(':promo_id',$promo_id);
   $stmt->bindparam(':promo_title',$promo_title);
   $stmt->bindparam(':promo_image',$promo_image);
   $stmt->bindparam(':promo_desc',$promo_desc);
   $stmt->bindparam(':promo_bg',$promo_bg);
   $stmt->bindparam(':promo_date',$promo_date);
   $result  = $stmt->execute();
   return $result;
 }
 catch(PDOException $e){
   echo $e->getMessage();
   return false;

 }

}
   

}

?>