## 单例设计模式

### 1.1 什么是单例设计模式

单例设计模式是一种极为常用的软件设计模式，其定义可以了简单理解为一次交互中，单例类只实例化一次，提供多次调用；

许多时候一个完整的系统，很多类只需要初始化一次，不需要重复初始化；比如：数据库连接对象，配置信息对象等。。。

### 1.2 单例设计模式实现

1. 私有化构造函数；
2. 定义一个静态的变量，用于存储创建的对象；
3. 创建一个静态方法，返回当类对象；
4. 私有化clone方法；

### 1.3 单例设计模式的常用场景

1. 需要生产唯一的序列号或者统计
2. 需要频繁是实例化然后销毁的对象，但是对象属性基本不变的
3. 每次实例化都需要耗费巨大的资源，但是使用又十分频繁的对象
4. 配置信息的对象

### 1.4 单例设计模式的优缺点

** 优点 **

1. 内存中只有一个对象，可以节约大量内存（每次重新new对象，都会在堆内存中创建新的对象，大量创建对象会浪费内存资源，毕竟垃圾回收机制不可能回收很及时。。）
2. 频繁创建然后销毁的对像，可以节约资源
3. 全局变量

** 缺点 **
1. 不适用于变化频繁的对象；

### 1.5 实现代码

```
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
```

github地址：  https://github.com/whoisapig/DesignPattern/tree/master/SingletonPattern
