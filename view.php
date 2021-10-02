<!-- TODO: view one record at the time -->

<?php 
    $title='I';

    require_once 'includes/header.php';
    require_once 'db/config.php';

    //Get the attendee by id
    //isset function to check if one exists
    if(!isset($_GET['id'])){
        // echo "<h1 class='text-danger'>Please check details and try again</h1>";
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }else{
        $id=$_GET['id'];
        $result=$crud->getAttendeeDetails($id);
    


?>
<!-- TODO: variables in the $result[] have to match with ones in the database -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name']; ?></h6>
    <p class="card-text">Date of Birth: <?php echo $result['dateofbirth']; ?></p>
    <p class="card-text">Contact Number: <?php echo $result['contactnumber']; ?></p>
    <p class="card-text">Email: <?php echo $result['email']; ?></p>
    <p class="card-text">Password: <?php echo $result['passwordc']; ?></p>
  </div>
</div>
<br>
<a href="viewrecords.php" class="btn btn-primary">Back to list</a>
<a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
<a onclick="return confirm('Are you sure that you want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>
<!-- This } is of the else statement -->
<?php } ?>


<br>
<br>
<br>
<br>
      
<div class='text-center'>
    <?php echo 'Copyright '. date('Y');?>
</div>