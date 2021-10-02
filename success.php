<?php 
  $title='Success';

  require_once 'includes/header.php';
  //require config.php because:
    //1.It will establish the connection
    //2.config.php will automatically connect crud.php
  require_once 'db/config.php';

  //check if the submit value exists
  if(isset($_POST['submit'])){
    //extract values from the $_POST array
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $pass = $_POST['password'];
    $specialty = $_POST['specialty'];
    $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $pass, $specialty);
    
    if($isSuccess){
      // echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
      include 'includes/successmessage.php';
    }
    else{
      // echo '<h1 class="text-center text-danger">There is an error in the process!</h1>';
      include 'includes/errormessage.php';
    }
  }
?>




<!-- GET method -->
<!-- <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php //echo $_GET['firstname'] . ' ' . $_GET['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php //echo $_GET['specialty']; ?></h6>
    <p class="card-text">Date of Birth: <?php //echo $_GET['dob']; ?></p>
    <p class="card-text">Contact Number: <?php //echo $_GET['phone']; ?></p>
    <p class="card-text">Email: <?php //echo $_GET['email']; ?></p>
    <p class="card-text">Password: <?php //echo $_GET['password']; ?></p>
  </div>
</div> -->



<!-- POST method -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['specialty']; ?></h6>
    <p class="card-text">Date of Birth: <?php echo $_POST['dob']; ?></p>
    <p class="card-text">Contact Number: <?php echo $_POST['phone']; ?></p>
    <p class="card-text">Email: <?php echo $_POST['email']; ?></p>
    <p class="card-text">Password: <?php echo $_POST['password']; ?></p>
  </div>
</div>


<?php
    // echo $_GET['firstname'];
    // echo $_GET['lastname'];
    // echo $_GET['dob'];
    // echo $_GET['specialty'];
    // echo $_GET['phone'];
    // echo $_GET['email'];
    // echo $_GET['password'];
?>



<?php require_once 'includes/footer.php';?>