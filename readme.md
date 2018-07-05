## 项目搭建过程

### 环境要求

- MySQL 5.7
- PHP ＞ 7.0
- composer 

### 克隆代码

``` bash
git clone git@git.coding.net:xuchunyun/openfood.git
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

## 多语言包配置

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



