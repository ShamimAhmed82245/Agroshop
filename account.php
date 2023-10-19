
	<?php
		include "header.php";
	?>

	<div class="container">
		<div class="account">
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
			<div class="account-details">
				<h4>ব্যক্তিগত তথ্য </h4>
				<form method="post">
					<div class="input-group">
						<label>নাম  </label>
						<input type="text" name="username" value="<?php echo $_SESSION['username'];?>">
					</div>
					
					<div class="input-group">
						<label>ইমেল আইডি  </label>
						<input type="email" name="email" value="<?php echo $_SESSION['email'];?>">
					</div>
					
					<div class="input-group">
						<label>পাসওয়ার্ড  </label>
						<input type="text" name="password" value="<?php echo $_SESSION['password'];?>">
					</div>
					<div class="input-group">
						<label>ফোন নম্বর  </label>
						<input type="text"  name="number" value="<?php echo $_SESSION['number'];?>">
					</div>
					<div class="acc-button">
						<button type="submit" name="edit" class="submit-btn">submit</button>
					</div>
				</form>
				<?php
            if(isset($_POST['edit'])){
                $username  =$_POST['username'];
                $email     =$_POST['email'];
                $password  =$_POST['password'];
                $numbers   =$_POST['number'];
                $id 	   =$_SESSION['id'];
                if(empty($password)){
                    
                   // header('location: reg.php');
                    echo "password can't be empty.";
                   // header('location: reg.php');
                }

	            else{
		            	$update="
		            	UPDATE user 
		            	SET 
		            	username='$username',
		            	email= '$email',
		            	password='$password',
		            	number='$numbers'
		            	WHERE id = $id";
		            	$regresult=mysqli_query($db,$update);
		                if ($regresult) {
		                    header('location: fixedAccount.php');
		                }

		                $check_query="SELECT * FROM user WHERE email='$email' ";
                $result=mysqli_query($db,$check_query);
                while($rows=mysqli_fetch_assoc($result)){
                    $_SESSION['id']=$rows['id'];
                    $_SESSION['username']=$rows['username'];
                    $_SESSION['email']=$rows['email'];
                    $_SESSION['password']=$rows['password'];
                    $_SESSION['number']=$rows['number'];
                }
	            }

           }
        ?>
			</div>
		</div>
	</div>

	<?php
		include "footer.php";
	?>