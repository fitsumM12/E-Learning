<?php 
  require_once 'includes/header.php';
  $id = $_SESSION['std_id'];
  $section = $user->getSection($id);
  $result = $user->getFaculty($section['sec_id']);
?>
<style>
.frm .table {
    margin: auto;
    width: 50%;
}

.user {
    margin: 10px;
}

thead {
    background-color: skyblue;

}
</style>
<pre><h1 class="text-primary text-center">Teacher's</h1></pre>
<table class="user table table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Teacher Name</th>
            <th>Teacher Email</th>
            <th>Teacher Mobile</th>
            <th>Course ID</th>
            <th>Class Per Week</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php 
        $count = 1;
        while( $row=$result->fetch(PDO::FETCH_ASSOC) ){
      ?>
        <tr>

            <td> <?php echo $count; ?> </td>
            <td> <?php echo $row['fac_name']; ?> </td>
            <td> <?php echo $row['fac_email']; ?> </td>
            <td> <?php echo $row['fac_contact']; ?> </td>
            <td> <?php echo $row['crs_id']; ?> </td>
            <td> 3 </td>
        </tr>
        <?php $count = $count+1; } ?>
        </tr>
    </tbody>
</table>




<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>