<!DOCTYPE html>
<html>
<head>
<title>Request</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


  <div class="container">

    <h1>Thank You!</h1>
    <p>You will recieve a response within 5 working days.</p><br>

    <hr>

      <h4>Here is the information you have submitted:</h4><br>


      <p>First Name: </p>
      <p><?php echo $_POST["fname"]?></p>
      <p>Last Name: </p>
      <p><?php echo $_POST["lname"]?></p>
      <p>Email: </p>
      <p><?php echo $_POST["email"]?></p>

    </hr>

  </div>

</body>
</html>







<!-- <?php
//
// $db_host   = '192.168.2.12';
// $db_name   = 'fvision';
// $db_user   = 'webuser';
// $db_passwd = 'insecure_db_pw';
//
// $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
//
// $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
//
// $q = $pdo->query("SELECT * FROM papers");
//
// while($row = $q->fetch()){
//   echo "<tr><td>".$row["code"]."</td><td>".$row["name"]."</td></tr>\n";
// }

?> -->