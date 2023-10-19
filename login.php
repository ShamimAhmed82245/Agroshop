
    <?php
        include "header.php";
        //session_start();
    ?>
        <!-- header section end-->
    
<div class="container1">

<div class="card">
<div class="inner-box" id="card">

<div class="card-front">   

    <h2>লগ ইন করুন</h2>
    <form method="post">
        <input type="email" name="email" class="input-box" placeholder="ইমেল আইডি" required>
        <input type="password" name="password" class="input-box" placeholder="পাসওয়ার্ড" required>
        <button type="submit" name="login" class="submit-btn">সাবমিট করুন</button>
        <!-- <input type="checkbox"><span>Remember Me</span> -->
    
    </form>

    <?php 
        if (isset($_POST['login'])) {
            $email=$_POST['email'];
            $password=$_POST['password'];
            if (empty($email)) {
                echo "Email can't be empty";
            }
            if (empty($password)) {
                echo "Password can't be empty";
            }
            if(!empty($email)&&!empty($password)){
                $check_query="SELECT * FROM user WHERE email='$email' ";
                $result=mysqli_query($db,$check_query);
                while($rows=mysqli_fetch_assoc($result)){
                    $_SESSION['id']=$rows['id'];
                    $_SESSION['username']=$rows['username'];
                    $_SESSION['email']=$rows['email'];
                    $_SESSION['password']=$rows['password'];
                    $_SESSION['number']=$rows['number'];
                }
                if ($email==$_SESSION['email']&&$_SESSION['password']==$password){
                    header('location: index.php');
                }
                else{
                    //echo "NO";
                    ob_start();
                    session_start();
                    session_unset();
                    session_destroy();
                    header('location: login.php');
                    ob_end_flush();
                }
            }
            //echo "YES";
        }
        else{
            //echo "YESNO";
            //header('location: login.php');
        }
    ?>

   <a href="reg.php">
        <button type="button" class="btn">রেজিস্ট্রেশন</button>
   </a>
    
    <a href="enter_email.php">পাসওয়ার্ড ভুলে গেছেন</a>
    
</div>


</div>

</div>

</div>



    <?php
        include "footer.php";
    ?>