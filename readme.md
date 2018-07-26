## 项目搭建过程

### 环境要求

- MySQL 5.7
- PHP ＞ 7.0
- composer 

### 克隆代码

``` bash
git clone git@git.coding.net:jiyisanluoyidi/openfood-API.git
```

### 安装依赖

``` bash
cd openfood && composer install
```

### 配置

- 复制配置文件

``` bash
cp .env.example .env
```

- 生成 laravel key

``` bash
php artisan key:generate
```

- 生成 jwt key

``` bash
php artisan jwt:secret
```

- 配置数据库(.env 文件)

``` bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

- api 配置

``` bash
# 默认配置已添加, 暂不需要修改
```

- 导出语言包

``` bash
php artisan lang:publish zh-CN
```

## 规范

### 分支管理规范

- product 正式环境分支
- test  测试环境分之
- develop 开发环境分支

  从 product 分支检出新的分支, 如: release-demo; 开发完成之后, 合并 release-demo 到 develop 分支; 自测没有问题之后, 合并release-demo 分支到 test 分支; 测试无误之后, 合并 release-demo 到 product 分支, 完成上线;


  单分支开发模块不得超过 1 个模块； 单次提交不能小于一个资源路由，不能超过两个资源路由； 特殊情况除外， 如： 某个 bug 修复。



### 提交信息

禁止使用 -m 参数直接添加提交备注。每次提交，Commit message 都包括三个部分：Header，Body Footer;
如:

```text
type(scope): subject
空一行
body
空一行
footer
```

#### header

Header部分只有一行，包括三个字段：type（必需）、scope（可选）和subject（必需）。

**type** 用于说明 commit 的类别，只允许使用下面7个标识

- feat：新功能（feature）
- fix：修补bug
- docs：文档（documentation）
- style： 格式（不影响代码运行的变动）
- refactor：重构（即不是新增功能，也不是修改bug的代码变动）
- test：增加测试
- chore：构建过程或辅助工具的变动

**scope** 用于说明 commit 影响的范围，比如数据层、控制层、视图层等等，视项目不同而不同

**subject** 是 commit 目的的简短描述，不超过50个字符。 以动词开头，使用第一人称现在时，比如: 修改（添加。。。）
结尾不加句号

#### body

**Body** 部分是对本次 commit 的详细描述，可以分成多行

#### footer

暂时省略






## 多语言包配置过程

### 依赖

``` bash
composer require "overtrue/laravel-lang:~3.0"
```

[overtrue/laravel-lang github 地址](https://github.com/overtrue/laravel-lang/)


### 多语言目录

- 语言存放目录 `resource/lang`
- 通常一种语言一个目录
- 可以将同一种语言的翻译放在一个 PHP 文件, 或者分类放在多个PHP文件均可; 具体可参考 `resource/en` 目录结构
- 默认只有 en 语言的, 自定义的语言需要手动建立语言包目录、语言包文件

### 配置

- 修改 `config/app.php`
将
``` 
Illuminate\Translation\TranslationServiceProvider::class,
```
替换为
```
Overtrue\LaravelLang\TranslationServiceProvider::class,
```

- 为了灵活配置, 修改 `config/app.php`
将
```
'locale' => 'en',
```
替换为
```
'locale' => env('APP_LOCALE', 'en'),
```
同时添加配置到 `.env.example` 文件
```
# 默认语言
APP_LOCALE=zh-CN
```

### 使用语言包

使用 `trans()` 辅助函数

- 参数1: 语言包数组下表索引
- 参数2: 空数组
- 参数3: 指定语言包名字

``` php
trans('test', [], 'zh-CN')
```

### 导出语言包

``` bash
php artisan lang:publish zh-CN
```
可以同时导出多个语言包
```
php artisan lang:publish zh-CN,zh-HK,th,tk
```



