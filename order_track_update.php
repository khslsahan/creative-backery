<?php
    include('top_header.php');
    echo "<title>Customer Page</title>"; 
    include('header.php');
?>


<?php
    if(!isset($_GET['oid'])){
        echo "<script language='javascript'>
        document.location='admin_orders_panel.php';
        </script>";
    }
                         
    $oid=intval($_GET['oid']);
    $sql = "SELECT * FROM `order_track_history` WHERE `id`= $oid ";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        die("error in User Details  ".mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($res);

?>

 
 
    <div class="container-fluid " >
        <div align="center"> 
        <div class="col-md-8" style="border:3px solid #007bff; margin:50px; border-radius:80px; padding:50px;">
                    <h1>Order details  Update </h1>

            <form action="order_track_update.php?oid=<?php echo "".$oid;?>" method="post">
                     
                        <div class="row" style="padding:0px; margin:20px;" >
                             <label class="col-5"   > <b>Order Id  </b></label> 
                             <input class="col-7  form-control" type="text"    value="<?php echo $row['id'];?>" name="order_id" readonly> 
                        </div> 
                        <div class="row" style="padding:0px; margin:20px;" >
                             <label class="col-5"   > <b>User Name</b></label> 
                             <input class="col-7  form-control " type="text"    value="<?php  
        $uuid = intval($row['user_id']);
        $newsql = "SELECT * FROM `user` WHERE `id`= $uuid ";
        $newres = mysqli_query($conn,$newsql);
        if(!$newres){
            die("Error in the user Id");
        }
        $newrow = mysqli_fetch_assoc($newres);

        echo "".$newrow['first_name']." ".$newrow['last_name'];
    ?>" name="username" readonly> 
                        </div> 
                        <div class="row" style="padding:0px; margin:20px;" >
                             <label class="col-5"   > <b>Price</b></label> 
                             <input class="col-7  form-control" type="text"    value="<?php echo $row['price'];?>" name="price" readonly> 
                        </div> 
                        <div class="row" style="padding:0px; margin:20px;" >
                             <label class="col-5"   > <b>Order Status</b></label> 
                             <select id="inputState" class="form-control col-7"  name="status">
                                <option  <?php if($row['status']=="On packing"){ echo "selected"; }?> >On packing</option>
                                <option <?php if($row['status']=="On Delivery"){ echo "selected"; }?> >On Delivery</option>
                                <option <?php if($row['status']=="Delivered"){ echo "selected"; }?> >Delivered</option>
                                <option <?php if($row['status']=="Canceled"){ echo "selected"; }?> >Canceled</option>
                            </select>
                        </div>  
                        
                        <div class="row" style="padding:0px; margin:20px;" >
                             <label class="col-5"   > <b>Payment Method</b></label> 
                             <input class="col-7  form-control" type="text"    value="<?php echo $row['paymet_method'];?>" name="paymet_method'" readonly> 
                        </div>  
                        <div class="row" style="padding:0px; margin:20px;" >
                             <label class="col-5"   > <b>Ordered Date</b></label> 
                             <input class="col-7  form-control" type="text"    value="<?php echo $row['post_date'];?>" name="Ordered_Date" readonly> 
                        </div>  

                        <div class="row" style="padding:0px; margin:20px;" >
                             <label class="col-5"   > <b>Delivery time </b></label> 
                             <input class="col-7  form-control" type="text" placeholder="yyyy-mm-dd hh:mm:ss"   value="<?php echo $row['role'];?>" name="Delivery_time" > 
                        </div> 



                         <table>
                         <tr>
                        <th><button class="btn btn-primary col-6  " style="float:left;  ;  width:200px; "  type="submit"    name="update">Update</button> </th> 
                          <th><button class="btn btn-primary col-6"  style="  width:200px; " type="reset"    name="clear">Clear</button>     </th>                
                         </tr>
                         </table>
                                 
            </form>
             

        <?php 
            if(isset($_POST['update'])){  
                $oid =intval($_GET['oid']) ;
                $status = $_POST['status'];
                date_default_timezone_set('Asia/Kolkata');
                $updatetime =null;
                if($status=="Delivered")
                      $updatetime=date( 'Y-m-d h:i:s ', time() );
                 

                $sql = "UPDATE `order_track_history` SET  `status`= '$status',`delivery_time`='$updatetime' WHERE `id` =$oid ";
                $res = mysqli_query($conn,$sql);

                if(!$res){
                    die("Error in Update Order Details".mysqli_error($conn));
                }
 
                echo "<script language='javascript'>
                document.location='admin_orders_panel.php';
                </script>";

            }


        ?>  
        
       
      

     


        </div>
          
        </div>
    </div>
 
<?php
 include("footer.php");
?>
</body>
</html>
