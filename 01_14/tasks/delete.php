<?php

// Helper function
function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

// typecast the value as an integer to prevent SQL injection
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $hostname = "127.0.0.1";
  $username = "mariadb";
  $password = "mariadb";
  $database = "mariadb";
  $port = 3306;

  $sqli = mysqli_connect($hostname, $username, $password, $database, $port);

  mysqli_query($sqli, "DELETE FROM tasks WHERE id=".$id);

}

mysqli_close($sqli);

redirect_to('index.php');

?>
