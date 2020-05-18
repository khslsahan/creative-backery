<?php
    include('top_header.php');
    echo "<title>Customer Page</title>"; 
    include('header.php');
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




    <?php


  if(isset($_GET['action'])&& $_GET['action'] ="add" ){
     $id = intval($_GET['id']);
     if(isset($_SESSION['cart'][$id])){
       $_SESSION['cart'][$id]['quantity']++;
       echo "<script language='javascript'>
       document.location='product.php';
       </script>";
     }else {
       $sql = "select * from products where id=3 ";
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
<center>
     
    <div class="container-fluid " >
      <div class="col-md-9">

               <div class="alert alert-primary" role="alert" style="height:40px">
               <h5> Customer Favoutits List <h5>
</div>  

             


    <div class="row" align="center">
      <?php
        $uid = intval($_SESSION['uid']);
        $presql = "SELECT * FROM `wishlist` WHERE `user_id` = $uid ";
        $preres= mysqli_query($conn,$presql);
        if(!$preres){
            die("Error in WishList".mysqli_error($conn));
          }
        while($prerow=mysqli_fetch_assoc($preres)){
            $ppid = $prerow['product_id'];
        

          $sql = "SELECT * FROM `products` WHERE `id` =$ppid";
          $res=mysqli_query($conn,$sql);
          if(!$res){
            die("Error in product".mysqli_error($conn));
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
              <!-- <a style="width:50%" href="#" class="lnk btn btn-primary" type="submit"><i class="icon fa fa-heart-o" style="margin-right:10px;"></i>Favorits</a> -->
            </div>
           </div>
      </div>
     
       
</div>


    <?php } }?>


</div>
</div>
</div>


</center>

<?php
    include("footer.php");
?>
