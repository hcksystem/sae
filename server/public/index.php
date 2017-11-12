<?php

$classesDir = array (
    ROOT_DIR.'classes/',
    ROOT_DIR.'firephp/',
    ROOT_DIR.'includes/'
);
function __autoload($class_name) {
    global $classesDir;
    foreach ($classesDir as $directory) {
        if (file_exists($directory . $class_name . '.php')) {
            require_once ($directory . $class_name . '.php');
            return;
        }
    }
}