<?php
    include('top_header.php');
    echo "<title>My Buying History</title>";
    include('header.php');
    include('connection.php');


?>
  
  <center> 
   <a href="<?php
            if($_SESSION['role']=='admin'){
                echo "admin.php";
            }else if($_SESSION['role']){
                echo "customer.php";
            }
    ?>"> <button  style="width:400px;" class="btn btn-primary" type="button"><?php
    if($_SESSION['role']=='admin'){
        echo "Admin  Details";
    }else if($_SESSION['role']){
        echo "Customer Details ";
    }
    ?>
    </button >   </a>
    <a href="customer_buying_history.php"><button  style="width:400px;"class="btn btn-primary" type="button">Customer Buying History </button >   </a>
    <a href="customerfav.php"><button  style="width:400px;"class="btn btn-primary" type="button">Customer Favourits </button >   </a>

    </center>
    </br>
    </br>
    </br>





<h1>My Buying History </h1>
<center>
  <div class="col-sm-10">
    <table class="table table-dark">
<thead>
  <tr>

    <th scope="row">Od id</th>
    <th scope="col">Product Name</th>
    <th scope="col">Image</th>
    <th scope="col">price</th>
    <th scope="col">Quantity</th>
    <th scope="col">Sub Totla Price</th>
    <th scope="col">Status</th>

  </tr>
</thead>
<tbody>
  <?php
    $uid = intval($_SESSION['uid']);
    $sql = "SELECT * FROM `order_track_history` WHERE `user_id` =$uid";

    $res = mysqli_query($conn,$sql);
    if(!$res){
      die("Error in connecting to order Track Table".mysqli_error($conn));
    } 
    while ($row=mysqli_fetch_assoc($res)) {
      $order_reack_id=intval($row['id']);
      $fulloderprice = $row['price'];
      $status = $row['status'];
      $nextsqll = "SELECT * FROM `orders` WHERE `order_id` = $order_reack_id";
      $nextres = mysqli_query($conn,$nextsqll);
      if(!$nextres){
            die("Error in connecting to order  Table".mysqli_error($conn));
      }

        while ($nextrow=mysqli_fetch_assoc($nextres)) {
                $product_id = intval($nextrow['product_id']);
                $product_qty = $nextrow['quantity'];

                $xxsql = "SELECT * FROM `products` WHERE `id` = $product_id";
                $xxres =mysqli_query($conn,$xxsql);
                if(!$xxres){
                    die("error in The tables".mysqli_error($conn));
                            }
             while($xxrow=mysqli_fetch_assoc($xxres)){

            
        ?>
  <tr>
    <th scope="row"><?php echo "".$order_reack_id; ?></th>
    <td><?php echo "".$xxrow['product_name']; ?></td>
    <td><img src="upload\<?php echo "".$xxrow['product_image']; ?>"  style="width:130px; height:80px;" ></div></td>
    <td><?php echo "".$prize=$xxrow['product_price']; ?></td>
    <td><?php echo "".$qty=$product_qty;?></td>
    <td><?php echo "".$subtot=$qty*$prize; ?></td>
  </tr>
<?php 
}} ?>

    <th scope="row"></th>
    <th scope="col"></th>
    <th scope="col"> </th>
    <th scope="col"></th>
    <th scope="col">Total Payment</th>
    <th scope="col"><?php echo "Rs ".$fulloderprice."/="; ?></th>
    <th scope="col"><?php echo "".$status; ?></th>
</tbody>
<?php }?>
</table>
  

  </div>
</br>
</center>


<?php
 include('footer.php');

?>
