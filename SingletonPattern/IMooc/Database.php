<?php

namespace IMooc;

class Database{

  static public $db;

  private function __construct(){

  }

  private function __clone(){

  }

  static function getInstance(){
      if(self::$db) {
        return self::$db;
      }else {
        self::$db = new self();
        return self::$db;
      }
  }

}


 ?>
