
	<?php
		include "header.php";
	?>

	<div class="container">
		<div class="order-page">
			<div class="account-sidebar">
				<div class="profil-pic">
					<i class="fa fa-user-circle" aria-hidden="true"></i>
					<?php echo $_SESSION['username'];?>
				</div>
				<div class="sub-menu1">
					<ul>
						<li><a href="FixedAccount.php">অ্যাকাউন্ট</a></li>	
						<li><a href="order.php">অর্ডার সমূহ</a></li>
						<li><a href="account.php">ইডিট অ্যাকাউন্ট</a></li>
						<li><a href="logout.php">লগ আউট</a></li>
					</ul>
				</div>
			</div>
			<div class="view-order">
				<?php
				$cnt=1;
				$email = $_SESSION['email'];
				// $sql="SELECT * FROM orders WHERE  cusemail='$email'";
				// $res=mysqli_query($db,$sql);
				while ($cnt<=4) {
					if($cnt==1){
						$stat='pending';
						echo "<h4> $stat Order</h4>";
						//$cnt++;
					}
					else if($cnt==2){
						$stat='approved';
						echo "<h4> $stat Order</h4>";
						//$cnt++;
					}
					else if($cnt==3){
						$stat='transporting';
						echo "<h4> $stat Order</h4>";
						//$cnt++;
					}
					else if($cnt==4){
						$stat='complete';
						echo "<h4> $stat Order</h4>";
						//$cnt++;
					}
					$cnt++;
					?>

				<div class="seed">
					<?php
					$count=0;
					$query="SELECT * FROM orders WHERE  cusemail='$email' and status='$stat'";
					$result=mysqli_query($db,$query);
					if(mysqli_num_rows($result)==0){echo "NO $stat Order";}
					
					while ($row=mysqli_fetch_assoc($result)) {
						$p_id=$row['order_id'];
						$p_image=$row['img'];
						$p_name=$row['product'];
						$status=$row['status'];
						$p_price=$row['total_price'];
						// $titleone=$row['titleone'];
						// $desone=$row['desone'];
						// $titletwo=$row['titletwo'];
						// $destwo=$row['destwo']; 
						// $titlethree=$row['titlethree'];
						// $desthree=$row['desthree'];
						 $p_cat=$row['category_name'];
						//echo $f_name;

						$count++;
						if(1){
						?>
						<div class="seed-logo">
							<a href="#">
								<img src="img/<?php echo $p_cat;?>/<?php echo $p_image;?>">
								<div class="prod-des">
									<ul>
									<li>নাম : <?php echo $p_name;?></li>
									
									<li>মূল্য : <?php echo $p_price;?> টাকা </li>
									</ul>
								</div>
								<!-- <button class="view-button">View Details</button> -->
							</a>
						</div>		
						<?php
						}
						if($count%4==0) break;
						}
					?>	
									
				</div>

					<?php
				}
				?>
				
			</div>
			
		</div>
	</div>

	<?php
		include "footer.php";
	?>