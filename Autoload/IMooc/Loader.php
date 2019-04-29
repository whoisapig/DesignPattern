<?php

namespace IMooc;

/**
 *  自动加载所有的类
 */
class Loader
{
  // 根据命名空间初始化类
  static function autoload($class){
    $file = BASEDIR."/".str_replace("\\", '/', $class).".php";
    include $file ;
  }

}

 ?>
