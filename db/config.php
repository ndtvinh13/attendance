
<!-- Using PHP Data Object (PDO) -->
<?php
    //Development connection
    // $host='127.0.0.1';
    // $db='attendance_db';
    // $user='root';
    // $pass='';
    // $charset='utf8mb4';
    // // data short name
    // $dsn="mysql:host=$host;dbname=$db;charset=$charset";


    //Remote database connection
    $host='remotemysql.com';
    $db='Lspe0tns3z';
    $user='Lspe0tns3z';
    $pass='PiQAqnxYbw';
    $charset='utf8mb4';
    // data short name
    $dsn="mysql:host=$host;dbname=$db;charset=$charset";


//TODO: Need to declare all of the objects above
        // 1. $host
        // 2. $db
        // 3. $user
        // 4. $pass
        // 5. $charset
        // 6. $dsn="mysql:host=$host;dbname=$db;charset=$charset";


//TODO: READ COMMENTS CAREFULLY ABOUT THIS
    // try <-> catch
    //Ouput error message
    try{
        //if nothing wrong this one will execute
        $pdo = new PDO($dsn, $user, $pass);
        // echo 'Hello database';
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){ //put exception to catch
        //if an error, catch it and put to $e
        //$e is an object
        // echo '<h1 class="text-danger">No Database Found</h1>';
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    $crud = new crud($pdo);
?>