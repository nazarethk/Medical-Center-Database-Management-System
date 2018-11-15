<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<?php 
  include("header.php");
  include("library.php");

  noAccessForClerk();
  noAccessForDoctor();
  noAccessForNormal();

  noAccessIfNotLoggedIn();

?>
 	
  
  <?php 
    if(isset($_POST['demail'])){
  //doctors
     
      $i = registerD($_POST['demail'],$_POST['dpassword'],$_POST['dfullname'],$_POST['dSpecialist'],$_POST['dphonenumber'],$_POST['droomnumber'],"doctors");
    }
    if(isset($_POST['aemail'])){
      //clerks
     
      $i = register($_POST['aemail'],$_POST['apassword'] ,$_POST['afullname'],$_POST['aphonenumber'],'non',"clerks");
    }
    if(isset($_POST['DrDelEmail'])){
      $i = delete("doctors",$_POST['DrDelEmail']);
    }
    if(isset($_POST['ClDelEmail'])){
      $i = delete("clerks",$_POST['ClDelEmail']);
    }
    
  ?>

<div class= "container">
<h1 align=center>Admin Panel for DentaCare Medical Center</h1>
      <div class="row">
          <div class="col-md-6 box1">
          <form method="post" action="admin_home.php">
      <h2>Clerk Registration</h2>
        <div class="form-group">
          <label for="usr">Full Name:</label>
          <input type="text" class="form-control" name="afullname" required>
        </div>
        
        <div class="form-group">
          <label for="usr">Email:</label>
          <input type="email" class="form-control" name="aemail" required>
        </div>
            
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control"  minlength="8" name="apassword" required>
        </div>

        <div class="form-group">
          <label for="usr">Phone Number</label>
          <input type="text" class="form-control" name="aphonenumber" required>
        </div>

  

        <div class="form-group">
          <input type="submit" class="btn btn-primary" style="width:45%;margin-right:10px;margin-left:10px;" value="Register">
          <input type="reset" name="" class="btn btn-danger" style="width:45%;"></button>
        </div>
    </form>
      <hr>
                  <form method="post" action="admin_home.php">

      <div class="form-group">
                <h2>Delete Clerk</h2>
            <select class='form-control' required value=1 name="ClDelEmail">
            <?php 
                $result = getListOfEmails('clerks');

                if(is_bool($result)){
                  echo "No clerks found in database";
                }else{
                  while($row = $result->fetch_array())
                  {
                    echo "<option value='" . $row['email'] . "'>" . $row['email'] . "</option>";
                  }
                }

            ?>
            </select>
            </div>
            <div class="form-group">

            <input type="submit" class="btn btn-primary" style="padding: 5px;width:40%;margin-left:5px" value="Delete">
            </div>


          
          </div>
          <div class="col-md-6 box2">
          <form method="post" action="admin_home.php">
      <h2>Doctor Registration</h2>
        <div class="form-group">
          <label for="usr">Full Name:</label>
          <input type="text" class="form-control" name="dfullname" required>
        </div>
        
        <div class="form-group">
          <label for="usr">Email:</label>
          <input type="email" class="form-control" name="demail" required>
        </div>
            
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" minlength="8" name="dpassword" required>
        </div>

        <div class="form-group">
          <label for="usr">Phone Number</label>
          <input type="text" class="form-control" name="dphonenumber" required>
        </div>

        <div class="form-group">
          <label for="usr">Room Number</label>
          <input type="text" class="form-control" name="droomnumber" required>
        </div>

        <div class="form-group">
          <label for="pwd">Speciality:</label>
            <select class='form-control' required value=1 name="dSpecialist">
              <option value="Audiologist" class="option">Audiologist - Ear Expert</option>
              <option value="Allergist" class="option">Allergist - Allergy Expert</option>
              <option value="Anesthesiologist" class="option">Anesthesiologist - Anesthetic Expert</option>
              <option value="Cardiologist" class="option">Cardiologist - Heart Expert</option>
              <option value="Dentist" class="option">Dentist - Oral Care Expert</option>
              <option value="Dermatologist" class="option">Dermatologist - Skin Expert</option>
              <option value="Endocrinologist" class="option">Endocrinologist - Endocrine Expert</option>
            </select>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" style="width:45%;margin-left:10px;margin-right:10px" value="Register">
          <input type="reset" name="" class="btn btn-danger" style="width:45%;"></button>
        </div>
    </form>


        <hr>
     <form method="post" action="admin_home.php">

        <div class="form-group">
                <h2>Delete Doctor</h2>
            <select class='form-control' required value=1 name="DrDelEmail">

            <?php 
                $result = getListOfEmails('doctors');

                if(is_bool($result)){
                  echo "No doctors found in database";
                }else{
                  while($row = $result->fetch_array())
                  {
                    echo "<option value='" . $row['email'] . "'>" . $row['email'] . "</option>";
                  }
                  echo '&emsp;';

                }

            ?>
            </select></div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" style="padding: 5px;width:40%;margin-left:5px" value="Delete">
            </div>
          </form>
        </div>
    </form>
  </div>
          </form>
          </div>
       </div>
</div>

<?php include("footer.php"); ?>

