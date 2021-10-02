<?php 
    require_once 'db/config.php';

    if(!$_GET['id']){
        // echo 'error!!!!';
        include 'includes/errormessage.php';
    }else{
        //Get id value
        $id = $_GET['id'];

        //Call Delete function
        $result = $crud -> deleteAttendee($id);

        //Redirect to list if it is true
        if($result){
            header("Location: viewrecords.php");
        }else{
            header("Location: viewrecords.php");
        }
    }

?>