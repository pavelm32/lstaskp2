<?php
define('APP_PATH', '../app/');
define('PUBLIC_PATH', getcwd());

use App\Application;

require("../vendor/autoload.php");

Application::i()->run();