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
                <button type="button" class="btn btn-primary" name="button">Buy products</button>
              <?php }
              else{ ?>
                <h3>Your Cart is empty</h3>
                <button type="button" class="btn btn-primary" name="button">More shopping</button>
              <?php } ?>
              </center>
             </div>
          </div>
</div>
