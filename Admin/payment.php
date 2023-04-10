 <?php
include("partials/header.par.php");
include("partials/nav.par.php");


require_once $_SERVER["DOCUMENT_ROOT"]."/elearning/Admin/includes/manage_payment.php";

$pmt = new payment();
$transcn = $pmt->getTransaction();
?>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>transaction Id</th>
                <th>Customer name</th>
                <th>Product Name</th>
                <th>Amount</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
    <?php

    while($row = mysqli_fetch_assoc($transcn)){
           echo "<tr>"
        ?>
                <td><?php echo md5($row['txn_id']); ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['paid_amount']; ?></td>
                <td><a href="#">Block Customer</a></td>
                <td><a href="#">Contact Customer</a></td>
            </tr>
        <?php

        }

        ?>
        </tbody>
    </table>
</div>

<hr width="100%" height="10">


<?php
        $dt =date("Y-m-d",time());
        echo "<p class=\"text-center text-success\"><i class=\"fa fa-money\" aria-hidden=\"true\"></i> <b>Total Sale: </b><span>&#36;</span><i>".round($pmt->getTotalTrans($dt))."</i></p>";
include("partials/footerbrk.php");
include("partials/script.par.php");
?>