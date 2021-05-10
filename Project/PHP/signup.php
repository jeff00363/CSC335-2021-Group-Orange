<?php


include 'db/connect_to_db.php';

$db_name = 'retail_webstore';

$conn = get_db_connection($db_name);

//sets the varibales up
$username = "";
$password = "";
$utype = "";
$usernameError = "";
$passwordError = "";
$typeError = "";


//Checks for a username registration
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty(trim($_POST["username"])))
    {
        //wants user to enter a username
        $usernameError = "Enter Username";
    }
    else
    {
        //searches the sql databased for an id where username is not used
        $sql= "SELECT userid FROM userLogin WHERE username = '$username'";

            //launcges the stmt command which prepares statements for the SQL server
            if($stmt = mysqli_prepare($conn, $sql))
            {
                //forces the username to be entered .its a mandatory value
                mysqli_stmt_bind_param($stmt,"s",$param_username);

                //trims whitespace and characters off a string
                $param_username = trim($_POST["username"]);

                //stores the result on its its true or not. Then well be trimmed or rejected
                if(mysqli_stmt_execute($stmt))

                {
                    //used to temp store the results of the call previouly prepared tsatments
                    mysqli_stmt_store_result($stmt);

                    //saves the variable. Does strip the formatting with trim
                    $username = trim($_POST["username"]);
                }


            }
            //closes the stmt instance to prevent data damage
        mysqli_stmt_close($stmt);
    }
    //starts checking to add a password. no comparisons are done
    //this is as password can not interfere with other users data
    if(empty(trim($_POST["password"])))
        {

            //does a error catch to make sure its entered. its a blank forum
            //at this point
            $passwordError = "Enter Password";

        }
    else
        //data is trimmed to remove white space then added to the database
        {
            $password = trim($_POST["password"]);
        }
    if(empty(trim($_POST["type"])))
    {
        //does a error catch to make sure its entered. its a blank forum
        //at this point
        $typeError = "Enter Type";
    }
    else
        //data is trimmed to remove white space then added to the database
    {

        $utype = trim($_POST["usertype"]);
    }
    $conn->close();
}

?>

<html>


<head>
    <Title>Sign Up</Title>
</head>

<Div class="regSIGN">
    <label> SIGN UP!!</label>
</Div>


<body>

<div class="regBOX">

    <form action="welcome.php" method="post">
        <!--<div <?php //echo (!empty($usernameError)) ? 'error' : ''; ?>>-->

            <label> Username:  </label>
            <input id= "username" type="text" name="username" size="16" <?php //echo $username; ?>> <br> <br>

        <!--</div>-->
<!--
        <div <?php //echo (!empty($passwordError)) ? 'error' : ''; ?>>-->

            <label> Password: </label>
            <input id= "password" type="password" name="pass_field" size="16" <?php //echo $password; ?>> <br> <br>

        <!--</div>-->

        <!--<div <?php //echo (!empty($typeError)) ? 'error' : ''; ?>>-->

            <label> Phone: </label>
            <input id= "phone" type="tel" name="phone" size="16" <?php //echo $utype; ?>> <br> <br>

        <!--</div>-->
        
        <input id=signupbutton type="submit" value = 'Sign Up'>
    </form>

    <!--<form action="welcome.php" method="post">
        
        <span style = 'position:fixed; left: 100px;top: 200px;'> 
            Name: <input type="text" name="user_name">
            <br>
        </span>
        
        <input type="password" name = "pass_field">

        <span style = 'position:fixed; left: 100px;;top: 250px;'> 
            Phone Number: <input type="text" name="email"><br>
        </span>
        
        <span style = 'position:fixed; left: 100px;;top: 280px;'> 
            <input type="submit">
        </span>
    </form>-->


</div>

</body>


</html>