<?php
    $title= "View Record";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    // get attendee by id

    if(!isset($_GET['id'])) {
        include "includes/error.php";
    } else {
        $id = $_GET['id'];
        $results = $crud->getAttendeeDetails($id);
    

?>

<div class="card" style="width: 18rem;">
  <div class="card-header">
    <b><?php echo $results['firstname']." ". $results['lastname'] ?></b>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Date of Birth: <?php echo $results['dateofbirth']; ?></li>
    <li class="list-group-item">Email: <?php echo $results['emailadress']; ?></li>
    <li class="list-group-item">Contact Number: <?php echo $results['contactnumber']; ?></li>
    <li class="list-group-item">Specialty: <?php echo $results['name']; ?></li>
  </ul>
</div><br>
<a href="viewrecords.php" class="btn btn-info">Back to List</a>
<a href="edit.php?id=<?php echo $results['attendee_id']; ?>" class="btn btn-warning">Edit</a>
<a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $results['attendee_id']; ?>" class="btn btn-danger">Delete</a>
<?php
    }
?>    
<?php
    require_once 'includes/footer.php';
?>
