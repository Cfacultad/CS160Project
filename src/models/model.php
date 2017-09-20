<?php
namespace ofs_web_server\models;

abstract class Model {
  /**
   * Blueprint for all controllers
   * @param  array $config contains all of the data from config.php
   * @return void         void
   */

  abstract public function getData($config, $page);
}
?>
