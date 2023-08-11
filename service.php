<?php
session_start();
  include("includes/db.php");
 // include("functions/fun.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Strength Sports - Everything related to Sports</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="styles/style.css">


</head>
<body>
     
     <div id="top">  
     	<div class = "container">
     		<div class = "col-md-6 offer">
     			<a href = "#" class="btn btn-success btn sm">
               <?php

                 if(!isset($_SESSION['customer_email']))
                 {
                  echo "Welcome Guest";
                
                 }
                
                 else{
                  $customer_email=$_SESSION['customer_email'];
                  $get_customer="select * from customers where customer_email='$customer_email'";

 
                 $run_cust=mysqli_query($db,$get_customer);
                 $row_cust=mysqli_fetch_array($run_cust);
                 $customer_name=$row_cust['customer_name'];

                    echo "Welcome, ". $customer_name ;
                    
                 }
                    
                ?>

                 </a>

                
                 <span href="cart.php" style="font-size: 12px;">Shopping Cart Total Price: Rs. <?php tatalPrice(); ?>, Total items : <?php item(); ?> </span> 
         
                 
                
                 
     </div>

     <div class = "col-md-6">
         <ul class="menu">
         	<li>
         		<!-- <a href="customer_registration.php">Register</a> -->
            <?php 
                 if(!isset($_SESSION['customer_email']))
                 {
                  echo "<a href='customer_registration.php'>Register</a>";
                 }
                 else{
                  echo "";
                 }

             ?>

         	</li>
         	<li>
         		<!-- <a href="customer/my_account.php">My Account</a> -->
            <?php 
                 if(isset($_SESSION['customer_email']))
                 {
                  echo "<a href='customer/my_account.php'>My Account</a>";
                 }
                 else{
                  echo "<a href='shop.php' style=' text-decoration: none;'><span style='color:orange;' >Buy Quality Products</span></a>" ;
                 }

             ?>
         	</li>
         	<li>
         		<!-- <a href="cart.php">Go to Cart</a> -->
             <?php
                          if(!isset($_SESSION['customer_email']))
                          {
                            echo "<a href='checkout.php'>Shopping Cart</a>";
                          }
                          else{
                            echo "<a href='cart.php'>Shopping Cart</a>";
                          }
                    ?>
         	</li>
         	<li>
         		<?php 
                 if(!isset($_SESSION['customer_email']))
                 {
                  echo "<a href='checkout.php'>Login</p>";
                 }
                 else{
                  echo "<a href='logout.php'>Logout</p>";
                 }

             ?>
         	</li>

         </ul>
        
     </div>

     </div>
 </div>
<div class="navbar navbar-default" id="navbar">
      <div class="container">
      	<div class="navbar-header">
      		 <a class="navbar-brand home" href="index.php">
      		 	<img src="images/logo2.png" class="hidden-xs">
      		 	<img src="images/logo1.png" class="visible-xs">
      		 </a>
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
             	<span class="sr-only">Toggle Navigation</span>
             	<i class="fa fa-align-justify"></i>

             	
             </button>
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
             
             <span class="sr-only"></span>
             <i class="fa fa-search"></i>
  
             </button>
         </div>

             <div class="navbar-collapse collapse" id="navigation">
             	<div class="padding-nav">
             		<ul class="nav navbar-nav navbar-left">
             			<li>
                             <a href="index.php">Home</a>
             			</li>
             			<li>
                          <a href="shop.php">Shop</a>
             			</li>
                          <li>
                         <!--  ?php
                          if(!isset($_SESSION['customer_email']))
                          {
                            echo "<a href='checkout.php'>My Account</a>";
                          }
                          else{
                            echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                          }
                          ?> -->

                          <?php 
                 if(isset($_SESSION['customer_email']))
                 {
                  echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                 }
                 else{
                  echo "" ;
                 }

             ?>

             			</li>
             			<li>
                          <!-- <a href="cart.php">Shopping Cart</a>-->
                           <?php
                          if(!isset($_SESSION['customer_email']))
                          {
                            echo "<a href='checkout.php'>Shopping Cart</a>";
                          }
                          else{
                            echo "<a href='cart.php'>Shopping Cart</a>";
                          }
                          ?>
             			</li>
             			<li>
                          <a href="about.php">About Us</a>
             			</li>
             			<li class="active">
                          <a href="service.php">Services</a>
             			</li>
             			<li>
                          <a href="contact.php">Contact</a>
             			</li>
             			<li>
                          
             			</li>
                     
             		</ul>
             	</div>

             		<div>
             			<a href="#" class="btn btn-primary navbar-btn right">
             				<i class="fa fa-shopping-cart">
             				</i>
                   <span>
                      <?php item(); ?> items in cart
                    </span>
             				
             			</a>
                    </div>
             			<div class="navbar-collapse collapse right">
             				<button class="btn navbar-btn btn-primary"type="button" data-toggle="collapse" data-target="#search"
             				>
             				<span class="sr-only">Toggle search
             					
             				</span>
             				<i class="fa fa-search"></i>
             					
             				</button>
             			</div>
             			
                   <div class="collapse clearfix" id="search">

                   	<form class="navbar-form" method="get" action="result.php">
                   		<div class="input-group">
                   			<input type="text" name="user_query" placeholder="search"
                   			class="form-control" required>
                             <span class="input-group-btn">
                             	<button
                   			type="submit" value="Search" name ="search" class="btn btn-primary">
                   				<i class="fa fa-search"></i>
                   			</button>
                             </span>
                   			
                   			

                   		</div>
                   		
                   	</form>
                   	

                   </div>

             		
             </div>


      	</div>
