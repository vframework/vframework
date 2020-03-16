# V Framework
一个开源的PHP框架。 **轻巧得令人难以置信。功能强大。**

一个开放源代码的 **PHP 框架** ，可以帮助您更好地构建成功的项目。它也很容易安装和扩展。就像您对现代框架所期望的那样。

V Framework 提供了开发现代网站或应用程序所需的所有基本工具。您将拥有 <a href="http://vframework.cn/docs/routing/">路由</a>, <a href="http://vframework.cn/docs/data/">数据存储</a>, <a href="http://vframework.cn/docs/addons/">插件</a>, <a href="http://vframework.cn/docs/logs/">日志</a>, <a href="http://vframework.cn/docs/assets/">资产助手</a> 以及 <a href="http://vframework.cn/docs/">一些其他有用的工具</a>.


## 简单而强大

V Framework 是您可以找到的最简单的PHP框架之一。你自己看。这是一个输出“ Hello world ”的简单应用。
```php
<?php
require 'path/to/vendor/autoload.php';
use VFramework\App;

$app = new App();

$app->routes->add('/', function() {
    return new App\Response('Hello world');
});

$app->run();
```

## 下载并安装

* 通过Composer安装
```
composer require vframework/vframework
```
或以下命令创建构架应用程序
```
composer create-project vframework/app [my-app-name]
```

## 文档资料
可从 [http://vframework.cn/docs/](http://vframework.cn/docs/)获得文档。

## 如何进行测试
使用Composer安装依赖项后，您将拥有PHPUnit的本地版本。您可以像这样运行测试： `vendor/bin/phpunit tests/`.
