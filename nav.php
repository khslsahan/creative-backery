<?php include('connection.php') ?>

<div style="width:100% ; background-color:#222f3e ">
<div style="margin-left:10% ; margin-right: 10%;">

  <nav class="navbar navbar-expand-lg navbar navbar "  style="background-color:#222f3e">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          View
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="product.php">View Products</a>
          <a class="dropdown-item" href="outlets.php">View Outlets</a>
          <?php if(isset($_SESSION['login']) && ($_SESSION['role']=='admin')){  ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="user_details.php">View Users</a>
        </div>
      <?php } ?>
      </li>
      <?php if(isset($_SESSION['login']) && ($_SESSION['role']=='admin')){  ?>
      <li class="nav-item">
        <a class="nav-link" href="additem.php">Add Products</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="add_outlets.php" tabindex="-1" aria-disabled="true">Add Outlets</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_category.php" tabindex="-1" aria-disabled="true">Add Category</a>
      </li>
    <?php } ?>
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Logout</a>
      </li> -->

    </ul>
    <form class="form-inline my-2 my-lg-0">

      <!-- <a href="my-cart.php" style="margin-right:25px;"><i class="icon fa fa-shopping-cart" style="margin-right:10px;"></i>My Cart</a> -->

      <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon fa fa-shopping-cart" style="margin-right:10px;"></i>My Cart Rs
                                    <?php
                                    if(isset($_SESSION['cart'])){
                                      $total=0;
                                      foreach($_SESSION['cart'] as $key => $value)
                                      {
                                              $total+=$value['quantity']*$value['price'];
                                            }
                                            echo "".$total;

                                    }else {
                                      echo "00 ";
                                    }
                                            ?> .00/=
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                   <div class="card" style=" width:350px;">
                     <center>
                      <?php  if(isset($_SESSION['cart'])) {
                          foreach ($_SESSION['cart'] as $key => $value) {
                                $sql = "select * from products where id={$key}";
                                $res=mysqli_query($conn,$sql);
                                if(!$res){
                                  die("Error in the products".mysqli_error($conn));
                                }
                                $row = mysqli_fetch_assoc($res);

                        ?>

                      <div class="row">
                        <div class="col-6">

                            <img src="upload\<?php echo "".$row['product_image']; ?>"  style="width:130px; height:80px;" >
                        </div>
                        <div class="col-6">
                            <center>
                                  <h6><?php echo " ".$row['product_name']; ?></h6>
                                  <p>Rs<?php echo "".$value['price'] ?>*<?php echo "".$value['quantity'] ?></p>
                            </center>
                        </div>
                      </div>
                    <?php } ?>
                        <div class="row">

                          <div class="col-12">
                              <center>
                                  <h6>Total Price</h6>
                                  <h4>Rs.<?php
                                  if(isset($_SESSION['cart'])){
                                    $total=0;
                                    foreach($_SESSION['cart'] as $key => $value){
                                      $total+=$value['quantity']*$value['price'];
                                    }
                                      echo "".$total;
                                  }

                                   ?>/=</h4>
                              </center>
                          </div>
                        </div>
                        <a href="my-cart.php" class="lnk btn btn-primary" type="submit"><i class="icon fa fa-shopping-cart" style="margin-right:10px;"></i>Buy</a>
                    <?php }
                    else{ ?>
                      <h3>Your Cart is empty</h3>
                      <button type="button" class="btn btn-primary" name="button">More shopping</button>
                    <?php } ?>
                    </center>
                   </div>
                </div>
      </div>



      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>

</nav>
</div>
</div>
