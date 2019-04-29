## Autoload 与命名空间

### 1.autoload 自动加载

#### 1.1 方法__autoload()

当你引用不存在的类时，方法__autoload就会被调用，并且你的类名会被作为参数传送过去（当你同时使用命名空间，包含命名空间部分会一起作为参数传送）。

举个栗子：

项目目录如下：
```
 |—root
    |—Model
      |—testObjA.php
      |—testObjB.php
    |—Controller
　     |-index.php

```
testObjA内容：
```
<?php
/**
 * 测试对象 A
 */
class testObjA{
  public function index(){
    echo "this is testObjA!";
  }
}

```
testObjB内容：

```
<?php
/**
 * 测试对象 B
 */
class testObjB
{
  public function index(){
    echo "this is testObjB!";
  }
}
```

index.php的内容

```
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
```
结果如下：
```
this is testObjA!
file is not exists !!
```


### 2.命名空间

#### 2.1 为什么用命名空间

随着项目的不断迭代，功能越来越多，方法对象越来越多。。。就会出线冲突；如果不区分，可读性也会越来越差；所以在php5.3后php引入了命名空间的概念；

如果你还是不能很好理解命名空间的意义的话，那通俗点说：

随着人口越来越多。。同名同姓的人越来越多，到处都有人叫“吴彦祖”。。。你想找吴彦祖，可能一搜索一大堆，这样严重阻碍你寻找到准确的目标。。。
所以“命名空间”出现了；广东省广州市区的“吴彦祖”。。这样就可以找到唯一的一个“吴彦祖”了

### 3.PSR-0基础框架

#### 3.1 PSR-0规范是什么

PSR是php业界定义的一个规范，就是大家都努力去遵守的规则；努力让框架和代码更优雅；

PSR-0规范主要有以下3点：

1. 命名空间必须与绝对路径一致  ----> 主要为了结合命名空间和自动加载，可以方便通过命名空间直接加载到唯一的文件
2. 类名首字母必须是大写字母
3. 除了入口文件外，其他的“.php” 必须只有一个类  ----> 一个类一个文件


#### 3.2 开发一个符合PSR-0规范的框架

项目目录如下：

```
 |—Autoload
    |—App                   --->  业务逻辑代码
      |— Home
        |- Controller
          |- Index.php  

    |— IMooc                --->  通用工具类
　     |-Loader.php         --->  自动加载类

    |- index.php            --->  入口文件

```

入口文件：

```
<?php
define('BASEDIR', __DIR__);  // 定义项目根目录
include BASEDIR.'/IMooc/Loader.php'; // 引入自动加载文件
spl_autoload_register("\\IMooc\\Loader::autoload"); // 当类初始化时候如果没有定义这个类，执行这个方法

App\Home\Controller\Index::index();

```
自动加载类：

```
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
```
业务逻辑类：

```
<?php

namespace App\Home\Controller;
/**
 *  控制层
 */
class Index
{
  static function index(){
    echo "hello world";
  }
}
```

具体的 git地址：
