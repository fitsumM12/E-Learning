<?php
 
  require_once 'includes/session.php';
  require_once 'includes/db.php';
  require_once 'includes/header.php'; 
  
  if($_SERVER['REQUEST_METHOD']=='POST'){

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    


    $stdLogin = $crud->stdLogin($email);
    $adminLogin = $crud->adminLogin($email);
    $facultyLogin = $crud->facultyLogin($email);
    $std_pass_db="";
    $admin_pass_db="";
    $faculty_pass_db="";
    //password from db
    if($stdLogin){
      
    $std_pass_db = $stdLogin['password'];
    }
    elseif($adminLogin){
      $admin_pass_db = $adminLogin['password'];
    }
    elseif($facultyLogin){
    $faculty_pass_db = $facultyLogin['password'];
    }
    else{
      echo "Incorrect ";
    }
    // encrypt to compare
    // $std_pass = crypt($pass,$std_pass_db);
    
    
 
      
      if(password_verify($pass,$std_pass_db)){
        $_SESSION['email'] = $stdLogin['email'];
        $_SESSION['std_id'] =  $stdLogin['std_id'];
        $_SESSION['profile_picture'] = $stdLogin['profile_picture'];
        $_SESSION['username'] = $stdLogin['std_name'];
        $_SESSION['current_sem'] = $stdLogin['current_sem'];
        $_SESSION['dp_id'] = $stdLogin['dpt_prg_id'];
        $_SESSION['sec_id'] = $stdLogin['sec_id'];
        header('Location: ../Student/index.php');
      }
   
    
 

    else if(password_verify($pass,$admin_pass_db)){
      $_SESSION['email'] = $email;
      $_SESSION['admin_id'] =  $adminLogin['admin_id'];
      $_SESSION['profile_picture'] = $adminLogin['profile_picture'];
      $_SESSION['username'] = $adminLogin['admin_name'];
      header('Location: ../Admin/index.php');

    }
    else if(password_verify($pass,$faculty_pass_db)){
      $_SESSION['fac_email'] = $email;
      // $_SESSION['fac_id']="2017052001";
       $_SESSION['fac_email']=$facultyLogin['fac_email'];
      // $_SESSION['password']="1234"
      $_SESSION['fac_id'] =  $facultyLogin['fac_id']; 
      $_SESSION['profile_picture'] = $facultyLogin['profile_picture'];
      $_SESSION['username'] = $facultyLogin['fac_name'];
      header('Location: ../Teacher/index.php');

    }
    else{
      include 'includes/error_msg.php';
      // echo $stdLogin['std_name'];
      
      
    }
  }
?>
<style>
.fm {
    border: 2px solid skyblue;
    border-radius: 12px;
    width: 500px;
    margin: auto;
    display: block;



}

.btn[value="Login"] {
    border-radius: 12px;
    margin: auto;
    display: block;
    width: 300px;



}

.btn[value="Login"]:hover {
    cursor: pointer;
    color: Pink;

}

.form-group {
    text-align: center;

}

.lbl {
    color: #6b66d0;
    font-size: 25px;
    text-transform: uppercase;

}
</style>
<h1 class="text-left text-info text-center">
    <ul>USER LOGIN</ul>
</h1>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">

    <div class="form-group">
        <label for="username" class="lbl">User Email</label><span color="red"> *</span>
        <input type="text" class="fm form-control" id="email" name="email"
            value="<?php if($_SERVER['REQUEST_METHOD']=='POST') echo $_POST['email'] ?>">
    </div>

    <div class="form-group">
        <label for="pass" class="lbl">Password</label><span color="red"> *</span>
        <input type="password" class="fm form-control" id="pass" name="pass" required>
    </div>

    <div class="text-center">
        <input type="submit" class="btn btn-primary btn-lg" value="Login" name="login" />
        <a href="verifyOTP.php" class="">Forgot Password</a>
    </div>

</form>

<br><br><br><br>

<?php require_once 'includes/footer.php'; ?>