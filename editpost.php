<?php
    $title= "Success";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $dob = $_POST['birthDate'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['aoe'];

        $result = $crud->editAttendees($id,$fname, $lname, $dob, $email, $contact, $specialty);
        if($result){
            header("Location: viewrecords.php");
        } else {
            include "includes/error.php";
        }
    } else {
        include "includes/error.php";
    }
