<?php
      include('../includes/dbh.inc.php');
class loadfile extends elearnDb{
        public function loader(){
           $slt="SELECT * FROM file_management";
           $rs=mysqli_query($this->makeConnect(),$slt);
           if($rs){
           ?>
              <table class="table ">
                    <thead>
                    <tr>
                        <th class="serial">#</th>
                        <th>file name</th>
                         <th>File</th>
                        <th colspan="2">Action</th>

                    </tr>
                    </thead>
                 <tbody>
           <?php
           $i=0;
           while(($row=mysqli_fetch_assoc($rs))>0){
               $i=$i+1;
           ?>
           <tr>
           <td class="serial"><?php echo $i;?></td>

           <td><span class="name"><?php echo $row['fil_name'];?></span></td>
           <td><span class="product"><img src="<?php echo substr($row['fil'],3);?>" width='100px' height='50px'></span></td>
           <td><span class="count"><a href="<?php echo substr($row['fil'],3);?>">Download</a>|<a href="<?php echo substr($row['fil'],3);?>" target="_blank">Read Here</a></span></td>
           </tr>
       <?php }
           echo "</table>";
           }else{
               echo "No file exist!";
           }
        }

    }

$myfile=new loadfile();
$myfile->loader();
?>