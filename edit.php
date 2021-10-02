<?php 
    $title='Edit records';

    require_once 'includes/header.php';
    require_once 'db/config.php';

    $results = $crud -> getSpecialties();

    if(!isset($_GET['id']))
    {
        //echo error
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }else{
        $id=$_GET['id'];
        $attendee = $crud -> getAttendeeDetails($id);
    
    
?>

    <h1 class="text-center">Edit Records</h1>

    <form method="post" action="editpost.php">
        <!-- take the attendee_id but hidden -->
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob"  name="dob">
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area of Expertise</label>
            <select class="form-select" aria-label="Default select example" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo$r['specialty_id'] ?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?> > 
                        <?php echo $r['name'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?php echo $attendee['email'] ?>" id="exampleInputEmail1"  name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" value="<?php echo $attendee['passwordc'] ?>" id="exampleInputPassword1" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <div class="d-grid gap-2">  
            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>

<?php } ?>

    <?php require_once 'includes/footer.php';?>
