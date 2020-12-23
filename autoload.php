<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
  $path = ['../Controllers/', '../Models/', '../Views/', '../'];
  $extension = '.php';
  foreach ($path as $p) {
    $filename = $p . $className . $extension;

    if(file_exists($filename)){
      include_once $p . $className . $extension;
    }
  }
}
