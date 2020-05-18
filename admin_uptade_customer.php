<?php
    include('top_header.php');
    echo "<title>Customer Page</title>"; 
    include('header.php');
?>


<?php
    if(!isset($_GET['cid'])){
        echo "<script language='javascript'>
        document.location='user_details.php';
        </script>";
    }

    $uid=intval($_GET['cid']);
    $sql = "SELECT * FROM `user` WHERE `id`= $uid";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        die("error in User Details  ".mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($res);

?>
 
    <div class="container-fluid " >
        <div align="center"> 
        <div class="col-md-8" style="border:3px solid #007bff; margin:50px; border-radius:80px; padding:50px;">
                    <h1>Customer Update details</h1>

            <form action="admin_uptade_customer.php?cid=<?php echo $_GET['cid']; ?>" method="post">
                     
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
                              <textarea name="address" id="" cols="57" rows="3"><?php echo $row['address'];?></textarea>
                        </div> 

                        <div class="row" style="padding:0px; margin:20px;" >
                             <label class="col-5"   > <b>Role  </b></label> 
                             <input class="col-7  form-control" type="text"    value="<?php echo $row['role'];?>" name="role" required> 
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
                $uid =intval($_GET['cid']) ;
                $fname = $_POST['first_name'];
                $lname       = $_POST['last_name'];
                $email       = $_POST['email'];
                $contactno       = $_POST['contact_no'];
                $address       = $_POST['address'];
                date_default_timezone_set('Asia/Kolkata');
                $updatetime=date( 'Y-m-d h:i:s ', time() );
                $role = $_POST['role'];

                $sql = "UPDATE `user` SET `first_name`= '$fname',`last_name`= '$lname',`email`= '$email',`contact_no`='$contactno' ,`address`='$address',`role`='$role' ,`updated_date`= '$updatetime'  WHERE `id`=$uid ";
                $res = mysqli_query($conn,$sql);

                if(!$res){
                    die("Error in Update User Details".mysqli_error($conn));
                }
 
                echo "<script language='javascript'>
                document.location='admin_uptade_customer.php ';
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
