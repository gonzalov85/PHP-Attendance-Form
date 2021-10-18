<?php
    $title= "Home";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
?>
    <h2 class="text-center">Registration Form</h2>
    <form method="POST" action="success.php">
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="firstName" name="firstName">
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="lastName" name="lastName">
        </div>
        <div class="mb-3">
            <label for="birthDate" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate">
        </div>
        <div class="mb-3">
            <label for="aoe" class="form-label">Area of Expertise</label>
            <select class="form-select" id="aoe" name="aoe">
            <?php while ($r=$results->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value = "<?php echo $r['specialty_id']; ?>"> <?php echo $r['name']; ?></option>
        <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
<?php
    require_once 'includes/footer.php';
?>


