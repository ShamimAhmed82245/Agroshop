<?php
require('top.php');
$categories_id='';
$p_image='';
$p_name='';
$p_weight='';
$p_price='';
$titleone='';
$desone='';
$titletwo='';
$destwo='';
$titlethree	='';
$desthree='';
$p_cat='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($db,$_GET['id']);
	$res=mysqli_query($db,"select * from disease where p_id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$p_id=$row['p_id'];
		$categories_id=$row['p_cat'];
		$p_image=$row['p_image'];
		$titleone=$row['titleone'];
		$desone=$row['desone'];
		$titletwo=$row['titletwo'];
		$destwo=$row['destwo'];
		$titlethree=$row['titlethree'];
		$desthree=$row['desthree'];
	}else{
		header('location:disease.php');
		die();
	}
}

if(isset($_POST['submit'])){
	//$categories_id=get_safe_value($db,$_POST['p_cat']);
	// $p_image=get_safe_value($db,$_POST['p_image']);
	$titleone=get_safe_value($db,$_POST['titleone']);
	$desone=get_safe_value($db,$_POST['desone']);
	$titletwo=get_safe_value($db,$_POST['titletwo']);
	$destwo=get_safe_value($db,$_POST['destwo']);
	$titlethree=get_safe_value($db,$_POST['titlethree']);
	$desthree=get_safe_value($db,$_POST['desthree']);
	$res=mysqli_query($db,"select * from disease where p_image='$p_image'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['p_id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	
	// if($_GET['id']==0){
	// 	if($_FILES['p_image']['type']!='p_image/png' && $_FILES['p_image']['type']!='p_image/jpg' && $_FILES['p_image']['type']!='p_image/jpeg'){
	// 		$msg="Please select only png,jpg and jpeg image formate";
	// 	}
	// }else{
	// 	if($_FILES['p_image']['type']!=''){
	// 			if($_FILES['p_image']['type']!='p_image/png' && $_FILES['p_image']['type']!='p_image/jpg' && $_FILES['p_image']['type']!='p_image/jpeg'){
	// 			$msg="Please select only png,jpg and jpeg image formate";
	// 		}
	// 	}
	// }
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['p_image']['name']!=''){
				$p_image=rand(111111111,999999999).'_'.$_FILES['p_image']['name'];
				move_uploaded_file($_FILES['p_image']['tmp_name'],DISEASE_IMAGE_SERVER_PATH.$p_image);
				$update_sql="update disease set p_image='$p_image',titleone='$titleone',desone='$desone',titletwo='$titletwo',destwo='$destwo',titlethree='$titlethree',desthree='$desthree' where p_id='$p_id'";
			}else{
				$update_sql="update disease set p_image='$p_image',titleone='$titleone',desone='$desone',titletwo='$titletwo',destwo='$destwo',titlethree='$titlethree',desthree='$desthree' where p_id='$p_id'";
			}
			mysqli_query($db,$update_sql);
		}else{
			$p_image=rand(111111111,999999999).'_'.$_FILES['p_image']['name'];
			move_uploaded_file($_FILES['p_image']['tmp_name'],DISEASE_IMAGE_SERVER_PATH.$p_image);
			mysqli_query($db,"insert into disease(p_image,titleone,desone,titletwo,destwo,titlethree,desthree,	p_cat) values('$p_image','$titleone','$desone','$titletwo','$destwo','$titlethree','$desthree',5)");
		}
		header('location:disease.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									
								</div>
								
								
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<input type="file" name="p_image" class="form-control" <?php echo  $image_required?> value="<?php echo $p_image?>">
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">titleone</label>
									<input type="text" name="titleone" placeholder="Enter qty" class="form-control" required value="<?php echo $titleone?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">desone</label>
									<textarea name="desone" placeholder="Enter product short description" class="form-control" required><?php echo $desone?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">titletwo</label>
									<textarea name="titletwo" placeholder="Enter product description" class="form-control" required><?php echo $titletwo?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">destwo</label>
									<textarea name="destwo" placeholder="Enter product meta title" class="form-control"><?php echo $destwo?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">titlethree</label>
									<textarea name="titlethree" placeholder="Enter product meta description" class="form-control"><?php echo $titlethree?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">desthree</label>
									<textarea name="desthree" placeholder="Enter product meta keyword" class="form-control"><?php echo $desthree?></textarea>
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.php');
?>