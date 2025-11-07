<?php

//apachectl start

$hostname = "127.0.0.1";
$username = "mariadb";
$password = "mariadb";
$database = "mariadb";
$port = 3306;

$sqli = mysqli_connect($hostname, $username, $password, $database, $port);

if (!$sqli) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>


<!doctype html>
<html lang="en">

<head>
  <title>Task Manager: Show Task</title>
</head>

<body>

  <header>
    <h1>Task Manager</h1>
  </header>

  <section>

    <h1>Show Task</h1>

    <dl>
      <dt>ID</dt>
      <dd>
        <?php
        $id = mysqli_fetch_array(mysqli_query($sqli, "SELECT id FROM tasks LIMIT 1"))[0];
        echo "$id <br>";
        ?>
      </dd>
    </dl>
    <dl>
      <dt>Priority</dt>
      <dd>
        <?php
        $prior = mysqli_fetch_array(mysqli_query($sqli, "SELECT priority FROM tasks LIMIT 1"))[0];
        echo "$prior <br>";
        ?>
      </dd>
    </dl>
    <dl>
      <dt>Completed</dt>
      <dd>
        <?php
        $comp = mysqli_fetch_array(mysqli_query($sqli, "SELECT completed FROM tasks LIMIT 1"))[0];
        echo "$comp <br>";
        ?>
      </dd>
    </dl>
    <dl>
      <dt>Description</dt>
      <dd>
        <?php
        $desc = mysqli_fetch_array(mysqli_query($sqli, "SELECT description FROM tasks LIMIT 1"))[0];
        echo "$desc <br>";
        ?>
      </dd>
    </dl>

  </section>

</body>
<?php
mysqli_close($sqli);
?>

</html>