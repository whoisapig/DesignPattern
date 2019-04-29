<?php
define('BASEDIR', __DIR__);  // 定义项目根目录
include BASEDIR.'/IMooc/Loader.php'; // 引入自动加载文件
spl_autoload_register("\\IMooc\\Loader::autoload"); // 当类初始化时候如果没有定义这个类，执行这个方法

App\Home\Controller\Index::index();

 ?>
