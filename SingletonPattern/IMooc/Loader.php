<?php

namespace IMooc;

/**
 * 自动加载
 */
class Loader
{

  static function autoload($class){
    $file = BASEDIR.'/'.str_replace('\\', '/', $class).'.php';

    if (!class_exists($class, false)) {
      if (file_exists($file)) {
        include $file;
      }else {
        echo "file is not exists";
        die;
      }
    }
  }

}


 ?>
