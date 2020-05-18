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
    $uid=intval($_SESSION['uid']);
    $sql = "SELECT * FROM `user` WHERE `id`= $uid";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        die("error in User Details  ".mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($res);

?>
 <center>
  <div class="col-sm-10">
        <div class="col-md-8" style="border:3px solid #007bff;  border-radius:80px; padding:50px;">
                    <h1>Customer details</h1>

            <form action="customer.php" method="post">
                     
                        <div class="row" style="padding:0px; margin:20px;" >
                             <label class="col-5"   > <b>User First Name  </b></label> 
                             <input class="col-7  form-control" type="text"    value="<?php echo $row['first_name'];?>" name="first_name" required> 
                        </div> 
                        <div class="row" style="padding:0px; margin:20px;" >
                             <label class="col-5"   > <b>User Last Name</b></label> 
                             <input class="col-7  form-control" type="text"    value="<?php echo $row['last_name'];?>" name="last_name" required> 
                        </div> 
                        <div class="row" style="padding:0px; margin:20px;" >
                             <label class="col-5"   > <b>Email</b></label> 
                             <input class="col-7  form-control" type="text"    value="<?php echo $row['email'];?>" name="email" required> 
                        </div> 
                        <div class="row" style="padding:0px; margin:20px;" >
                             <label class="col-5"   > <b>Contact No</b></label> 
                             <input class="col-7  form-control" type="text"    value="<?php echo $row['contact_no'];?>" name="contact_no" required> 
                        </div> 
                        <div class="row" style="padding:0px; margin:20px;" >
                             <label class="col-5"   > <b>Address</b></label> 
                              <textarea name="address" id="" cols="46" rows="3"><?php echo $row['address'];?></textarea>
                        </div>  
                         <table>
                         <tr>
                        <th><button class="btn btn-primary col-6  " style="float:left;  ;  width:200px; "  type="submit"    name="update">Update</button> </th> 
                          <th><button class="btn btn-primary col-6"  style="  width:200px; " type="reset"    name="clear">Clear</button>     </th>                
                         </tr>
                         </table>
                                 
            </form>
             
        </br>
        <?php 
            if(isset($_POST['update'])){  
                $uid =intval($_SESSION['uid']) ;
                $fname = $_POST['first_name'];
                $lname       = $_POST['last_name'];
                $email       = $_POST['email'];
                $contactno       = $_POST['contact_no'];
                $address       = $_POST['address'];
                date_default_timezone_set('Asia/Kolkata');
                $updatetime=date( 'Y-m-d h:i:s ', time() );

                $sql = "UPDATE `user` SET `first_name`= '$fname',`last_name`= '$lname',`email`= '$email',`contact_no`='$contactno' ,`address`='$address' ,`updated_date`= '$updatetime'  WHERE `id`=$uid ";
                $res = mysqli_query($conn,$sql);

                if(!$res){
                    die("Error in Update User Details".mysqli_error($conn));
                }
 
                echo "<script language='javascript'>
                document.location='customer.php';
                </script>";

            }


        ?>  
        
       
      

     


        </div>
          
        </div>
    </center>
    </br>
    </br>
    </br>
 
<?php
 include("footer.php");
?>
</body>
</html>
