<?php
    include('top_header.php');
    echo "<title>Outletdetails</title>";
    include('connection.php');
    include('header.php');
?>
<center>
    <div class="container-fluid " >
      <div class="col-md-9">
        <div class=" col-md-7   col-sm-12">
              <img src="images\outlets.png" alt="" width="100%" height="100%">
        </div>


    <div class="row" align="center">
      <?php
          $sql = "select * from outlets ";
          $res=mysqli_query($conn,$sql);
          if(!$res){
            die("Error in image".mysqli_error($conn));
          }

        while($row = mysqli_fetch_assoc($res)){  ?>
    <div class="col-md-4 sm-12">
      <div class="card btn " id="product" style="margin:20px; padding:5px;">
      <a href="product_details.php">  <img src="upload_outlet\<?php echo "".$row['image']; ?>" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h4><a  style="text-decoration:none" href="product_details.php"><?php echo "".$row['outlet_name']; ?></a></h4>
          <p class="card-text"><a style="text-decoration:none" href="product_details.php"><?php echo "".$row['outlet_description']; ?></a></p>
            <div class="row">
                <label class="col-6" ><a style="text-decoration:none" href="product_details.php?pid=1" ><span class="
                  color: #fff;
                  text-decoration: none;">Mored etails</span></a></label>
                <label class="col-6"><a style="text-decoration:none" href="product_details.php"><?php echo "".$row['outlet_province']; ?></a></label>
            </div>
            <div class="row">
              <button class=" btn-primary" type="submit" name="button"><i class="icon fa fa-shopping-cart" style="margin-right:10px;"></i>Details</button>
            </div>
        </div>
    </div>
    </div>
      <?php } ?>
</div>
</div>
</div>
</div>


</center>

<?php
    include("footer.php");
?>
