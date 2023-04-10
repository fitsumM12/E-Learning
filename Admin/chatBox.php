<?php
include("partials/header.par.php");
include("partials/nav.par.php");
?>
<p>You have </p>
<p style="background-color:green; float:right;">
<?php
$len=strlen($_GET['msg_body']);
$chars=50;
$initChar=0;
while($chars<$len){
    if($len>=50){
        echo substr($_GET['msg_body'],$initChar,$chars)."<br>";
        $initChar+=50;
        $chars+=50;
    }else{
        echo substr($_GET['msg_body'],$chars)."<br>";
    }
    $len=$len-$initChar;

}
 ?>
 <span style="float:right; margin-right:5%; border-radius:50%; font-size:10px; background-color:cyan;">
<i class="fa fa-check" aria-hidden="true"></i>
<i class="fa fa-check" aria-hidden="true"></i>
</span>
</p>
<br>


<?php
include("partials/footerbrk.php");
include("partials/footer.par.php");
include("partials/script.par.php");
?>