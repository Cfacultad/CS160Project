<?php
  namespace ofs_web_server;

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require_once "./src/controllers/controller.php";
  require_once "./src/controllers/homeController.php";

  use ofs_web_server\controllers as c;

  //session_start();  // start/continue the session

  $config = require("./src/configs/config.php");

  //phpinfo();

  if ($_SERVER['REQUEST_URI'] == '/') {
    $controller = new c\HomeController();
    $controller->mainControl($config);
  }

  elseif ($_SERVER['REQUEST_URI'] == '/database') {
    foreach ($_POST as $key => $value)
    {
      echo $key . ': ' . $value . PHP_EOL;
      echo "This is being sent from the server" . PHP_EOL;
    }
  }

  else {
    header("Location: /");
  }

?>
