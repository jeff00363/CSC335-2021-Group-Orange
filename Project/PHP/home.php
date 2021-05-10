

<html>
<body>

<br>
<br>
<?php

session_start();

echo "Welcome, ".$_SESSION["username"];
echo "<br><a href=\"login.php\">Log out</a>";

?>

</body>
</html>