
	<?php
		include "header.php";
	?>
	
		<!-- some chad khrishi img start-->
		<div class="roof-container">
			<!-- <img src="img/roof/rb.jpg"> -->
			<div class="roof">
				<div class="mySlides fade">
					<img src="img/roof/r1.jpg">
				</div>
				<div class="mySlides fade">
					<img src="img/roof/r2.jpg">
				</div>
				<div class="mySlides fade">
					<img src="img/roof/r3.jpg">
				</div>
				<div class="mySlides fade">
					<img src="img/roof/r4.jpeg">
				</div>
				<div class="mySlides fade">
					<img src="img/roof/r5.jpg">
				</div>
				<div class="mySlides fade">
					<img src="img/roof/r6.jpg">
				</div>
				<div class="mySlides fade">
					<img src="img/roof/r7.jpg">
				</div>
				<div class="mySlides fade">
				<img src="img/roof/r8.jpg">
			</div>
			</div>
		<br>
		<div style="text-align:center">
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		</div>
		</div>
		<!-- some chad khrishi img end-->
		<!-- some seeds banner start -->
		<div class="container">
			<div class="description">
				<h3>বীজ নিয়ে আজকের অফার</h3> 
			</div> 
			<div class="seed">
						<?php
						$query="SELECT * FROM seed WHERE offer>=0 LIMIT 4";
						$result=mysqli_query($db,$query);
						while ($row=mysqli_fetch_assoc($result)) {
							$p_id=$row['p_id'];
							$p_image=$row['p_image'];
							$p_name=$row['p_name'];
							$p_weight=$row['p_weight'];
							$p_price=$row['p_price'];
							$titleone=$row['titleone'];
							$desone=$row['desone'];
							$titletwo=$row['titletwo'];
							$destwo=$row['destwo']; 
							$titlethree=$row['titlethree'];
							$desthree=$row['desthree'];
							$p_cat=$row['p_cat'];
							$offer=$row['offer'];
							//echo $f_name;
							?>
							<div class="seed-logo">
									<a href="single.php?prod_id=<?php echo $p_id;?>&prod_cat=<?php echo $p_cat;?>">
										<img src="img/seed/<?php echo $p_image;?>">
										<div class="prod-des">
											<ul>
											<li>নাম : <?php echo $p_name;?></li>
											<li>সঃখ্যা : <?php echo $p_weight;?> টি</li>
											<li>মূল্য : <?php echo $p_price-$p_price*($offer/100);?> টাকা </li>
											<li><del> <?php echo $p_price;?> টাকা </del></li>
											</ul>
										</div>
										<button class="view-button">View Details</button>
									</a>
								</div>
							<?php 
						}
					?>	
								
					</div>
		</div>
		<!-- some seeds banner start -->
		<div class="container">
			<div class="description">
				<h3>সার নিয়ে আজকের অফার</h3> 
			</div> 
			<div class="seed">
						<?php
						$query="SELECT * FROM fertilizer WHERE offer>0 LIMIT 4";
						$result=mysqli_query($db,$query);
						while ($row=mysqli_fetch_assoc($result)) {
							$p_id=$row['p_id'];
							$p_image=$row['p_image'];
							$p_name=$row['p_name'];
							$p_weight=$row['p_weight'];
							$p_price=$row['p_price'];
							$titleone=$row['titleone'];
							$desone=$row['desone'];
							$titletwo=$row['titletwo'];
							$destwo=$row['destwo']; 
							$titlethree=$row['titlethree'];
							$desthree=$row['desthree'];
							$p_cat=$row['p_cat'];
							$offer=$row['offer'];
							//echo $f_name;
							?>
							<div class="seed-logo">
									<a href="single.php?prod_id=<?php echo $p_id;?>&prod_cat=<?php echo $p_cat;?>">
										<img src="img/fertilizer/<?php echo $p_image;?>">
										<div class="prod-des">
											<ul>
											<li>নাম : <?php echo $p_name;?></li>
											<li>সঃখ্যা : <?php echo $p_weight;?> টি</li>
											<li>মূল্য : <?php echo $p_price-$p_price*($offer/100);?> টাকা </li>
											<li><del> <?php echo $p_price;?> টাকা </del>	</li>
											</ul>
										</div>
										<button class="view-button">View Details</button>
									</a>
								</div>
							<?php 
						}
					?>	
								
					</div>
		</div>

	<?php
		include "footer.php";
	?>