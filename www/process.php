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
      <h3>Here is the information you have submitted:</h3><br>
      <p>First Name: </p>
      <p><?php echo $_POST["fname"]?></p>
      <p>Last Name: </p>
      <p><?php echo $_POST["lname"]?></p>
      <p>Email: </p>
      <p><?php echo $_POST["email"]?></p>
    </hr>

    <?php

      $db_host   = '192.168.2.12';
      $db_name   = 'fvision';
      $db_user   = 'webuser';
      $db_passwd = 'insecure_db_pw';
      $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
      $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

      $fname = $_POST["fname"]
      $lname = $_POST["lname"]
      $email = $_POST["email"]

      $sql = "INSERT INTO requests (fname, lname, email) VALUES (?,?,?)";
      $stmt= $pdo->prepare($sql);
      $stmt->execute([$fname, $lname, $email]);

  </div>

</body>
</html>
