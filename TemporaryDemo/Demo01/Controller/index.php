<?php

function __autoload($name){
  $file = realpath(__DIR__).'/../Model/'.$name.'.php';
  if (!class_exists($name, false)) {
    // code...
    if (file_exists($file)) {
      // code...
      include $file;
    }else {
      echo "file is not exists !!";die;
    }
  }
}

// 创建测试对象A
$testObjA = new testObjA();
$testObjA->index();

echo "<br/>";

// 创建测试对象C
$testObjC = new testObjC();
$testObjC->index();
 ?>
