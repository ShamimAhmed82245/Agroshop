	<?php
		include "header.php";
	?>
		<!-- some chad khrishi img start-->
		
		<section class="dis-details">
			<?php
			if(isset($_GET['prod_id'])){
				$prod_id=$_GET['prod_id'];
				$prod_cat=$_GET['prod_cat'];
					$query1="SELECT * FROM category WHERE cat_id=$prod_cat";
					$result1=mysqli_query($db,$query1);
					while($rows=mysqli_fetch_assoc($result1)){
						$cat_id=$rows['cat_id'];
						$cat_name=$rows['cat_name'];
						$cat_ban_name=$rows['cat_ban_name'];
					}

						$query="SELECT * FROM $cat_name WHERE p_id=$prod_id";
						$result=mysqli_query($db,$query);
						while ($row=mysqli_fetch_assoc($result)) {
							$p_id=$row['p_id'];
							$p_image=$row['p_image'];
							$titleone=$row['titleone'];
							$desone=$row['desone'];
							$titletwo=$row['titletwo'];
							$destwo=$row['destwo']; 
							$titlethree=$row['titlethree'];
							$desthree=$row['desthree'];
							$p_cat=$row['p_cat'];
							//echo $f_name;
							?>
							<div class="dis-row">
								
								<div class="disimage"style="margin-top: 10px;">
								<h4><?php echo $desone;?></h4>
								<img src="img/<?php echo $cat_name;?>/<?php echo $p_image;?>"> 
							</div>
							<div class="disdescription">
								<h4><?php echo $titleone;?></h4> <br>
								<p><?php echo $desone;?></p>
								<h4><?php echo $titletwo;?></h4> <br>
								<p><?php echo $destwo;?></p>
								
							</div>
							</div>
							

							<h4><?php echo $titlethree;?></h4> <br>
								<p><?php echo $desthree;?></p>
							<?php 
						}	
			}
		?>
		</section>
	
	<?php
		include "footer.php";
	?>