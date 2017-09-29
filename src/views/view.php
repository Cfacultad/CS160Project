<?php

namespace ofs_web_server\views;
require_once('./src/views/elements/headerElement.php');
require_once('./src/views/elements/navigationElement.php');
use homann_web_server\views\elements as E;

abstract class View
{
  /**
   * Populates the view
   * @param  Array $data contains the data for populating the view
   * @return void       void
   */
  public $data;
  function __construct($data){
    $this->data = $data;
    ?>
    <!DOCTYPE html>
    <html>

      <?php
        $header = new E\HeaderElement();
        $header->render($this->data);
      ?>

      <body ng-app='myApp' ng-controller='MainController' ng-style="backgroundStyle" ng-cloak>

      <?php
        include('./src/js/app.php');
        $navigation = new E\NavigationElement();
        $navigation->render($this->data);
      ?>

      <div id='mainCenterColumn' ng-style="bootstrapCenterColumnStyle">

      <?php
  }
  abstract public function render();

  public function close(){
    ?>
        <!-- AngularJS Controllers -->
        <script src="/src/js/controllers/MainController.js"></script>
        <script src="/src/js/controllers/HomeController.js"></script>
        <script src="/src/js/controllers/NavController.js"></script>
        <script src="/src/js/controllers/ShopController.js"></script>
        <script src="/src/js/controllers/ShoppingCartController.js"></script>
        <script src="/src/js/controllers/CheckOutController.js"></script>
        <script src="/src/js/controllers/TrackPackageController.js"></script>
      </body>
    </html>
    <?php
  }
}
?>
