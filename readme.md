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
cp .emv.example .env
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
