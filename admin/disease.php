<?php
require('top.php');

if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($db,$_GET['type']);
   
   if($type=='delete'){
      $id=get_safe_value($db,$_GET['id']);
      $delete_sql="delete from disease where p_id='$id'";
      mysqli_query($db,$delete_sql);
   }
}



?>

         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <!-- <h4 class="box-title"> রোগ এবং প্রতিকার </h4> -->
                           <h4 class="box-title"><a href="manage_disease.php" class="badge-add"> রোগ এবং প্রতিকার যোগ করুন</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">ইমেজ</th>
                                       <th>নেইম</th>
                                       <!-- <th>price</th> -->
<!--                                        <th>Product</th> -->
                                      <!--  <th>Quantity of seed</th> -->
                                       <!-- <th>Status</th> -->
                                       <th>ইডিট</th>
                                       <th>ডিলিট</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                       $sql="SELECT * FROM disease order by p_id desc LIMIT 7";
                                       $result=mysqli_query($db,$sql);
                                       while($rows=mysqli_fetch_assoc($result)){
                                          ?>
                                             <tr class=" pb-0">
                                                <td class="serial"><?php echo $rows['p_id'] ?></td>
                                                <td class="avatar pb-0">
                                                   <div class="round-img">
                                                      <a href="#"><img class="rounded-circle" src="../img/disease/<?php echo $rows['p_image'] ?>"></a>
                                                   </div>
                                                </td>
                                                <td> <span class="name"><?php echo $rows['desone'] ?></span> </td>
                                                <!-- <td>  </td> -->
                                                
                                                <!-- <td> <span class="product">Monitor</span> </td> -->
                                                <!-- <td><span class="count"></span></td> -->
                                                <!-- <td>
                                                   <span class="badge badge-complete">available</span>
                                                </td> -->
                                                <td>
                                                   <span class="badge badge-edit"><a href="manage_disease.php?id=<?php echo $rows['p_id'];?>">Edit</a></span>
                                                </td>
                                                <td>
                                                   <span class="badge badge-delete"><a href="?type=delete&id=<?php echo $rows['p_id'];?>">Delete</a></span>
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