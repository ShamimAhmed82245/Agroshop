
	<?php
		include "header.php";

	?>

	<div class="container">
		<div class="cart-col">
			<div class="cart-row1">
				<div class="cart-head">
					<p>My Cart</p>
					<div class="order">
					<a href="cart.php?order=yes">Place Order</a>
					</div>
				</div>
				<hr>
				<?php

					$_SESSION['total']=0;
					if (isset($_SESSION['cart'])) {
						$n=count($_SESSION['cart']);
					for ($i=0; $i < 10; $i++) { 
						
						if (isset($_SESSION['cart'][$i])) {
							// code...
						$_SESSION['total']+=$_SESSION['cart'][$i]['product_price']-$_SESSION['cart'][$i]['product_price']*($_SESSION['cart'][$i]['product_offer']/100);
				?>

					<form action="cart.php?action=remove&id=<?php echo $i;?>" method="post">
						<div class="cart-single-item">
						<div class="cart-image">
						<img src="img/<?php echo $_SESSION['cart'][$i]['category_name'];?>/<?php echo $_SESSION['cart'][$i]['product_image'];?>">
						</div>
						<div class="cart-image-des">
							<ul>
								<li>নাম : <?php echo  $_SESSION['cart'][$i]['product_name'];?></li>
								<li>মূল্য : <?php echo  $_SESSION['cart'][$i]['product_price'];?> টাকা</li>
							</ul>
						</div>
						<!-- <div class="item-incre-decrement">
							<button><i class="fa fa-minus" aria-hidden="true"></i></button>
							<button value="2">1</i></button>
							<button><i class="fa fa-plus" aria-hidden="true"></i></button>
						</div> -->

						<div class="item-remove">
							<button type="submit" name="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
						</div>
						
						</div>

					</form>
					<?php
						//echo $i;
					}
				}
					if (isset($_POST['remove'])) {
							// code...
							$z=count($_SESSION['cart']);
							echo $z;
							echo "remove";
							if ($_GET['action']=='remove'){
								unset($_SESSION['cart'][$_GET['id']]);
								 echo "<script>alert('Product has been Removed...!')</script>";
              					 echo "<script>window.location = 'cart.php'</script>";
							}
					}
				}else{
                        echo "<h5>Cart is Empty</h5>";
                    } 
					?>
			</div>
			<?php
			if(isset($_SESSION['cart'])) {
				if (count($_SESSION['cart'])) {
					
				?>
			<div class="cart-row2">
				<div class="cart-bill">
					<p>Price Details</p>
					<hr>
					<div class="price-des">
						<p>Total item : <?php echo $n;?></p>
						<p>Total Price : <?php echo $_SESSION['total'];?></p>
						<p>Delivery charge : 50</p>
						<hr>
						<p>Amount Payable : <?php echo $_SESSION['total']+50;?></p>
					</div>
				</div>
				<?php
					if (isset($_GET['order'])) {
						?>
						<div class="order-form">
							<form method="post">
								<div class="input-group">
									<label>Name</label>
									<input type="text" name="cusname">
								</div>
								<div class="input-group">
									<label>Email</label>
									<input type="text" name="cusemail">
								</div>
								<div class="input-group">
									<label>Phone Number</label>
									<input type="text" name="cusphn">
								</div>
								<div class="input-group">
									<label>Address</label>
									<input type="text" name="cusadd">
								</div>
								<div class="order-payment">
									<a href="checkout.php?price=<?php echo $total+50;?>" class="" ><button type="submit" name="confirm" class="pay_btn">Pay</button></a>
								</div>

								<!-- <div class="cart-button">
									<button type="submit" name="confirm" class="submit-btn">Pay</button>
								</div> -->
							</form>
							<?php 
								if(isset($_POST['confirm'])){
									if($_POST['cusname']==null||$_POST['cusemail']==null||$_POST['cusphn']==null||$_POST['cusadd']==null){
										echo "<script>alert('সমস্ত তথ্য পূরণ করুন..!')</script>";
									}else{
										$_SESSION['cusname']= $_POST['cusname'];
										$_SESSION['cusemail']= $_POST['cusemail'];
										$_SESSION['cusphn']= $_POST['cusphn'];
										$_SESSION['cusadd']= $_POST['cusadd'];
										$_SESSION['status']="pending";
										header('location: checkout.php');

										//$total_price=$_SESSION['cart'][$i];
										// $paymode='cod';
										// //$order_time=;
										// for ($i=0; $i < 10; $i++) {
										// 	if(isset($_SESSION['cart'][$i])) {
										// 		//print_r($_SESSION['cart'][$i]);
										// 		$product=$_SESSION['cart'][$i]['product_name'];
										// 		$img=$_SESSION['cart'][$i]['product_image'];
										// 		$category_id=$_SESSION['cart'][$i]['category_id'];
										// 		$total_price=$_SESSION['cart'][$i]['product_price'];
										// 		$cat_sql="SELECT * FROM category WHERE cat_id=$category_id";
										// 		$cat_res=mysqli_query($db,$cat_sql);
										// 		while($row=mysqli_fetch_assoc($cat_res)){
										// 			$cat_name=$row['cat_name'];
										// 		}
										// 		echo $cat_name;
										// 		$insert_sql="INSERT INTO orders(cusname,cusemail,cusphn,cusadd,	product,category_name,	status,total_price,paymode,	img, order_time) VALUES('$cusname','$cusemail','$cusphn','$cusadd',	'$product','$cat_name',	'$status','$total_price','$paymode','$img', 'now()')";
										// 		$result=mysqli_query($db,$insert_sql);
												
										// 	}
										// }
										// if ($result) {
							   //                  // echo "<script>alert('অর্ডার সফল..!')</script>";
							   //                  // echo "<script>window.location.href='checkout.php';</script>";
										// 		//unset($_SESSION['cart']);
							                    
							                    
							   //          }
								}
							}
							?>
						</div>

						<?php
					}
				?>
			</div>
			<?php
			}
}
			?>

		</div>
		

	</div>
	<?php
		include "footer.php";
	?>