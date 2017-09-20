<?php
namespace ofs_web_server\views;
require_once('view.php');
require_once('./src/views/elements/headerElement.php');
require_once('./src/views/elements/navigationElement.php');
use homann_web_server\views as V;
use homann_web_server\views\elements as E;
//use studs\hw5\views\helpers as H;

class HomeView extends View {

/**
 * builds the view
 * @param  array $data contains any data used to populate the view
 * @return void       void
 */
    public function render() {
    ?>
    <div ng-controller="HomeController" ng-style="centerColumnStyle">
      <!-- <h1>Welcome to Homann Associates Inc. <small class="colorBlack">(A California Corporation)</small></h1> -->
      <h1 class="colorBlack">Welcome to Organic Food Store</h1>
      <h4 class="colorBlack tab">A California Corporation</h4>
      <p class="colorBlack">{{views}} views so far</p>
    </div>
    </p>
    <?php
    $this->close();
   }
}
?>