</div>





<div class="box">
	
 <h1 style="text-align: center;font-weight:bolder;">Our Services</h1>
 <hr/>
 <p style="text-align: justify;font-size:18px;">

We work very hard to ensure that you have the best possible shopping experience with us however we do understand that there will be some rare cases where you may want to return, replace, or exchange your products. All such processes are governed by our standard policies which are designed to keep in mind your convenience. Please do read our policies carefully and we would be happy to answer your queries-<br/>

<strong><u>Types of Products</u></strong><br/>
Our portal is designed to service your needs around school products and services. We classify our product range into two specific categories as follows: <br/>

<strong>School Mandated Products & Services</strong> - These are the products and services which are mandated by your school. These products are specifically designed/produced/customized for the school and are typically available for purchase on your customized school store on our site.<br/>

<strong>Other Products & Services</strong> - Any product other than the School Mandated Products are classified as ‘Other Products’.<br/>

Our policies for each of the above product types may vary and hence it is important that you understand the difference before making your purchase decision.<br/>

<strong>Order Update</strong><br/>
All orders placed on Strength Sports India are subject to the following order update policies. Order update is applicable for those orders which are captured on our portal and not yet dispatched from our warehouse.<br/>

School Mandated Products & Services	Other Products & Services
Order update is allowed for these products.<br/>

You may update the order before the products are delivered to you by contacting our ever helpful customer service team and placing an order update request. <br/>

Order update is allowed for these products.<br/>

You may update the order before the products are delivered to you by contacting our ever helpful customer service team and placing an order update request.<br/>

<strong>Order Cancellation</strong><br/>
All orders placed on Strength Sports India are subject to the following order cancellation policies.<br/>

School Mandated Products & Services	Other Products & Services
Order cancellation is not allowed for these products.<br/>

You may cancel the order before the products are delivered to you by contacting our ever helpful customer service team and placing a cancellation request.<br/>

<strong>Product Returns</strong><br/>
All orders placed on Strength Sports India are subject to the following order returns policies.<br/>

School Mandated Products & Services	Other Products & Services
Product return is not allowed for these products<br/>

Product return is allowed for these products (except for the products which are part of the promotions like Clearance Sale).<br/>

You may return the products delivered to you by contacting our ever helpful customer service team and placing a return request within 7 working days after the receipt of the product.<br/>

We will not be able to process the return request after 7 days of delivery of the product(s).<br/>

<strong>Product Exchange</strong><br/>
All orders placed on Strength Sports India are subject to the following product exchange.
<br/>
School Mandated Products & Services	Other Products & Services
Product exchange is allowed for these products-<br/>

You may exchange the products delivered to you by contacting our ever helpful customer service team and placing a product exchange request within 7 working days** after the receipt of the product.<br/>

We will not be able to process the exchange request after 7 days of delivery of the product(s).<br/>

We will levy a nominal product exchange charge of Rs 200/- per order to facilitate pick-up of products from your location and also delivery of the replacement products as per your request.<br/>

Please ensure that products are not used and all the products tags and boxes are intact. We will not be able to process the exchange in case the above is not in order.<br/>

<strong>** Please Note- Due to Covid-19, we have extended the exchange window beyond 7 days and will allow one time replacement until 31st December, 2021. Costs will be applicable, as per stated process</strong>

<strong>Payments</strong><br/>
School Mandated Products & Services	Other Products & Services
Net Banking; Credit Card; Wallets; UPI<br/>

Cash on Delivery (COD) NOT applicable for these products<br/>

Net Banking; Credit Card; Wallets; UPI<br/>

Cash on Delivery (COD)** applicable for these products<br/>

<strong>** COD is not applicable until 31st December 2021. We are accepting only paid orders to ensure contactless delivery.</strong><br/>

<strong><u>Shipping Policy</u></strong><br/>

School Mandated Products & Services	Other Products & Services
Fixed charges of 99 INR applicable for all orders. <br>

For remote locations and locations in the states of Jammu and Kashmir, North Eastern States and Sikkim, there will be an additional Rs 100 towards remote location charge for all orders.<br/>

Fixed Charges of 99 INR applicable for all orders.<br/>

For remote locations and locations in the states of Jammu and Kashmir, North Eastern States and Sikkim, there will be an additional Rs 100 towards remote location charge for all orders.<br/>

<strong>Order Refund</strong>
All orders placed on Strength Sports India are subject to our standard refund policies. The refund process is applicable to orders which are approved from received cancellation requests. You may request for a refund after cancelling your order by contacting our ever helpful customer service team and placing a refund request. We will issue a credit note/credit points equivalent to the value of the order to your account and the same can be redeemed until 31st March 2021 from the date of issuance of the credit note for any transaction on Strength Sports India.in.<br/>

<strong>IMPORTANT NOTE </strong>- The company reserves the right to change the policies from time-to-time and the customer agrees to the updated and revised changes in policy. </p>
<center> <img src="images/aboutus.png" alt="About Strength Sports"  /></center>

</div>



<!--------------footer start---->
<?php 
    include("includes/footer.php");

 ?>
<!-------footer end------->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>













