<?php
    $title= "Edit Record";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
    if(!isset($_GET['id'])) {
        include "includes/error.php";
    } else {
        $id = $_GET['id'];
        $atendee = $crud->getAttendeeDetails($id);
?>
    <h2 class="text-center">Edit Record</h2>
    <form method="POST" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $atendee['attendee_id'] ?>">
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $atendee['firstname'] ?>">
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input value="<?php echo $atendee['lastname'] ?>" type="text" class="form-control" id="lastName" name="lastName">
        </div>
        <div class="mb-3">
            <label for="birthDate" class="form-label">Date of Birth</label>
            <input value="<?php echo $atendee['dateofbirth'] ?>" type="date" class="form-control" id="birthDate" name="birthDate">
        </div>
        <div class="mb-3">
            <label for="aoe" class="form-label">Area of Expertise</label>
            <select class="form-select" id="aoe" name="aoe">
            <?php while ($r=$results->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value = "<?php echo $r['specialty_id']; ?>" <?php if ($r['specialty_id'] == $atendee['specialty_id']) echo 'selected'?> > <?php echo $r['name']; ?></option>
        <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input value="<?php echo $atendee['emailadress'] ?>" type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input value="<?php echo $atendee['contactnumber'] ?>" type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <button type="submit" class="btn btn-success" name="submit">Save Changes</button>
    </form>

<?php
    }
?> 
<?php
    require_once 'includes/footer.php';
?>