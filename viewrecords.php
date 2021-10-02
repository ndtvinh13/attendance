<!-- TODO: View all records at the time -->

<?php 
    $title='View Records';

    require_once 'includes/header.php';
    require_once 'db/config.php';

    $results = $crud -> getAttendees();
?>


<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <!-- <th>Date of Birth</th>
        <th>Email</th>
        <th>Contact Number</th> -->
        <th>Specialty</th>
        <!-- <th>Password</th>     -->
        <th>Actions</th> 
    </tr>

    <!-- while loop to loop through the database -->
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
        <tr>
            <th><?php echo $r['attendee_id'] ?></th>
            <td><?php echo $r['firstname'] ?></td>
            <td><?php echo $r['lastname'] ?></td>
            <!-- <td><?php //echo $r['dateofbirth'] ?></td>
            <td><?php //echo $r['email'] ?></td>
            <td><?php //echo $r['contactnumber'] ?></td> -->
            <td><?php echo $r['name'] ?></td>
            <!-- <td><?php //echo $r['passwordc'] ?></td> -->
            <!-- FIXME: put data in to a query string to compare ?id -->
            <td>
                <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are you sure that you want to delete this record?');" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php } ?>

</table>



<?php require_once 'includes/footer.php';?>