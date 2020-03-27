
<?php
    include('top_header.php');
    echo "<title>Add Outlets</title>";
    include('connection.php');
    include('header.php');
?>

<h1>Add Outlets</h1>
<center>
  <div class="box-Items col-md-6 col-sm-12">
  <form action="add_outlets.php" method="post" enctype='multipart/form-data'>
    <div class="form-group row">
      <label for="inputproductname" class="col-sm-3 col-form-label">Outlet Name</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="inputfoodname" name="outlet_name">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputquaitity" class="col-sm-3 col-form-label">Outlet Description  </label>
      <div class="col-sm-9">
        <textarea class="form-control" id="inputquaitity" name="outlet_description" style="height:120px;"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputquaitity" class="col-sm-3 col-form-label">Provience</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="inputquaitity" name="outlet_provience">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputquaitity" class="col-sm-3 col-form-label">Address  </label>
      <div class="col-sm-9">
        <textarea class="form-control" id="inputquaitity" name="outlet_adress" style="height:70px;"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputquaitity" class="col-sm-3 col-form-label">Image</label>
      <div class="col-sm-9">
        <input type="file" name="file" value="Upload Image">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-6 ">
        <button type="submit" name="submit" class="btn btn-primary">Add Outlet</button>
      </div>
      <div class="col-6 ">
        <button type="reset" name="reset" class="btn btn-primary">Reset</button>
      </div>
    </div>
  </form>
  <?php
    if(isset($_POST['submit']))
    {
      $outlet_name=$_POST['outlet_name'];
      $outlet_description=$_POST['outlet_description'];
      $outlet_provience=$_POST['outlet_provience'];
      $outlet_adress=$_POST['outlet_adress'];
      $filename=$_FILES['file']['name'];
      $target_dir="upload_outlet/";
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
            $q1="SELECT * FROM outlets where outlet_name='$outlet_name'";
            $que=mysqli_query($conn,$q1);
            if(mysqli_num_rows($que)==0)
            {
              $query="INSERT INTO outlets (outlet_name,outlet_description,outlet_province,outlet_address,image) VALUES ('$outlet_name','$outlet_description','$outlet_provience','$outlet_adress','$image')";
              $result=mysqli_query($conn,$query);
              if(!$result)
                die ('data not inserted..!'.mysqli_error($conn));
              else
                echo " Outlet is inserted Successfully...!";
            }
            else
              {
              echo "The given Outlets is already inserted...!";
              }
            }
          }
        }
      }

  ?>
  </div>
</center>
<?php
 include("footer.php");
?>
</body>
</html>
