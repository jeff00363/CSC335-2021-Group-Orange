<?php

    include '../db/connect_to_db.php';

	$db_name = 'retail_webstore';

	$conn = get_db_connection($db_name);
?>

<!DOCTYPE html>
        <html lang="en">


            <head>

                <title>Address Book</title>

            </head>



            <body>
            <div>
                <div>
                    <table>
                        <tr>
                            <td> <a>AddressID: </a> </td>
                            <td> <a>House Number: </a> </td>
                            <td> <a>Street Name: </a> </td>
                            <td> <a>Town: </a> </td>
                            <td> <a>Zipcode: </a> </td>

                        </tr>




        <?php
        //starts a while loop to fill and generate html code to show all entries on thr fourm
        //this are the 6 fields the user enters plus 1 for the id for the post.
        //these ids are assigned automatically via the mysql database
            while($row=mysqli_fetch_array($result))
            {
        ?>
                <tr>
                            <td><? echo $row['addressid']; ?> </td>
                            <td><? echo $row['houseNumber']; ?></td>
                            <td><? echo $row['streetname']; ?></td>
                            <td><? echo $row['town']; ?></td>
                            <td><? echo $row['zipcode']; ?> </td>
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