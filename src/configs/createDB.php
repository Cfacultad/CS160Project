<?php
error_reporting(-1);
ini_set("display_errors", "on");
function initializeDB()
{
    $config = require("config.php"); // this is where the returned array from config.php is stored
    echo $config['host'];

  // Create connection
  $conn = new mysqli($config['host'], $config['username'], $config['password']);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  // Create database
  $sql = "CREATE DATABASE IF NOT EXISTS " . $config['database'];

  if ($conn->query($sql) === TRUE) {
      echo "Database created successfully";
      mysqli_select_db($conn, $config['database']);
      create_table($conn, $config);
      initialize_values($conn, $config);
      //insert_data($conn, TABLENAME);
  } else {
      echo "Error creating database: " . $conn->error;
  }

  $conn->close();
}

function create_table($conn, $config) {
  // mysqli_select_db($conn, $dbname);
  $sql = "CREATE TABLE IF NOT EXISTS " . $config['table'] . " (" .
    $config['name'] . " VARCHAR(50) NOT NULL PRIMARY KEY, " .
    $config['value'] . " INT NOT NULL
  )";
  // $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->query($sql) === TRUE) {
    echo "Table " . $config['table'] . " created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
  //$conn->close();
}

function initialize_values($conn, $config) {
  foreach ($config['pages'] as $page) {
    $sql = "INSERT INTO " . $config['table'] . " (" . $config['name'] . ", " . $config['value'] . ")
    VALUES ('" . $page . "', '" . $config['initial_value'] . "')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

}

initializeDB();
