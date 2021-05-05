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
?>

<!DOCTYPE html>
        <html lang="en">


            <head>

                <title>CART</title>

            </head>



            <body>
            <div>
                <div>
                    <table>
                        <tr>
                            <td> <a>CartID: </a> </td>
                            <td> <a>Total Items: </a> </td>
                            <td> <a>Invetory IDs: </a> </td>
                            <td> <a>Purchaser:</a> </td>

                        </tr>




        <?php
        //starts a while loop to fill and generate html code to show all entries on thr fourm
        //this are the 6 fields the user enters plus 1 for the id for the post.
        //these ids are assigned automatically via the mysql database
            while($row=mysqli_fetch_array($result))
            {
        ?>
                <tr>
                            <td><? echo $row['cartid']; ?> </td>
                            <td><? echo $row['totalItems']; ?></td>
                            <td><? echo $row['iventoryid']; ?></td>
                            <td><? echo $row['purchaser']; ?> </td>
                </tr>

        <?php
            }
            //closes the loop before trentung ti noormal html code
        ?>


        </table>


        </div>


        </div>
        </body>
        </html>