<?php
  namespace homann_web_server\views\elements;

  require_once('element.php');
  use homann_web_server\views\elements as E;

  class HeaderElement extends Element {
    function render($data) {
      ?>
      <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title><?php echo $data['title']; ?></title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular-route.js"></script>
          <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script> -->
          <link rel="stylesheet" type="text/css" href="src/css/mystyle.css">
          <link rel="stylesheet" type="text/css" href="src/css/bootstrap-custom.css">
          <base href="/">
      </head>
      <?php
    }
  }
?>
