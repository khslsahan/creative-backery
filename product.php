<?php
    include('top_header.php');
    echo "<title>products</title>";
    include('connection.php');
    include('header.php');
?>

<?php
  if(isset($_GET['action'])&& $_GET['action'] =="add" ){
     $id = intval($_GET['id']);
     if(isset($_SESSION['cart'][$id])){
       $_SESSION['cart'][$id]['quantity']++;
       echo "<script language='javascript'>
       document.location='product.php';
       </script>";
     }else {
       $sql = "select * from products where id={$id} ";
       $res = mysqli_query($conn,$sql);
       if(!$res){
         die("Error in conection to products".mysqli_error($conn));
       }
       if(mysqli_num_rows($res)){
         $row = mysqli_fetch_assoc($res);
         $_SESSION['cart'][$row['id']]=array("quantity" => 1, "price" => $row['product_price']);
         echo "<script language='javascript'>
         document.location='product.php';
         </script>";
       }else {
          echo "Invalidate product Id";
       }
     }
  }
 ?>

 
<?php
  if(isset($_GET['action'])&& $_GET['action'] =="fav" ){
     $id = intval($_GET['id']);
     
     if(isset($_SESSION['uid'])){
      $uidd = intval($_SESSION['uid']);
      $presql = "SELECT * FROM `wishlist` WHERE `user_id` = $uidd AND `product_id` = $id";
      $preres = mysqli_query($conn,$presql);
      if(!mysqli_num_rows($preres)){
        $sql = "INSERT INTO `wishlist`( `user_id`, `product_id`) VALUES ($uidd ,$id)";
        $res = mysqli_query($conn,$sql);
        if(!$res){
          die("Error in conection to products".mysqli_error($conn));
        }
        
      } 
     }else {
      echo "<script language='javascript'>
      document.location='Login.php';
      </script>"; 
     }
  }
 ?>
 
  

<center>
    <div class="container-fluid " >
      <div class="col-md-9">
        <div class=" col-md-7   col-sm-12">
              <img src="images\our-products.jpg" alt="" width="100%" height="100%">
        </div>

        <?php
        $productid =0;
          $sqlp = "SELECT * FROM `category` ";
          $resp=mysqli_query($conn,$sqlp);
          if(!$resp){
            die("Error in category".mysqli_error($conn));
          }
          while($rowp = mysqli_fetch_assoc($resp)){ 
              $productid = intval($rowp['id']);
               ?>
              <a style="text-decoration:none" href="product_category.php?cid=<?php echo $productid ;?>"> <div class="alert alert-primary" role="alert" style="height:40px">
               <h5 class=""><?php echo $rowp['category_name'];?><h5>
            </div>  
            </a>

             


    <div class="row" align="center">
      <?php
          $sql = "SELECT   * FROM `products` WHERE `category_id` = $productid  LIMIT 3 ";
          $res=mysqli_query($conn,$sql);
          if(!$res){
            die("Error in image".mysqli_error($conn));
          }

        while($row = mysqli_fetch_assoc($res)){  ?>
    <div class="col-md-4 sm-12">
      <div class="card btn " id="product" style="margin:20px; padding:5px;">
      <a href="product_details.php?pid=<?php echo "".$row['id']; ?>" >  <img src="upload \<?php echo "".$row['product_image']; ?>" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h4><a  style="text-decoration:none" href="product_details.php?pid=<?php echo "".$row['id']; ?>" ><?php echo "".$row['product_name']; ?></a></h4>
          <!-- <p class="card-text"><a  style="text-decoration:none" href="product_details.php?pid=<?php echo "".$row['id']; ?>" ><?php echo "".$row['product_description']; ?></a></p> -->
            <div class="row">
                <label class="col-6" ><a  style="text-decoration:none" href="product_details.php?pid=<?php echo "".$row['id']; ?>" ><span class="
                  color: #fff;
                  text-decoration: none;">price</span></a></label>
                <label class="col-6"><a style="text-decoration:none" href="product_details.php"><?php echo "".$row['product_price']; ?></a></label>
            </div>
            <div class="row">
               <a style="width:50%" href="product.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary" type="submit"><i class="icon fa fa-shopping-cart" style="margin-right:10px;"></i>Add to Cart</a>
              <a style="width:50%" href="product.php?page=product&action=fav&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary" type="submit"><i class="icon fa fa-heart-o" style="margin-right:10px;"></i>Favorits</a>
            </div>
           </div>
      </div>
    </div>
      <?php } ?>
</div>


    <?php } ?>


</div>
</div>
</div>


</center>

<?php
    include("footer.php");
?>
