<?php 
//This file SHOULD NOT be displayed --> no header
    require_once 'db/config.php';
    //Get values from post operation
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        //TODO: Edit need to have the id
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $pass = $_POST['password'];
        $specialty = $_POST['specialty'];


        //Call Crud function
        //parameter variables need to be the same as above
        $result = $crud -> editAttendees($id, $fname, $lname, $dob, $email, $contact, $pass, $specialty);

        //Redirect to index.php
        if($result){
            //Redirecting to the home screen if it's true
            header("Location: index.php");
        }else{
            // echo 'Error!!!';
            include 'includes/errormessage.php';
        }
    }else{
        // echo '<h1>The attendee does not exist!!!</h1>';
        include 'includes/errormessage.php';
    }



?>