<?php
    if(!$_GET['pid']){
      header('location:main.php');
    }
    include('top_header.php');
    echo "<title>Product details</title>";
    include('header.php');
    $id = intval($_GET['pid']);
    $sql = "select * from products where id ='{$id}'";
    $res=mysqli_query($conn,$sql);
    if(!$res){
      die("Error in image".mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($res);
    //print_r($ans);
?>

<h1><?php echo "".$row['product_name']; ?></h1>
<center>
  <div class="col-6">
<div class="card  " >
<div class="row no-gutters">
  <div class="col-md-6 sm-12">
    <img src="upload \<?php echo "".$row['product_image']; ?>" class="card-img-top" alt="...">
  </div>
  <div class="col-md-6 col-sm-12">
    <div class="card-body">
      <h5 class="card-title"><?php echo "".$row['product_name']; ?></h5>
      <p class="card-text"><?php echo "".$row['product_description']; ?></p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      <div class="row">
          <label class="col-6" > <span class="
            color: #fff;
            text-decoration: none;">price</span></label>
          <label class="col-6"> <?php echo "".$row['product_price']; ?></label>
      </div>
      <div class="row">
        <a style="width:50%" href="product.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary" type="submit"><i class="icon fa fa-shopping-cart" style="margin-right:10px;"></i>Add to Cart</a>
       <a style="width:50%" href="#" class="lnk btn btn-primary" type="submit"><i class="icon fa fa-heart-o" style="margin-right:10px;"></i>Favorits</a>
      </div>

    </div>

  </div>
</div>

</div>
</div>
</center>
</br>
<?php
 include('footer.php');
?>
