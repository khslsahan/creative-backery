
<?php
    include('top_header.php');
    echo "<title>Add Category</title>";
    include('connection.php');
    include('header.php');
?>

<h1>Add  Category</h1>
<center>
<div class="box-Items col-md-6 col-sm-12">
<form action="add_category.php" method="post" enctype='multipart/form-data'>
  <div class="form-group row">
    <label for="inputproductname" class="col-sm-4 col-form-label">Category Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputfoodname" name="categoryname">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputquaitity" class="col-sm-4 col-form-label">Category Description</label>
    <div class="col-sm-8">
      <textarea class="form-control" id="inputquaitity" name="category_description" style="height:150px;"></textarea>
    </div>
  </div>
   <div class="form-group row">
    <div class="col-6 ">
      <button type="reset" name="reset" class="btn btn-primary " >Reset</button>
    </div>
    <div class="col-6 ">
      <button type="submit" name="submit" class="btn btn-primary">Add category</button>
    </div>
  </div>
</form>
<?php
  if(isset($_POST['submit']))
  {
    $categoryname=$_POST['categoryname'];
    $category_description=$_POST['category_description'];

    $query="INSERT INTO category (category_name,category_description ) VALUES ('$categoryname','$category_description')";
    $result=mysqli_query($conn,$query);
    if(!$result)
      die ('data not inserted..!'.mysqli_error($conn));
    else
      echo "category is inserted Successfully...!";
         }

?>
</div>
</center>
<?php
 include("footer.php");
?>
</body>
</html>
