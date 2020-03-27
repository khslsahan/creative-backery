
<?php
    include('top_header.php');
    echo "<title>Add products</title>";
    include('connection.php');
    include('header.php');
?>

<h1>Add Products</h1>
<center>
<div class="box-Items col-md-6 col-sm-12">
<form  name="addfoods" action="additem.php" method="post" enctype='multipart/form-data'  onsubmit="success()">
  <div class="form-group row">
    <label for="inputproductname" class="col-sm-3 col-form-label">Product Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputfoodname" name="productname" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputquaitity" class="col-sm-3 col-form-label">Quantity</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputquaitity" name="quantity" required>
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-3 pt-0">Category</legend>
      <div class="col-sm-9">
        <select class="custom-select" name="category" required>
          <?php
            $sql = "select * from category";
            $res = mysqli_query($conn,$sql);
            if(!$res){
              die("error in the category".mysqli_error($conn));
            }

            while($row = mysqli_fetch_assoc($res)){
              echo "<option value='{$row['id']}'";
              if($row['id']==1)
                  echo "selected";

               echo ">{$row['category_name']}</option>";
            }
           ?>
        </select>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <label for="inputquaitity" class="col-sm-3 col-form-label">Price Per Unit (Rs.)</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputquaitity" name="price" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputquaitity" class="col-sm-3 col-form-label">Product  Description </label>
    <div class="col-sm-9">
      <textarea class="form-control" id="inputquaitity" name="product_description" style="height:150px;" required></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputquaitity" class="col-sm-3 col-form-label">Image</label>
    <div class="col-sm-9">
      <input type="file" name="file" value="Upload Image" required>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-6 ">
      <button type="reset" name="reset" class="btn btn-primary">Reset</button>
    </div>
    <div class="col-6 ">
      <button type="reset" name="reset" class="btn btn-primary">Reset</button>
    </div>
  </div>
</form>
<?php
  if(isset($_POST['submit']))
  {
    $productname=$_POST['productname'];
    $qty=$_POST['quantity'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $product_description =$_POST['product_description'];
    $filename=$_FILES['file']['name'];
    $target_dir="upload/";
    if($filename!='')
    {
      $target_file=$target_dir.basename($_FILES['file']['name']);
      //file extension
      $extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      //valid file extension
      $extension_arr=array("jpg","gif","png","jpeg");
      //check extension
      if(in_array($extension,$extension_arr))
      {
                //convert to base64
                                                  // $image_base64=base64_encode(file_get_contents($_FILES['file']['tmp_name']));
                                                  // $image="data::/image/".$extension.";base64,".$image_base64;
                                                  $image=$_FILES['file']['name'];
        //store image in upload folder
        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file))
        {
          // $query="INSERT INTO food (image) VALUES ('.$image.')";
          // mysqli_query($conn,$query);
          $q1="SELECT * FROM products where product_name='$productname'";
          $que=mysqli_query($conn,$q1);
        if(mysqli_num_rows($que)==0)
          {
            $query="INSERT INTO products (product_name,product_quantity,category_id,product_price, product_description,product_image) VALUES ('$productname',$qty,$category,$price,'$product_description','$image')";
            $result=mysqli_query($conn,$query);
            if(!$result)
              die ('data not inserted..!'.mysqli_error($conn));
          }
          else
          {
            echo "The given food item is already inserted...!";
          }
        }
      }
    }
  }

?>
</div>
<br>
</center>
<script>//give an alert when click submit button
  function success()
  {
    var fields=["productname","quantity","category","price","file"];
    var i,l=fields.length;
    var fieldname;
    for(i=0;i<l;i++)
    {
      fieldname=fields[i];
      if(document.forms["addfoods"][fieldname].value=="")
      {
        alert(fieldname + " cannot be empty");
        return false;
      }
      else {
        alert("Item added Successfully...!");
        return true;
      }
    }
  }
</script>


<?php
 include("footer.php");
?>
<script>//give an alert when click submit button
  function success()
  {
    var fields=["productname","quantity","category","price","file"];
    var i,l=fields.length;
    var fieldname;
    for(i=0;i<l;i++)
    {
      fieldname=fields[i];
      if(document.forms["addfoods"][fieldname].value=="")
      {
        alert(fieldname + " cannot be empty");
        return false;
      }
      else {
        alert("Item added Successfully...!");
        return true;
      }
    }
  }
</script>
