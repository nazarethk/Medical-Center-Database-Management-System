<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<!--===============================================================================================-->
<link rel="stylesheet" href="../bootstrap.min.css">
<!--===============================================================================================-->	
<link rel="shortcut icon" type="image/png" href="../images/Caduceus-256.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/style_login.css">
<!--===============================================================================================-->
	<script src="../loginJS/main.js" defer></script>
<!--===============================================================================================-->
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->


<?php 
  include("header.php");
  include("library.php");
  noAccessIfLoggedIn();
  include("nav-bar.php");
?>
<div class="container">


    <?php
    $_SESSION['wrongPass']=false;
      if (isset($_POST['email'])){
        $type = $_POST['type'];
        $i = login($_POST['email'],$_POST['password'],$type);
        if ($i == 1){
          noAccessIfLoggedIn();
        }
      }
    ?>
 
 <h1 style="display:flex; justify-content:center;"> DentaCare Medical Center</h1>
		<p class="block-quote" style="color: #003399; display:flex; justify-content:center;">Always bringing world–class medical care for everyone.</p>
  
<body class="container" style="background-image: linear-gradient(to bottom right,#ffffff 0%, #2cbcbc 100%);">


<div class="wrap-login100" style="margin-top: -105px;padding-top: 100px;margin-right: auto; margin-left: auto;">
  <div class="login100-pic js-tilt" data-tilt>
    <img src="../images/img-01.png" style="padding-bottom: 75px" alt="IMG">
  </div>
  
  <form class="login100-form validate-form" action="staff.php" method="POST">
    <span class="login100-form-title">
      Staff Login
    </span>

  <?php if($_SESSION['wrongPass']===true){
		echo'<p style="color:red;display:flex;justify-content:center">Wrong email or password!</p>';
	} ?>

    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: username@domain.com">
      <input class="input100" type="text" name="email" placeholder="Email">
      <span class="focus-input100"></span>
      <span class="symbol-input100">
        <i class="fa fa-envelope" aria-hidden="true"></i>
      </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate = "Password is required with a minimum of 8 characters">
      <input class="input100" type="password" name="password" minlength="5" placeholder="Password">
      <span class="focus-input100"></span>
      <span class="symbol-input100">
        <i class="fa fa-lock" aria-hidden="true"></i>
      </span>
    </div>
  

    <div class="form-group">
          
          <select required value=1 class ='form-control' name="type" style="width: 500;">
                <option value="admin" class="option">Admin</option>
                <option value="clerks" class="option">Clerk</option>
                <option value="doctors" class="option">Doctor</option>
          </select>
    </div>
    <div class="form-group"style="margin-bottom: 0px;">
      <div class="container-login100-form-btn">


        <button type="submit" class="login100-form-btn" style="dislpay:flex;justify-content:center;width:100%;margin-bottom:15px;" >
          Login
        </button>
        <button type="reset" class="login100-form-btn btn-danger" style="dislpay:flex;justify-content:center;width:100%;" >
          Reset
        </button>
        
      </div>
    </div>
    

    
  
  </form>
</div>

  




<!--===============================================================================================-->	
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/bootstrap/js/popper.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/tilt/tilt.jquery.min.js"></script>
<!--===============================================================================================-->
<script >
  $('.js-tilt').tilt({
    scale: 1.1
  })
</script>
<!--===============================================================================================-->


<?php 
include("footer.php"); ?> 
</body>