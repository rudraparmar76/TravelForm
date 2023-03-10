<?php
$insert = false;
if (isset($_POST['name'])) {
    //set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    //create a database connection
    $con = mysqli_connect($server, $username, $password);
    //check for connection success
    if (!$con) {
        die("Connection of this database failed due to" . mysqli_connect_error());
    }
    // echo "Succes connecting to the DB!";
    //collect post variables
    $name = $_POST['name'];

    $gender = $_POST['gender'];

    $age = $_POST['age'];

    $email = $_POST['email'];

    $tel = $_POST['tel'];

    $desc = $_POST['desc'];
    
    $sql = "INSERT INTO `kerala_trip`.`kerala_trip` ( `Name`, `Age`, `Gender`, `Email`, `Phone`, `OtherInf`, `Dt`) VALUES ( '$name', '$age', '$gender', '$email', '$tel', '$desc', current_timestamp());";
    // echo $sql;
    //execute the query
    if ($con->query($sql) == true) {
        // echo "Succesfully Inserted";
        //flag for succesfull insertion
        $insert = true;

    } else {
        echo "Error:$sql<br> $con->error";
    }
    //close the db connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Travel Form</title>
    <!--Style Sheets-->
    <link rel="stylesheet" href="style.css" />
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Sriracha&display=swap" rel="stylesheet">

</head>

<body>
    <img class="bg" src="photo-1602216056096-3b40cc0c9944.jpg" alt="Kerala">
    <div class="container">
        <h1>
            Welcome to Shri Bhagubhai Mafatlal Polytechnic Kerala Trip Travel Form
        </h1>
        <p>
            Enter your details and submit this form to confirm your participation in
            the trip
        </p>
        <?php
        if ($insert == true) {
            echo "<p id ='hello'>Thanks for submitting your form.We are happy to see you joining Kerala Trip.</p>";
        }
        ?>


        <form action="form.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name " />
            <input type="text" name="age" id="age" placeholder="Enter your Age" />
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" />
            <input type="tel" name="tel" id="tel" placeholder="Enter your phone number" />
            <input type="email" name="email" id="email" placeholder="Enter you e-mail" />
            <textarea name="desc" id="desc" placeholder="Description" cols="30" rows="10">
                </textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <!--Scripts-->
    <script src="index.js"></script>

</body>

</html>