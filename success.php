<?php
    $title= "Success";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if (isset($_POST['submit'])) {
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $dob = $_POST['birthDate'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['aoe'];
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);
    }

    if ($isSuccess) {
        include "includes/successmessage.php";
        echo "<p>First Name: " .$_POST['firstName']."</p>";
        echo "<p>Last Name: " .$_POST['lastName']."</p>";
        echo "<p>Date of Birth: " .$_POST['birthDate']."</p>";
        switch ($_POST['aoe']) {
            case '1':
                echo "<p>Area of Expertise: Database Admin";
                break;
            case '2':
                echo "<p>Area of Expertise: Sotware Developer";
                break;
            case '3':
                echo "<p>Area of Expertise: Web Administrator";
                break;
            default:
                echo "<p>Area of Expertise: Other";
        }
        echo "<p>Email: " .$_POST['email']."</p>";
        echo "<p>Phone Number: " .$_POST['phone']."</p>";
    } else {
        include "includes/error.php";
    }
?>

<?php
    require_once 'includes/footer.php';
?>