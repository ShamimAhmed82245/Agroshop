<?php
include('smtp/PHPMailerAutoload.php');
require ('../connection.inc.php');
require('../functions.inc.php');
$get_email=$_GET['email'];
$sql="SELECT * FROM orders WHERE cusemail='$get_email'";
$result=mysqli_query($db,$sql);
$cnt=0;
$tt=0;
while($row=mysqli_fetch_assoc($result)){
  $cnt++;
  $id=$row['order_id'];
  $cusname=$row['cusname'];
  $cusemail=$row['cusemail'];
  $cusphn=$row['cusphn'];
  $cusadd=$row['cusadd'];
  $product=$row['product'];
  $category_name=$row['category_name'];
  $status=$row['status'];
  $total_price=$row['total_price'];
  $paymode=$row['paymode'];
  $send=$row['send'];
  $img=$row['img'];
  $tt+=$row['total_price'];
 }             
$charg=50;
$Date = "2023-08-10";
 
// Add days to date and display it
$dt = date('Y-m-d', strtotime($Date. ' + 3 days'));
$html='<div class="cart-bill">
		<p>Delivery Date :'.$dt.'</p>
		<p>Contact Number: 01728272824</p>
		<p>Delivery Boy: MD. Rana </p>
		<p>Price Details</p>
		<hr>
		<div class="price-des">
			 
			<p>Total item : '.$cnt.'</p>
			<p>Total Price : '.$tt.'</p>
			<p>Delivery charge : 50</p>
			<hr>
			<p>Amount Payable : '.$tt+$charg.'</p>
		</div>
	 </div>';

echo smtp_mailer('abulbashershuvo@gmail.com ','Subject',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "shamimahmed82245@gmail.com";
	$mail->Password = "xkfsbwvbacupysyt";
	$mail->SetFrom("shamimahmed82245@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		header('location: ../order.php');
		return 'Sent';

	}
}
?>