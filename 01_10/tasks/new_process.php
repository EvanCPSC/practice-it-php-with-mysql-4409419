<?php

// Helper function
function redirect_to($location)
{
  header("Location: " . $location);
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $task = [];
  $task['description'] = $_POST['description'] ?? '';
  $task['priority'] = $_POST['priority'] ?? '10';
  $task['completed'] = $_POST['completed'] ?? '0';

  $hostname = "127.0.0.1";
  $username = "mariadb";
  $password = "mariadb";
  $database = "mariadb";
  $port = 3306;

  $sqli = mysqli_connect($hostname, $username, $password, $database, $port);
  mysqli_query($sqli, "INSERT INTO tasks (description, priority, completed) VALUES ('"
    . $task['description'] . "', '"
    . $task['priority'] . "', '"
    . $task['completed'] . "');");

  $new_id = mysqli_insert_id($sqli);

  redirect_to('show.php?id=' . $new_id);
}
