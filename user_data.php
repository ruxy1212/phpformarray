<?php 
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Week 3 Assignment</title>
    <style>
        body {
            background-color: rgb(241, 223, 253);
        }
        
        article {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 12px;
            width: 80%;
            margin: 0 auto;
            padding: 10px;
            color: white;
            margin-top: 50px;
        }

        h5 {
            margin: 0;
        }

        h3 {
            color: #69ed67;
            margin: 0;
        }
    </style>
</head>
<body>
    <div>
        <?php
             $name = $_POST['name'];
             $email = $_POST['email'];
             $gender = $_POST['gender'];
             $dob = $_POST['dob'];
             $country = $_POST['country'];
              ?> <article><h3>Registration was successful!</h3>  
                 <h5>Name: <?php echo $name; ?></h5> 
                 <h5>Email: <?php echo $email; ?></h5>
                 <h5>Gender: <?php echo $gender; ?></h5>
                 <h5>Date of Birth: <?php echo $dob; ?></h5>
                 <h5>Country: <?php echo $country; ?></h5></article>      
             <?php 
             print_r($_POST); 
        ?>
    </div>
</body>
</html>
