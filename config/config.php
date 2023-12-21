<?php
define ("ROOT_PATH", __DIR__ . "/../");

define("DATABSE_FILE", ROOT_PATH . 'database.json');

require_once ROOT_PATH . "/CONTROLLER.PHP/Api/BaseController.php";
//incluindo os dois arquivos
require_once ROOT_PATH . "/Model/UserModel.php";
?>