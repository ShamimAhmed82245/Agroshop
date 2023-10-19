<?php
require('top.php');
?>

         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Orders </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">ইমেজ</th>
                                       <th>প্রোডাকট নেইম</th>
                                       <th>ইমেল </th>
                                       <th>ফোন</th>
                                       <th>প্রাইস</th>
                                       <th>লেনদেন নাম্বার</th>
                                       <th>স্ট্যাটাস</th>
                                       <th>বার্তা</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $sql="SELECT * FROM orders ORDER BY cusemail";
                                       $result=mysqli_query($db,$sql);
                                       $cnt=0;
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
                                          $img=$row['img']
                                          ?>

                                          <tr class=" pb-0">
                                          <td class="serial"><?php echo $cnt ?></td>
                                          <td class="avatar pb-0">
                                             <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="../img/<?php echo $category_name ?>/<?php echo $img ?>" alt=""></a>
                                             </div>
                                          </td>
                                          <td><?php echo $product ?> </td>
                                          <td> <span class="name"><?php echo $cusemail ?></span> </td>
                                          <td> <span class="product"><?php echo $cusphn ?></span> </td>
                                          <td><span class="count"><?php echo $total_price ?></span></td>
                                          <td><span class="name"><?php echo $paymode ?></span></td>
                                          <td>
                                             
                                             <form method="post">
                                                <select name="status" onchange="form.submit()">
                                                   <option selected value=""><?php echo $status ?> </option>
                                                   <option  value="pending"> pending</option>
                                                   <option value="approved"> approved</option>
                                                   <option value="transporting"> transporting</option>
                                                   <option value="complete"> complete</option>
                                                   <input type="hidden" name="id" value=<?php echo $id ?>>
                                                </select>
                                             </form>
                                          </td>
                                          <td><span class="name badge badge-delete"><?php  
                                          if($send==0){
                                             ?>
                                             <a href="phpmailer_smtp/test.php?email=<?php echo $row['cusemail'];?>">পাঠান</a>
                                             <?php
                                          }

                                          ?></span></td>
                                       </tr>
                                       <?php 
                                       }
                                    ?>
                                    
                                 </tbody>
                                 <?php
                                    if (isset($_POST['status'])) {
                                       $status=htmlspecialchars($_POST['status']);
                                       $id=htmlspecialchars($_POST['id']);
                                       $sql="UPDATE orders SET status='$status' WHERE order_id='$id'";
                                       $res=mysqli_query($db,$sql);
                                       if($res){
                                          //echo $id;
                                          //echo "successfull";
                                          //header('location: index.php');
                                       }
                                       else{
                                           //echo "unsuccessfull";
                                       }
                                    }
                                 ?>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
   <?php 
      require('footer.php');
    ?>