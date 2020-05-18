

<?php
    include('top_header.php');
    echo "<title>User Dercrory</title>";
    include('header.php');
    include('connection.php');
?>
<h1>User Derectry</h1>
  <center>
    <div class="col-sm-10">
      <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Cantact No.</th>
      <th scope="col">Address</th>
      <th scope="col">Role</th>
      <th scope="col">status</th>
      <th scope="col">update</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql = "select * from user";
      $res = mysqli_query($conn,$sql);
      if(!$res){
        die("Error in connecting to user table");
      }
      while ($row=mysqli_fetch_assoc($res)) {

     ?>
    <tr>
      <th scope="row"><?php echo "".$row['id']; ?></th>
      <td><?php echo "".$row['first_name']; ?></td>
      <td><?php echo "".$row['last_name']; ?></td>
      <td><?php echo "".$row['email']; ?></td>
      <td><?php echo "".$row['contact_no']; ?></td>
      <td><?php echo "".$row['address']; ?></td>
      <td><?php echo "".$row['role']; ?></td>
      <td>Online</td>
      <td><a href="admin_uptade_customer.php?cid=<?php echo "".$row['id']; ?>"> <button class="btn btn-primary"type="button" name="button" >update</button></a></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
    </div>
  </center>

<?php
 include('footer.php');
?>
</body>
</html>
