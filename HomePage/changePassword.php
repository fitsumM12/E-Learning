
<?php
    require_once("includes/db.php");
  
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $email = $_POST['email'];
      $pass1 = $_POST['pass1'];
      $pass2 = $_POST['pass2'];
      $res1 = $crud->InsertOneUserOnly($email);
     

      if($res1['num']==0){
        echo "<script>alert('please enter Registered Email to our Collage')</script>";
      }
      else if($pass1!==$pass2){
        echo "<script>alert('Password Does not match please check the two password')</script>";
      }
     else{
         $pass1 = password_hash($pass1,PASSWORD_DEFAULT);
        // $hash = "$2y$10$";
        // $salt = $hash."iusesomecrazystrings22";
        // $pass1 = crypt($pass1,$salt);
        $result = $crud->updatePassword($email,$pass1);
        if(!$result){
          echo "<script>alert('Something wents wrong please try again');</script>";
        }else{
          echo "<script>alert('congra your password recovered successfully');</script>";
          header('Location:login.php');
          
        }
      }
    }


?>
<?php  require_once 'includes/header.php'; ?>
 <style>

    .fm{
      border: 2px solid skyblue;
      border-radius: 12px;
      width:500px;
      margin:auto;
      display:block;



    }
    .btn[value="Login"]{
      border-radius:12px;
      margin:auto;
      display:block;
      width:300px;



    }
    .btn[value="Login"]:hover{
      cursor:pointer;
      color:Pink;

    }
    .form-group{
      text-align:center;
      
    }
    .lbl{
      color:#6b66d0;
      font-size:25px;
      text-transform: uppercase;

    }





</style>
<h1 class="text-left text-info text-center"><ul>Change Password</ul></h1>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">

    <div class="form-group">
      <label for="username" class="lbl">Enter Email</label><span color="red"> *</span>
      <input type="email" class="fm form-control" id="email" name="email" value="<?php if($_SERVER['REQUEST_METHOD']=='POST') echo $_POST['email'] ?>">
    </div>

    <div class="form-group">
      <label for="pass" class="lbl">Enter New Password</label><span color="red"> *</span>
      <input type="password" class="fm form-control" id="pass1" name="pass1" required>
    </div>
    <div class="form-group">
      <label for="pass" class="lbl">Confirm Password</label><span color="red"> *</span>
      <input type="password" class="fm form-control" id="pass2" name="pass2" required>
    </div>

    <div class="text-center">
      <input type="submit" class="btn btn-primary btn-lg" value="update" name="update"/>
      <a href="login.php" class="">Return to Login</a>
    </div>

</form>