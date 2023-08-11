<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts  --->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Orders Returns

</li>

</ol><!-- breadcrumb Ends  --->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> View Orders Return List

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>
<th>Sr. No.</th>
<th>Order No</th>
<th>Customer Email</th>
<th>Product Name</th>
<th>Payment Mode Accepted</th>
<th>Amount to be Return</th>
<th>Return Order Issue Date</th>


</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php

$i = 0;

$get_orders = "select * from order_return";

$run_orders = mysqli_query($con,$get_orders);

while ($row_orders = mysqli_fetch_array($run_orders)) {

$order_id = $row_orders['order_id'];

$cust_email = $row_orders['customer_email'];

$return_date = $row_orders['return_date'];

$amount = $row_orders['amount_return'];

$payment_mode = $row_orders['payment_mode'];

$get_products = "select product_title from products where product_id=(select product_id from customer_order where order_id='$order_id')";

$run_products = mysqli_query($con,$get_products);

$row_products = mysqli_fetch_array($run_products);

$product_title = $row_products['product_title'];


$i++;

?>

<tr>

<td><?php echo $i; ?></td>

<td>
<?php 

echo $order_id;

 ?>
 </td>

<td bgcolor="yellow" ><?php echo $cust_email; ?></td>

<td><?php echo $product_title; ?></td>

<td><?php echo $payment_mode ?></td>

<td><?php echo $amount; ?></td>

<td><?php echo $return_date; ?> </td>



</tr>

<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

<style type="text/css">
@media print{
    .no-print{
        display: none;
    }
    .bgcol{
       background-color: #999;
    }
    body{
        padding-top: 1px;
       background: transparent;
    }

    
}
</style>

<button class="btn btn-lg" onclick="window.print()" style="margin-left: 90%;" >Print</button>

</div><!-- 2 row Ends -->


<?php } ?>