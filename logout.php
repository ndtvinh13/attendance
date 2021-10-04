<?php 
    //TODO: includes the sesstion_start() to resume the session on this page
    require_once 'includes/session.php';
?>

<?php 
    //session_destroy() to destroy the 
    session_destroy();
    header("Location: index.php");
?>