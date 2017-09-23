<?php
  namespace homann_web_server\views\elements;

  require_once('element.php');
  use homann_web_server\views\elements as E;

  class NavigationElement extends Element {
    function render($data) {
      ?>
      <nav class="navbar navbar-inverse" ng-controller="NavController">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand pull-left" href="/#!/" target="_self">Organic Food Store</a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span>Menu</span>
        <strong class="caret"></strong>
      </button>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <li ng-class="{active: isActive('/')}"><a href="/#!/" target="_self">Home</a></li>
        <li ng-class="{active: isActive('/shop')}"><a href="/#!/shop" target="_self">Shop</a></li>
        <li ng-class="{active: isActive('/shoppingCart')}"><a href="/#!/shoppingCart" target="_self">Shopping Cart</a></li>
        <li ng-class="{active: isActive('/checkOut')}"><a href="/#!/checkOut" target="_self">Check Out</a></li>


      </ul>
    </div>
  </div>
</nav>

      <?php
    }
  }
?>
