<?php
	include "connection.php";
	ob_start();
	session_start();
?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agro Shop</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/prodcss/prod.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/seed.css">
	<link rel="stylesheet" type="text/css" href="css/dis.css">
	<link rel="stylesheet" type="text/css" href="css/disdetail.css">
	<link rel="stylesheet" type="text/css" href="css/single.css">
	<link rel="stylesheet" type="text/css" href="css/account.css">
	<link rel="stylesheet" type="text/css" href="css/fixedAccount.css">
	<link rel="stylesheet" type="text/css" href="css/cart.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head> 

	<body>
		<!-- header section start-->
		<div class="header">
			<div class="container">
				<div class="nav">
					<div class="logo">
						<img src="img/logo.jpg">
					</div>
					<div class="menu">
						<ul>
							<li><a href="index.php">হোম</a></li>
							<li><a href="seed.php">বীজ</a></li>
							<li><a href="fertilizer.php">ফার্টিলাইজার</a></li>
							<li><a href="equipments.php">কৃষি সরঞ্জাম</a></li>
							<li><a href="disease.php">রোগ এবং প্রতিকার</a></li>
							<li><a href="g/index.html">গ্যালারি</a></li>
							<li>
								<a href="cart.php"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> কার্ট</a>

								<?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                         }
                         else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>

							</li>

							<li>
								<?php 
									if (empty($_SESSION['email'])){
										?>
										<a href="login.php">লগ ইন</a>
										
										<?php
									}else{
										?>
										<a href="#">
											<i class="fa fa-user-circle" aria-hidden="true"></i>
											<?php echo $_SESSION['username'];?>
										</a>
										<div class="sub-menu">
											<ul>
												<li><a href="FixedAccount.php">Account</a></li>
												<li><a href="logout.php">Logout</a></li>
											</ul>
										</div>
										<?php
									}
								?>
								
							</li>
							
						</ul>
					</div>
				</div>
			</div>
		</div >
		<!-- header section end--> 