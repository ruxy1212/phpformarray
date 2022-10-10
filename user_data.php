<?php 
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$country = $_POST['country'];

    $csvFile = "userdata.csv";
    if (!file_exists($csvFile)) { //check if file exists, so can be read from
        touch($csvFile);
    }

    $csvHead = fopen($csvFile, "r");
    if(!($csvData = fgetcsv($csvHead))) { //check if header exist in csv file
        fclose($csvHead);
        $csvHead = fopen($csvFile, 'w');
        fputcsv($csvHead,  ['Full Name','Email Address','Gender','Date of Birth','Country']);
        fclose($csvHead); 
    }

    $csvData = fopen($csvFile, 'a'); //append new data to csv table
    fputcsv($csvData,  [$name, $email, $gender, $dob, $country]);
    fclose($csvData);

    $_SESSION['formdata'] = $_POST; //add the posted data to server session

   header('Location: tests.php'); //redirect back to form page
   exit;

?>