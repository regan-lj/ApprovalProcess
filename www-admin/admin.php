<!DOCTYPE html>
<html>
<head>
<title>Request</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


  <div class="container">

    <h1>Pending Applications</h1>

    <form action="/process.php" method="post">
    <hr>
      <?php

        $db_host   = '192.168.2.12';
        $db_name   = 'fvision';
        $db_user   = 'webuser';
        $db_passwd = 'insecure_db_pw';

        $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

        $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

        $q = $pdo->query("SELECT * FROM requests");

        while($row = $q->fetch()){
          echo "<h3>".$row["fname"]."</h3><p>".$row["email"]."</p>\n";
        }

      ?>
    </hr>

    </form>

  </div>

</body>
</html>
