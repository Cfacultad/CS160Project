<?php
namespace ofs_web_server\controllers;

require_once("./src/models/homeModel.php");
require_once("./src/views/homeView.php");
require_once("controller.php");
use ofs_web_server\models as M;
use ofs_web_server\views as V;

class HomeController extends Controller {
  /**
   * Controlls what is displayed for the home page
   * @param  Array $config contains all of the data from config.php
   * @return void         void
   */
  function mainControl($config) {
    $homeModel = new M\HomeModel();
    $data['views'] = $homeModel->getData($config, "home");
    $data['config'] = $config;
    $data['title'] = "Organic Food Store"; // This is nothing important, in fact probably not used, but once we are coding on the client side, we can use this as a test to see if the array was passed correctly into AngularJS
    $data['message'] = "Welcome to Oraganic Food Store"; // Also a testing index
    $homeView = new V\HomeView($data);
    $homeView->render($data);
  }
}
?>
