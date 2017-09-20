<?php
namespace ofs_web_server\controllers;

abstract class Controller {
  /**
   * Blueprint for all controllers
   * @param  array $config contains all of the data from config.php
   * @return void         void
   */
  abstract public function mainControl($config);
}
?>
