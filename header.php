
</head>
<body>
  <?php  include('nav.php'); ?>
  <div class=" jumbotron jumbotron-fluid" style=" background: #130f40; height: 10%">
    <div style="margin-left:10% ;margin-right: 10% ; " >
      <?php
            if(isset($_SESSION['login'])&& (($_SESSION['role']=='customer'||$_SESSION['role']=='admin'))){
        ?>
      <div class="signin-up">
    <a href="<?php  $ad = ($_SESSION['role']=='admin')?"admin.php":"customer.php"; echo $ad;?>">
      <button type="button" class="btn btn-outline-warning">
        <i class="icon fa fa-user" style="margin-right:10px;"></i>
          <?php echo "    ".$_SESSION['user_name']; ?>
      </button>
    </a>
    <a href="logout.php"><button type="button" class="btn btn-outline-warning">Log out</button></a>
      </div>

    <?php }else{ ?>

     <div class="signin-up">

           <a href="signup.php"><button type="button" class="btn btn-outline-warning">Sign Up</button></a>
           <a href="login.php"><button type="button" class="btn btn-outline-warning">Login</button></a>

     </div>
   <?php } ?>
      <h1 style="color: #c6d324">Creative Bakery System</h1>
      <p style="color: #c6d324 ">The all what you need...</p>
    </div>
  </div>
