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

$db = mysqli_query($sqli, "SELECT * FROM tasks ORDER BY priority");

?>

<!doctype html>
<html lang="en">

<head>
  <title>Task Manager: Task List</title>
</head>

<body>

  <header>
    <h1>Task Manager</h1>
  </header>

  <section>

    <h1>Task List</h1>

    <table>
      <tr>
        <th>ID</th>
        <th>Priority</th>
        <th>Completed</th>
        <th>Description</th>
      </tr>

      <?php // loop through tasks 
      while ($row = mysqli_fetch_assoc($db)) {
        echo "<tr>
              <td>" . $row['id'] . "</td>
              <td>" . $row['priority'] . "</td>
              <td>" . $row['completed'] . "</td>
              <td>" . $row['description'] . "</td>
            </tr>";
      }
      ?>
    </table>

  </section>

</body>
<?php
mysqli_close($sqli);
?>

</html>