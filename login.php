<?php 
    $title='User Logins';

    require_once 'includes/header.php';
    require_once 'db/config.php';

    //Check if the data is submitted via a form POST request

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username=strtolower(trim($_POST['username']));
        $password=$_POST['password'];
        $new_password=md5($password.$username);

        $result = $user -> getUser($username,$new_password);

        if(!$result){
            require_once 'includes/errormessage.php';
        }else{
            //$_SESSION is used to store usename in this page
            //in stead of the db
            $_SESSION['username']=$username;
            $_SESSION['id']=$result['id'];
            header("Location: viewrecords.php");
            require_once 'includes/successmessage.php';
        }
    }
?>
<h1 class="text-center">User logins</h1>
<!-- TODO: -->
<!-- This action in php tag means action should be in this same page -->
<!-- what happens in this one will be in the same page $_SERVER['PHP_SELF'] -->
<!-- htmlentities to reduce sql injection from taking special or unkown characters -->
  <form class="px-4 py-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username:*</label>
        <!-- If request method = post -> get the username -->
        <input type="text" name="username"class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:*</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Log in</button>
    </div>
  </form>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="#">Forgot password?</a>







<?php require_once 'includes/footer.php';?>