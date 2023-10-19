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
                                       <th class="avatar">Avatar</th>
                                       <th>Poduct Name</th>
                                       <th>Email</th>
                                       <th>Phone</th>
                                       <th>Price</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $sql="SELECT * FROM orders ORDER BY cusemail";
                                       $result=mysqli_query($db,$sql);
                                       $cnt=0;
                                       while($row=mysqli_fetch_assoc($result)){
                                          $cnt++;
                                          $cusname=$row['cusname'];
                                          $cusemail=$row['cusemail'];
                                          $cusphn=$row['cusphn'];
                                          $cusadd=$row['cusadd'];
                                          $product=$row['product'];
                                          $category_name=$row['category_name'];
                                          $status=$row['status'];
                                          $total_price=$row['total_price'];
                                          $paymode=$row['paymode'];
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
                                          <td>
                                             <?php
                                                if($status==0){
                                                   ?>
                                                      <span class="badge badge-pending">pending</span>
                                                   <?php
                                                }
                                                else{
                                                   ?>
                                                      <span class="badge badge-complete">Complete</span>
                                                   <?php
                                                }
                                             ?>
                                          </td>
                                       </tr>
                                       <?php 
                                       }
                                    ?>
                                    
                                 </tbody>
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