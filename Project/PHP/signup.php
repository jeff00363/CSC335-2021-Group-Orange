<?php

$ipAddress= "00.000.00.000";
$user = "user"   ;
$pass =  "123456"   ;

//starts the connection o mysql
//will display error in browser if it cants connect
$link = mysqli_connect($ipAddress,$user,$pass);


//Sets the if to end connection if there an error
if ($link == false) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
    echo "Connected successfully";
}

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
            if($stmt = mysqli_prepare($link, $sql))
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

    //pushes the data to the database
    $sql = "INSERT INTO userLogin (username,pass,phoneNumber) VALUES ('$username','$password','$utype')";

    //closes tthe sql connection
    mysqli_close($link);
}

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <Title>Sign Up</Title>
</head>

<Div class="regSIGN">
    <label> SIGN UP!!</label>
</Div>


<body>

<div class="regBOX">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >

        <div class="typebox">

            <div <?php echo (!empty($usernameError)) ? 'error' : ''; ?>>

                <label> Username:  </label>
                <input id= "username" type="username" name="username" size="16" <?php echo $username; ?>> <br> <br>

            </div>

            <div <?php echo (!empty($passwordError)) ? 'error' : ''; ?>>

                <label> Password: </label>
                <input id= "password" type="password" name="password" size="16" <?php echo $password; ?>> <br> <br>

            </div >

            <div <?php echo (!empty($typeError)) ? 'error' : ''; ?>>

                <label> Phone: </label>
                <input id= "usertype" type="usertype" name="type" size="16" <?php echo $utype; ?>> <br> <br>

            </div>

        </div>

        <input id=signupbutton type="button"  value = 'Sign Up'>


    </form>



</div>

</body>


</html>