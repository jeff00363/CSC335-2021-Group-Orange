<?php
include 'db/connect_to_db.php';

$db_name = 'retail_webstore';

$conn = get_db_connection($db_name);
?>

<html>
<head>
<style>
</style>
<title>Webstore101</title>
</head>
<body>

<h1> Welcome to the Webstore </h1>

<div class="welcome">
  <div>
     <p> Welcome to the store, please login/signup to continue where you left off </p>
  </div>

  <div>
     <button onclick="parent.location='login.php'"> Login </button>
     <button onclick="parent.location='signup.php'"> Signup </button>
     <button onclick="parent.location='addresses.php'"> Address Book </button>
  </div>

    <div>
    <h1>Featured Items</h1>
    <img src="" alt=""> <p>image goes here</p>
    <img src="" alt=""> <p>image goes here</p>
    <div>
    
    <div>
     <button onclick="parent.location='cart.php'"> View Cart </button>
     <button onclick="parent.location='orders.php'"> Orders </button>
  </div>

    <div>
    <div>Search HERE</div>
    <div>
    <input type="text"> <button>GO</button>
    </div>
      
    
    
    </div>



</div>

<div>Thank you and have a great day</div>

</body>
</html>
