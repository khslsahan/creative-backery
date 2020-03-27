 <?php
     include("top_header.php");
     echo "<title>Login</title>";
      include("header.php");
 ?>

  <h1 style="text-align:center">Login</h1>
 <center>
 <div class="box-login col-md-4 col-md-3">
 <form action="Login.php" method="post">
 <div class="form-group">
  <label for="exampleInputEmail1">Email address</label>
  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
 </div>
 <div class="form-group">
  <label for="exampleInputPassword1">Password</label>
  <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
 </div>
 <p>Don't you have an account? Click here to <a href="signup.php">Create acconut.</a></p>
 <button type="submit" class="btn btn-primary" name="submit">Submit</button>
 </form>
 <?php
   include_once('connection.php');
   if(isset($_POST['submit']))
   {
     $email=$_POST['email'];
       $password=md5($_POST['password']);
     $que="SELECT * FROM user WHERE email='$email' AND password='$password'" or die ('failed to get result customer'.mysqli_error($conn));
     $result=mysqli_query($conn,$que);
     $row=mysqli_fetch_assoc($result);
     // print_r($row);
     if($row['email']==$email && $row['password']==$password && $row['role']=='customer'){

       $_SESSION['login']=$row['email'];
       $_SESSION['role']=$row['role'];
       $_SESSION['uid']=$row['id'];
       $_SESSION['user_name']=$row['first_name'];
       $uip=$_SERVER['REMOTE_ADDR'];
       $status=1;
       $que = "insert into `user_log`(user_email,user_ip,role,status) values('$email','$uip','".$row['role']."',$status)" ;
       $result=mysqli_query($conn,$que);
       if(!$result){
         die ('failed to get result userlog  '.mysqli_error($conn));
       }
        // header('location:customer.php');
       echo "<script language='javascript'>
       document.location='customer.php';
       </script>";


     }
     else if($row['email']==$email && $row['password']==$password && $row['role']=='admin'){
       $_SESSION['login']=$email;
       $_SESSION['role']='admin';
       $_SESSION['uid']=$row['id'];
       $_SESSION['user_name']=$row['first_name'];
       $uip=$_SERVER['REMOTE_ADDR'];
       $status=1;
       $que = "insert into `user_log`(user_email,user_ip,role,status) values('$email','$uip','".$row['role']."',$status)" ;
       $result=mysqli_query($conn,$que);
       if(!$result){
         die ('failed to get result'.mysqli_error($conn));
       }
       // header('location:admin.php');
       echo "<script language='javascript'>
       document.location='admin.php';
       </script>";
     }
       else {
         echo "Invalid username or Password ";
       }

   }
  ?>
 </div>
 </center>
 <br>


  <?php
   include("footer.php");
  ?>
