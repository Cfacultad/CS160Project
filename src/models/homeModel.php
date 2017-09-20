<?php
namespace ofs_web_server\models;
use Mysqli;
require_once("model.php");

class HomeModel extends Model {
  /**
   * Model for the Home Page
   * @param  array $config contains all of the data from config.php
   * @return void         void
   */
   private $views;

  function getData($config, $page) {
    $servername = $config['host'];
    $username = $config['username'];
    $password = $config['password'];
    $dbName = $config['database'];
    $table = $config['table'];
    $rowName = $config['name'];
    $rowValue = $config['value'];

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "UPDATE " . $table . " SET " . $rowValue . " = " . $rowValue . " + 1 WHERE " . $rowName . " = '" . $page . "'";

    if ($conn->query($sql) === TRUE) {
      // echo "Views was incremented successfully";
    }
    else {
       echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "SELECT " . $rowValue . " FROM " . $table . " WHERE " . $rowName . " = '" . $page . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
          //echo "<br> views: " . $row['views'] . "<br>";
          $this->views = $row['views'];
       }
    } else {
       echo "Code was wrong";
    }

    $conn->close();
    return $this->views;
  }
}
?>
