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
    //wow super important, controller is imported under close function here in view.php div is closed off there too
    ?>
    <!-- <div ng-controller='MainController' ng-style="myObj" id="mainCSS"> -->
    <?php
    $navigation = new E\NavigationElement();
    $navigation->render($this->data);
    echo "<div class='col-xs-1'></div>";
    ?>
    <!-- <div class='col-xs-10 center-column' ng-style="{height: iframeHeight-100 + 'px', overflow: 'scroll'}"> -->
    <div class='col-xs-10' ng-style="bootstrapCenterColumnStyle">
    <?php
  }
  abstract public function render();

  public function close(){
    ?>
      <!-- Controllers -->
      <script src="/src/js/controllers/MainController.js"></script>
      <script src="/src/js/controllers/HomeController.js"></script>
      <script src="/src/js/controllers/NavController.js"></script>
      <script src="/src/js/controllers/ShopController.js"></script>
      <script src="/src/js/controllers/ShoppingCartController.js"></script>
      <script src="/src/js/controllers/CheckOutController.js"></script>
      <!-- The next two lines closes out the divs from the constructor -->
      </div>
      <div class='col-xs-1'></div>
    </body>
    </html>
    <?php
  }
}
?>
