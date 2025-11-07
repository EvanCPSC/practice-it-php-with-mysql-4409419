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
        $ids = mysqli_fetch_array(mysqli_query($sqli, "SELECT id FROM tasks"));
        foreach ($ids as $id) {
          echo "$id <br>";
        }
        ?>
      </dd>
    </dl>
    <dl>
      <dt>Priority</dt>
      <dd>
        <?php
        $priors = mysqli_fetch_array(mysqli_query($sqli, "SELECT priority FROM tasks"));
        foreach ($priors as $prior) {
          echo "$prior <br>";
        }
        ?>
      </dd>
    </dl>
    <dl>
      <dt>Completed</dt>
      <dd>
        <?php
        $comps = mysqli_fetch_array(mysqli_query($sqli, "SELECT completed FROM tasks"));
        foreach ($comps as $comp) {
          echo "$comp <br>";
        }
        ?>
      </dd>
    </dl>
    <dl>
      <dt>Description</dt>
      <dd>
        <?php
        $descs = mysqli_fetch_array(mysqli_query($sqli, "SELECT description FROM tasks"));
        foreach ($descs as $desc) {
          echo "$desc <br>";
        }
        ?>
      </dd>
    </dl>

  </section>

</body>
<?php
mysqli_close($sqli);
?>

</html>