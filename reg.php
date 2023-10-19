
    <?php
        include "header.php";
    ?>
        <!-- header section end-->
    
<div class="container1">

<div class="card">
<div class="inner-box" id="card">


    <div class="card-front"> 
        <h2>রেজিস্ট্রেশন করুন</h2>
        <form method="post">
            <input type="TEXT" name="username" class="input-box" placeholder="নাম" required>
        <input type="email" name="email" class="input-box" placeholder="ইমেল আইডি" required>
        <input type="password" name ="password"class="input-box" placeholder="পাসওয়ার্ড" required>
        <input type="password" name ="cpassword" class="input-box" placeholder="কনফার্ম  পাসওয়ার্ড" required>
        <button type="submit" name="reg_user" class="submit-btn">সাবমিট করুন</button>
        </form> 
        <!-- user rgistration code -->
        <?php
            if(isset($_POST['reg_user'])){
                $username  =$_POST['username'];
                $email     =$_POST['email'];
                $password  =$_POST['password'];
                $cpassword =$_POST['cpassword'];
                if($password!=$cpassword){
                    
                   echo "<script>alert('পাসওয়ার্ড কনফার্ম করুন..!')</script>";
                   echo "<script>window.location.href='#';</script>";
                }
                else{
                 $check_query="SELECT * FROM user WHERE username='$username'or email='$email' ";
            $result=mysqli_query($db,$check_query);
            $rows=mysqli_fetch_assoc($result);
            if($rows){
                if($rows['username']==$username){
                    echo "<script>alert('ব্যবহারকারীর নাম আগে থেকেই বিদ্যমান..!')</script>";
                    echo "<script>window.location.href='#';</script>";
                }
                else if ($rows['email']==$email) {
                    echo "<script>alert('ইমেল আগে থেকেই বিদ্যমান..!')</script>";
                    echo "<script>window.location.href='#';</script>";
                }
            }else{
                // $hasspass=sha1($password);
                $insert_query="INSERT INTO user(username,email,password) VALUES('$username','$email','$password')";
                $regresult=mysqli_query($db,$insert_query);
                if ($regresult) {
                    echo "<script>alert('রেজিস্ট্রেশন সফল..!')</script>";
                    echo "<script>window.location.href='login.php';</script>";
                    //header('location: login.php');
                }
            }
            }
            }
           
        ?>
        <a href="login.php">
            <button type="button" class="btn">লগ ইন করুন</button>
        </a>
     
    </div>

</div>

</div>

</div>


    <?php
        include "footer.php";
    ?>