
	<?php
		include "header.php";
	?>

		<!-- some seeds banner start -->
		<div class="container">
			<div class="description"> 
				<h3> বীজ</h3> 
			</div> 
			<?php
				$query1="SELECT * FROM seed";
				$result1=mysqli_query($db,$query1);
				$numOfRows=mysqli_num_rows($result1);
				if($numOfRows%12==0){
					$total_page=$numOfRows/12;
				}
				else{
					$total_page=intval($numOfRows/12)+1;
				}
				$numofPage=isset($_GET['no_page'])?$_GET['no_page']:1;
				$count=($numofPage-1)*12;
				$countEnd=($numofPage-1)*12+12;
				if($countEnd>$numOfRows){
					$countEnd=$numOfRows;
				}
				while(($count<$countEnd)){
					if($count%4==0){
						$start=$count;
						if($count+4>$numOfRows){
							$end=$numOfRows;
						}else{
							$end=$count+4;
						}
					}
					?>
					<div class="seed">
						<?php
						$query="SELECT * FROM seed LIMIT $start,$end";
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
							//echo $f_name;

							$count++;
							?>
							<div class="seed-logo">
									<a href="single.php?prod_id=<?php echo $p_id;?>&prod_cat=<?php echo $p_cat;?>">
										<img src="img/seed/<?php echo $p_image;?>">
										<div class="prod-des">
											<ul>
											<li>নাম : <?php echo $p_name;?></li>
											<li>সঃখ্যা : <?php echo $p_weight;?> টি</li>
											<li>মূল্য : <?php echo $p_price;?> টাকা </li>
											</ul>
										</div>
										<button class="view-button">View Details</button>
									</a>
								</div>
							<?php 
							if($count%4==0) break;
						}
					?>	
								
					</div>
				<?php
				}
			?>
			
		</div>
		
		<!-- pagination start -->
		<div class="container">
			<div class="page">
				<?php
					for ($i=1; $i <=$total_page ; $i++) { 
						?>
							<div class="page-num">
								<a href="seed.php?no_page=<?php echo $i;?>"><?php echo $i;?></a>
							</div>
						<?php
					}
				?>
			</div>
		</div>
		
	<?php
		include "footer.php";
	?>