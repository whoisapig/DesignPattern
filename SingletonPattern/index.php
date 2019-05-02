<?php

define('BASEDIR', __DIR__);
include BASEDIR.'/IMooc/Loader.php';
spl_autoload_register('\\IMooc\Loader::autoload');

$db = IMooc\Database::getInstance();
$db2 = IMooc\Database::getInstance();

// $db3 = clone $db ;

var_dump($db);
// var_dump($db === $db3);

exit;
 ?>
