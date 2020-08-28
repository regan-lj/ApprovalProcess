<!DOCTYPE html>
<html>
<head>
<title>Request</title>
<script src="jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


  <div class="container">

    <h1>Thank You!</h1>
    <p>You will recieve a response within 5 working days.</p><br>

    <hr>

      <p>Here is the information you have submitted:</p>

      <ol>
        <li><em>First Name:</em> <?php echo $_POST["fname"]?></li>
        <li><em>Last Name:</em> <?php echo $_POST["lname"]?></li>
        <li><em>Email:</em> <?php echo $_POST["email"]?></li>
      </ol>
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
