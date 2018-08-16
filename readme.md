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

### 文档自动生成

生成文档命令

```bash
php artisan api:docs --name Example  --output-file documentation.md
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

### 目录规范

### 控制器目录规范

- Controllers
    - Customer(模块名)
        - V1(版本号)
            - CustomerController
            - AddressController
        - V2(版本号)


### 上传文件目录

- 创建软连接

```bash
php artisan storage:link
```

- storage
    - customer(模块)
        - user_head(用户头像)
            - @original(原图)
            - @34\*34(裁剪之后的)
                - 20180701(年月日)
                    - esdijmsenkdesgd.img