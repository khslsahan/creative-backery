<?php
    include('top_header.php');
    echo "<title>My Cart</title>";
    include('header.php');
    include('connection.php');


?>

<?php
      if(isset($_GET['action'])){
        $price = $_GET['price'];
          if(!isset($_SESSION['login'])){
            session_unset();
            echo "<script language='javascript'>
            document.location='Login.php';
            </script>";
          }else {


            $sql = "INSERT INTO `order_track_history` ( `user_id`,`price`, `status`) VALUES ( '{$_SESSION['uid']}',$price ,'on packing')";
            $res = mysqli_query($conn,$sql);
            if(!$res){
              die("Error in the order track histroy ".mysqli_error($conn));
            }
          }

          $sql = "select MAX(id) as id from order_track_history";
          $res = mysqli_query($conn,$sql);
          if(!$res){
            die("Error in the order track histroy  max".mysqli_error($conn));
          }

          $row = mysqli_fetch_assoc($res);
           $odid =$row['id'];

        foreach ($_SESSION['cart'] as $key => $value) {
            $sql = "INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `quantity`) VALUES ('{$odid}', '{$_SESSION['uid']}', '{$key}', {$value['quantity']}) ";
            $res = mysqli_query($conn,$sql);
            if(!$res){
            die("Error in the order   ".mysqli_error($conn));
            }

            echo "<script language='javascript'>
             alert('scccesfully Updated buying details');
            </script>";
            $_SESSION['cart']=NULL;
            echo "<script language='javascript'>
            document.location='product.php';
            </script>";
        }
        //  print_r($row);
      }


 ?>

<h1>My Cart </h1>
<center>
  <div class="col-sm-10">
    <table class="table table-dark">
<thead>
  <tr>

    <th scope="row">#</th>
    <th scope="col">Product Name</th>
    <th scope="col">Image</th>
    <th scope="col">price</th>
    <th scope="col">Quantity</th>
    <th scope="col">Sub Totla Price</th>
  </tr>
</thead>
<tbody>
  <?php
    if(isset($_SESSION['cart'])){
    $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
    $res = mysqli_query($conn,$sql);
    if(!$res){
      die("Error in connecting to product table".mysqli_error($conn));
    }
    $x=1;
    $subtot=0;
    $fulltot=0;
    while ($row=mysqli_fetch_assoc($res)) {
      $id=$row['id'];
          //  $id =$_SESSION['cart']['{$id}'];
   ?>
  <tr>
    <th scope="row"><?php echo "".$x; ?></th>
    <td><?php echo "".$row['product_name']; ?></td>
    <td><img src="upload\<?php echo "".$row['product_image']; ?>"  style="width:130px; height:80px;" ></div></td>
    <td><?php echo "".$prize=$row['product_price']; ?></td>
    <td><?php echo "".$qty=$_SESSION['cart'][$id]['quantity'] ;?></td>
    <td><?php echo "".$subtot=$qty*$prize; ?></td>
  </tr>
<?php $x++;
  $fulltot+=$subtot;
} }?>

    <th scope="row"></th>
    <th scope="col"></th>
    <th scope="col"> </th>
    <th scope="col"></th>
    <th scope="col">Total Payment</th>
    <th scope="col"><?php echo "".$fulltot; ?></th>
</tbody>
</table>
  <a href="my-cart.php?action=buy&price=<?php echo "".$fulltot; ?>" class="lnk btn btn-primary" type="submit"><i class="icon fa fa-shopping-cart" style="margin-right:10px;"></i>Buy The Products</a>

  </div>
</br>
</center>


<?php
 include('footer.php');

?>
