<?php
  

    $nopp = intval($_GET['pid']);
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
  <div class="col-md-6 col-sm-12">
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
          text-primary
            text-decoration: none;">Customer ratings</span></label>
            <span class="badge badge-primary">
            
            <?php  
                $ppid =intval($row['id']) ;
                $dql = "SELECT AVG(`ratings`) AS rate FROM `product_review` WHERE `product_id` =$ppid ";
                $resrat = mysqli_query($conn,$dql);
                if(!$resrat){
                  die("rating wos not Found  ".mysqli_error($conn));
                }
                $rowres = mysqli_fetch_assoc($resrat);
               
                echo  number_format($rowres['rate'], 2, '.', ',');

            ?></span>
      </div>
      <div class="row">
          <label class="col-6" > <span class="
            color: #fff;
            text-decoration: none;">price</span></label>
          <label class="col-6">Rs  <?php echo "".$row['product_price']; ?> /=</label>
      </div>
      <div class="row">
        <a style="width:50%" href="product.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary" type="submit"><i class="icon fa fa-shopping-cart" style="margin-right:10px;"></i>Add to Cart</a>
       <a style="width:50%"  href="product.php?page=product&action=fav&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary" type="submit"><i class="icon fa fa-heart-o" style="margin-right:10px;"></i>Favorits</a>
      </div>

    </div>

  </div>
</div>

</div>


<?php 
  if(isset($_SESSION['uid'])){
?>

</br>
</br>

<div   id="comment " style=" border: 5px solid #007bff; padding:50px; border-radius:75px   " >
    <form action="product_details.php?pid=<?php echo $nopp; ?>" method="post"  name="comments_section">
      <div align="left" >
       <h4 class="text-center" ><b>Leave Your Comments</b> </h4> 
      </br>
      </br>
   <span class="text-primary">Rate </span> 
    <div class="form-check form-check-inline" style="padding-left:50px">
      <input class="form-check-input" type="radio" name="rate" id="inlineRadio1" value="1">
        <label class="form-check-label" for="inlineRadio1">1</label>
    </div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="rate" id="inlineRadio2" value="2">
  <label class="form-check-label" for="inlineRadio2">2</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="rate" id="inlineRadio3" value="3" >
  <label class="form-check-label" for="inlineRadio3">3 </label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="rate" id="inlineRadio3" value="4" >
  <label class="form-check-label" for="inlineRadio3">4 </label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="rate" id="inlineRadio3" value="5" >
  <label class="form-check-label" for="inlineRadio3">5 </label>
</div> 
      </br>
      </br> 
      <p class="text-primary">Comment </p>
        <textarea name="comment"  class="col-md-12"></textarea></br>
        <input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>" >
        <input class="btn btn-primary" type="submit" name="submitcomment" value="Put Review">
      </div>
    </form>
</div>
  <?php } ?>


<?php
  if(isset($_POST['submitcomment']))
  {
     
    $product_id=intval($_POST['pid']);
    $ratings= intval($_POST['rate']);
    $user_name=$_SESSION['user_name'];
    $summary=$_POST['comment'];
     
      $query="INSERT INTO `product_review`(  `product_id`, `ratings`, `user_name`, `summary`) VALUES ( $product_id,$ratings,'$user_name','$summary' )";
      $result=mysqli_query($conn,$query);

        if(!$result)
            die('data not inserted'.mysqli_error($conn));
        else {
          echo " <script>
          alert('Succes Fully Inserted');
        </script>
        ";
           
        }
    
 

  }
 ?>






   </br> 
   </br> 
   </br> 


<div>
    <div class="card ">
        <h4>All Coments Here</h4>
      <center>

      <?php
        
        $id = intval($_GET['pid']);
        $sqlc = "SELECT * FROM `product_review` WHERE `product_id`  ={$id}";
        $resc=mysqli_query($conn,$sqlc);
        if(!$resc){
      die("Error in Comment Section".mysqli_error($conn));
           }
    
        while($rowc = mysqli_fetch_assoc($resc)){
      ?>
      
      
      <div class="col-md-8 col-sm-12 " style="border: 2px solid #000000; padding:10px; border-radius:25px ; margin:5px; " >
            <p class="text-left"> <span> <b> <?php echo $rowc['user_name'];?>:</b> </span style="" ><?php echo $rowc['summary'];?> <span></span> </p>
       </div>
        <?php }?>
       
      </center>
      

    </div> 

      

</div>






</div>
</center>
</br>
<?php
 include('footer.php');
?>
