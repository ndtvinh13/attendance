<?php 
    $title='Index';

    require_once 'includes/header.php';
    require_once 'db/config.php';

    $results = $crud -> getSpecialties();
?>
    <!-- 
        - First name
        - Last name
        - DoB
        - specialty
        - email address
        - contact number
     -->


    <h1 class="text-center">Registration for IT Conference</h1>

    <form method="post" action="success.php">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input required type="text" class="form-control" id="dob"  name="dob">
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area of Expertise</label>
            <select class="form-select" aria-label="Default select example" id="specialty" name="specialty">
                <!-- <option selected>Open this select menu</option>
                <option value='1'>Database Admin</option>
                <option>Software Developer</option>
                <option>Web Administrator</option>
                <option>Other</option> -->
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo$r['specialty_id'] ?>"><?php echo $r['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="phone" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="exampleInputEmail1"  name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <div class="d-grid gap-2">  
            <button type="submit" name="submit" class="btn btn-primary bg-warning text-dark border-white">Submit</button>
        </div>
    </form>



    <?php require_once 'includes/footer.php';?>



    <!-- Form validation -> use required in the input -->