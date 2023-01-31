<?php

use App\Config\Autoloader;
use App\Config\Router;

require_once("./config/Autoloader.php");

Autoloader::register();

// $path_info = $_SERVER["REQUEST_URI"] ?? "/";
// echo "<pre>";
// var_dump($path_info);
// echo "</pre>";
// // Transformation de la chaine de caractère en un tableau par rapport aux /
// $path_info = explode('/', $path_info);
// echo "<pre>";
// var_dump($path_info);
// echo "</pre>";
// $path_info = array_splice($path_info,2);
// echo "<pre>";
// var_dump($path_info);
// echo "</pre>";
(new router)->run();
?>
