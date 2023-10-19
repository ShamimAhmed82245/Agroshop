<?php
 include "header.php";
$paymode="";
$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("ecomm649a772ea89ce");
$store_passwd=urlencode("ecomm649a772ea89ce@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;

	$paymode=$tran_id;
  			echo  $_SESSION['cusname'];
			$cusname  = $_SESSION['cusname'];
			$cusemail = $_SESSION['cusemail'];
			$cusphn   = $_SESSION['cusphn'];
			$cusadd   = $_SESSION['cusadd'];
			$status   = $_SESSION['status'];
			for ($i=0; $i < 10; $i++) {
				if(isset($_SESSION['cart'][$i])) {
					//print_r($_SESSION['cart'][$i]);
					$product=$_SESSION['cart'][$i]['product_name'];
					$img=$_SESSION['cart'][$i]['product_image'];
					$category_id=$_SESSION['cart'][$i]['category_id'];
					$total_price=$_SESSION['cart'][$i]['product_price'];
					$cat_sql="SELECT * FROM category WHERE cat_id=$category_id";
					$cat_res=mysqli_query($db,$cat_sql);
					while($row=mysqli_fetch_assoc($cat_res)){
						$cat_name=$row['cat_name'];
					}
					//echo $cat_name;
					$insert_sql="INSERT INTO orders(cusname,cusemail,cusphn,cusadd,	product,category_name,	status,total_price,paymode,	img, order_time) VALUES('$cusname','$cusemail','$cusphn','$cusadd',	'$product','$cat_name',	'$status','$total_price','$paymode','$img', 'now()')";
					$result=mysqli_query($db,$insert_sql);
				}

			}
		if ($result) {
			echo "<script>alert('অর্ডার সফল..!')</script>";
			echo "<script>window.location.href='index.php';</script>";
			unset($_SESSION['cart']);
		}
					
} else {

	echo "Failed to connect with SSLCOMMERZ";
}
						//echo  $paymode;
	
 include "footer.php";
?>