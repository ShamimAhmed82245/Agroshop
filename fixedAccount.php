
	<?php
		include "header.php";
	?>

	<div class="container">
		<div class="fixed-account">
			<div class="fixed-account-sidebar">
				<div class="profil-pic">
					<i class="fa fa-user-circle" aria-hidden="true"></i>
					<?php echo $_SESSION['username'];?>
				</div>
				<div class="fixed-sub-menu1">
					<ul>
						<li><a href="FixedAccount.php">অ্যাকাউন্ট</a></li>	
						<li><a href="order.php">অর্ডার সমূহ</a></li>
						<li><a href="account.php">ইডিট অ্যাকাউন্ট</a></li>
						<li><a href="logout.php">লগ আউট</a></li>
					</ul>
				</div>
			</div>
			<div class="fixed-account-details">
				<h4>ব্যক্তিগত তথ্য </h4>
				<form method="post">
					<div class="fixed-input-group">
						<p>নাম  </p>
						<div class="fixed-des"><p><?php echo $_SESSION['username'];?></p></div>
					</div>
					
					<div class="fixed-input-group">
						<p>ইমেল আইডি  </p>
						<div class="fixed-des"><p><?php echo $_SESSION['email'];?></p></div>
					</div>
					
					<div class="fixed-input-group">
						<p>পাসওয়ার্ড  </p>
						<div class="fixed-des"><p><?php echo $_SESSION['password'];?></p></div>
					</div>
					<div class="fixed-input-group">
						<p>ফোন নম্বর  </p>
						<div class="fixed-des"><p><?php echo $_SESSION['number'];?></p></div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php
		include "footer.php";
	?>