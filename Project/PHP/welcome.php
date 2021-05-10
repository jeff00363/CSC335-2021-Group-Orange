

<?php
    include 'db/connect_to_db.php';

    $db_name = 'retail_webstore';

    $conn = get_db_connection($db_name);

    $username = $_POST["username"];
    $password = $_POST["pass_field"];
    $phoneNumber = $_POST["phone"];
    echo "$username";
    echo "$password";
    echo "$phoneNumber";
    $sql = "INSERT INTO userLogin (username, pass, phoneNumber) 
    VALUES ('$username', '$password', '$phoneNumber')";

    if ($conn->query($sql) === TRUE) {
        // if one of the fields is auto increment, you can retrieve the id of the last insertion
        $last_id = $conn->insert_id;
        echo "Data inserted into User DB successfully";
        echo "<br>";
        echo "New record created successfully. Last inserted ID is: " . $last_id;
    } else {
        echo "Error inserting data" . $conn->error;
    }

    //$username = $_POST["username"];
//    $password = $_POST["pass_field"];
  //  $phoneNumber = $_POST["phone"];
    //pushes the data to the database
    //$sql = "INSERT INTO userLogin (username,pass,phoneNumber) VALUES ('$username','$password','$phoneNumber')";
    $conn->close();
?>

<html>
<body>

Welcome <?php echo $_POST["username"]; ?><br>
Your phone number is: <?php echo $_POST["phone"]; ?>
</body>
</html