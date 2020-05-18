<?php
    include('top_header.php');
    echo "<title>My Buying History</title>";
    include('header.php');
    include('connection.php');


?>
   





<h1>My Customer Order Track DashBoard </h1>
<center>
  <div class="col-sm-10">
    <table class="table table-dark">
<thead>
  <tr>

    <th scope="row">Order id</th>
    <th scope="col">User Name</th>
    <th scope="col">price</th>
    <th scope="col">status</th>
    <th scope="col">Payment Method</th>
    <th scope="col">Ordered Date</th>
    <th scope="col">Deliverd Date</th>
    <th scope="col">Update</th>


  </tr>
</thead>
<tbody>
  <?php
    $sql = "SELECT * FROM `order_track_history` ORDER BY user_id";

    $res = mysqli_query($conn,$sql);
    if(!$res){
      die("Error in connecting to order Track Table".mysqli_error($conn));
    } 
    while ($row=mysqli_fetch_assoc($res)) {
             
        ?> 
  <tr>
    <th scope="row"><?php echo "".$row['id'] ; ?></th>
    <td><?php  
        $uuid = intval($row['user_id']);
        $newsql = "SELECT * FROM `user` WHERE `id`= $uuid ";
        $newres = mysqli_query($conn,$newsql);
        if(!$newres){
            die("Error in the user Id");
        }
        $newrow = mysqli_fetch_assoc($newres);

        echo "".$newrow['first_name'];
    ?></td>
    <td><?php echo "".$row['price'] ; ?></td>
    <td><?php echo "".$row['status'] ; ?></td>
    <td><?php echo "".$row['paymet_method']  ;?></td>
    <td><?php echo "".$row['post_date'] ; ?></td>
    <td><?php echo "".$row['delivery_time'] ; ?></td>
    <td><a href="order_track_update.php?oid=<?php echo "".$row['id'];  ?>" class="btn btn-primary" type="submit" >Update</a> </td>


  </tr>
<?php 
}?>
 
</tbody>
 
</table>
  

  </div>
</br>
</center>


<?php
 include('footer.php');

?>
