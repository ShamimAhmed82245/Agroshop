	<?php
		include "header.php";
	?>
		<!-- single product details-->
		
		<section class="single-seed-details">
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
							<div class="single-description">
								<h4><?php echo $titleone;?></h4> <br>
								<p><?php echo $desone;?></p>
								<h4><?php echo $titletwo;?></h4> <br>
								<p><?php echo $destwo;?></p>
								<h4><?php echo $titlethree;?></h4>
								<p><?php echo $desthree;?></p>
							</div>
							<div class="single-image">
								<img src="img/<?php echo $cat_name;?>/<?php echo $p_image;?>"> 
								<div class="single-prod-des">
									<ul>
										<li>নাম : <?php echo $p_name;?></li>
										<li>মূল্য : <?php echo $p_price;?> টাকা</li>
									</ul>
									<form method="post">
										<button type="submit" name="add" class="button pbtn">কার্টে যোগ করুন</button>
									<!-- <button class="button pbtn buy-btn">Buy Now</button> -->
									<input type="hidden" name="productid" value="<?php echo $p_id;?>">
									</form>
				<?php
						if(isset($_POST['add'])){
							//echo "add";
							if (isset($_SESSION['cart'])) {
								//echo $$_POST['productid'];
								//print_r($_SESSION['cart']);
							$itme_array_image=array_column($_SESSION['cart'], "product_image");
							$itme_array_cat=array_column($_SESSION['cart'], "category_id");
								if(in_array($p_image, $itme_array_image)&&in_array($cat_id, $itme_array_cat)){
									echo "<script>alert('পণ্য ইতিমধ্যে কার্ট যোগ করা হয়েছে..!')</script>";
            						echo "<script>window.location.href='#';</script>";
								}else{
									$cnt=count($_SESSION['cart']);
									$item_array = array(
						                'product_id'    => $_POST['productid'],
						                'product_image' =>	$p_image,
						                'product_name' =>	$p_name,
						                'product_price' =>	$p_price,
						                'category_name'   => $cat_name,
						                'category_id'   => $cat_id,
						                'product_offer' => $offer
						            );

						            $_SESSION['cart'][$cnt] = $item_array;
						            //echo "<script>alert('পণ্য কার্ট যোগ করা হয়..!')</script>";
						            echo "<script>window.location.href='#';</script>";
								}

								//$cnt=count($_SESSION['cart']);
								//echo $cnt;
								//print_r($_SESSION['cart']);
							}else{
								 
								$itme_array= array(
									'product_id'=>$_POST['productid'],
									'product_image' =>	$p_image,
									'product_name' =>	$p_name,
									'product_price' =>	$p_price,
									'category_name'   => $cat_name,
									'category_id' => $cat_id,
									'product_offer' => $offer
								);
								// Create new session variable
								$_SESSION['cart'][0]=$itme_array;
								//print_r($_SESSION['cart']);
								echo "<script>window.location.href='#';</script>";
							}
						}


				?>

								</div>
							</div>
							<?php 
						}	
			}
		?>
		</section>
		<section>
			<div class="container">
				<b>রিভিউ</b>
				<hr>
				<div class="rating-wrap">
			<h2>স্টার রেটিং</h2>
			<div class="center">
				<fieldset class="rating">
					<input type="radio" id="star5" name="rating" value="5" class="input" /><label for="star5" class="full" title="Awesome"></label>
					<input type="radio" id="star4.5" name="rating" value="4.5" class="input" /><label for="star4.5" class="half"></label>
					<input type="radio" id="star4" name="rating" value="4" class="input" /><label for="star4" class="full"></label>
					<input type="radio" id="star3.5" name="rating" value="3.5" class="input" /><label for="star3.5" class="half"></label>
					<input type="radio" id="star3" name="rating" value="3" class="input" /><label for="star3" class="full"></label>
					<input type="radio" id="star2.5" name="rating" value="2.5"class="input" /><label for="star2.5" class="half"></label>
					<input type="radio" id="star2" name="rating" value="2" class="input" /><label for="star2" class="full"></label>
					<input type="radio" id="star1.5" name="rating" value="1.5" class="input" /><label for="star1.5" class="half"></label>
					<input type="radio" id="star1" name="rating" value="1" class="input" /><label for="star1" class="full"></label>
					<input type="radio" id="star0.5" name="rating" value="0.5" class="input" /><label for="star0.5" class="half"></label>
				</fieldset>
			</div>

			<h4 id="rating-value"></h4>
		</div>

				<div class="review">

					<b>আপনার মন্তব্য </b>
					<form method="post">
						<div class="input-group">
							<label>নাম</label>
							 <input type="text" name="username">
							 <label>মন্তব্য</label>
						</div>
						<div class="input-group">
							<textarea  name="review" rows="10" cols="100"></textarea>
						</div>
						
						<input type="hidden" name="ratingVal" id="ratingId">
						<div class="review-submit">
							<button type="submit" name="comment">সাবমিট রিভিউ</button>
						</div>
					</form>
					<?php
						//echo "hello";
						//$_POST['ratingVal'];
						if (!empty($_SESSION['email'])) {
								$f=0;
								$query3="SELECT * FROM review";
								$result3=mysqli_query($db,$query3);
								while ($row=mysqli_fetch_assoc($result3)){
									if($row['email']==$_SESSION['email']&&$row['product']==$p_image){
										$f=1;break;
									}
								}
								if($f&&isset($_POST['comment'])){
									echo "<script>alert('রেটিং  আগেই দেয়া হয়েছে ..!')</script>";
            						echo "<script>window.location.href='#;</script>";
								}
								else{
									if (isset($_POST['comment'])&&$_POST['username']!=null&&$_POST['ratingVal']!=null&&$_POST['review']!=null){
									//echo $_POST['username'];
									//echo $_POST['ratingVal'];
									$username = $_POST['username'];
									$ratingVal = $_POST['ratingVal'];
									$review = $_POST['review'];
									$email = $_SESSION['email'];
									$sql = " INSERT INTO review(name,rating,review,product,email) VALUES('$username','$ratingVal','$review','$p_image','$email')";
									$regresult=mysqli_query($db,$sql);
									//$_POST['username']=null;
								}
								else{
									echo "Empty value is not accepted";
								}
							}

						}
						else if (empty($_SESSION['email'])&&isset($_POST['comment'])){
							echo "<script>alert('রেটিং দেয়ার জন্য লগইন করুন ..!')</script>";
            						echo "<script>window.location.href='#;</script>";
						}
					?>
				</div>
				<div class="review-rating">
					<div class="customer-review">
						<b> গ্রাহক  রিভিউ</b>
						<?php
							$on=0;
							$tw=0;
							$th=0;
							$fr=0;
							$fv=0; 
							$query2="SELECT * FROM review ";
							$result2=mysqli_query($db,$query2);
							while($rows=mysqli_fetch_assoc($result2)){
								$customerReviewId=$rows['r_id'];	
								$customerName=$rows['name'];
								$customerRating=$rows['rating'];
								$customerReview=$rows['review'];
								$customerReviewProduct=$rows['product'];
								
								if($p_image==$customerReviewProduct){
									// echo $customerName;
									// echo $customerReview;
									if(ceil($customerRating)==1){
										$on++;
									}
									if(ceil($customerRating)==2){
										$tw++;
									}
									if(ceil($customerRating)==3){
										$th++;
									}
									if(ceil($customerRating)==4){
										$fr++;
									}
									if(ceil($customerRating)==5){
										$fv++;
									}
									?>

									<div class="single-review">
										<p><?php echo $customerReview;?></p>
										<h5>by <?php echo $customerName;

											for ($i=0; $i < floor($customerRating); $i++) { 
													?>
													<i class="fa fa-star" aria-hidden="true"></i>
													<?php
												}
												if (floor($customerRating)!=ceil($customerRating)) {
														?>
														<i class="fa fa-star-half-o" aria-hidden="true"></i><br>
														<?php
													}
										?></h5>
									</div>

									<?php
								}
							}
						?>
					</div>
					<div class="rating-count">
						<b>গড় রেটিং = </b>
						<?php
							if($on==0&&$tw==0&&$th==0&&$fr==0&&$fv==0){
								echo '0';
							}
							else{
								$avg_rating=(1*$on+2*$tw+3*$th+4*$fr+5*$fv)/($on+$tw+$th+$fr+$fv);
								echo $avg_rating;
								echo "<br>";
								for ($i=0; $i <floor($avg_rating); $i++) { 
									?>
									<i class="fa fa-star" aria-hidden="true"></i>
									<?php

								}
								if (floor($avg_rating)!=ceil($avg_rating)) {
									?>
									<i class="fa fa-star-half-o" aria-hidden="true"></i><br>
									<?php
								}
								
							}
						?>
						
					</div>
				
			</div>
		</section>
	<script>
		let star = document.querySelectorAll('.input');
		let showValue = document.querySelector('#rating-value');

		for (let i = 0; i < star.length; i++) {
			star[i].addEventListener('click', function() {
				i = this.value;
				showValue.innerHTML = i + " out of 5";
				document.getElementById("ratingId").value = i;
			});
		}
		
	</script>
	<?php
		include "footer.php";
	?>