# 剑三壁纸后台管理系统

基于laravel框架，使用 `dingo/api` + `jwt` 开发的剑三壁纸后台管理系统，实现app壁纸数据增删改查管理和一些app配置管理，并提供api接口给app调用。

![image](https://github.com/6ag/jiansan-laravel/blob/master/githubimg/example.jpg)

## 运行环境

- Nginx 1.8+
- PHP 5.6+
- Mysql 5.7+

## 开发环境部署

本项目本地开发环境为 [Laravel Homestead](https://github.com/laravel/homestead) ，如果你还没有安装过 **Homestead** ，请参考 [laravel-china-homestead](http://laravel-china.org/docs/5.1/homestead#installation-and-setup) 。

### 安装项目

**1.克隆代码到本地**

```shell
git clone https://github.com/6ag/jiansan-laravel.git
```

**2.新建homestead站点**

使用homestead新建站点，并解析域名到项目的 `public` 目录。首先进入虚拟机环境，新建站点：

*注意：* 这里的目录要根据自己安装的路径来写的，最终解析到 `public` 目录即可，别忘了修改本地 `hosts` 文件和重启 `nginx` 。

```shell
serve www.jiansan.com /home/vagrant/Code/jiansan-laralve-master/public
```

**3.安装项目依赖包**

```shell
composer install
```

**4.拷贝环境配置文件**

拷贝 `.env` 环境配置文件，并修改数据库配置信息。

```shell
cp .env.example .env
```

**5.创建数据表**

在创建数据表前，请先确保 `.env` 文件中的数据库配置正确，并数据库已经存在。

```shell
php artisan migrate
```

**6.填充基础数据**

添加分类数据和管理员信息，填充后默认管理员账号 `admin` ， 邮箱 `admin@6ag.cn` ，密码 `123456` 。

```shell
php artisan db:seed
```

**7.注册管理员账号**

访问 `http://www.jiansan.com/` ，使用管理员账号登录即可。

## 许可

[MIT](http://opensource.org/licenses/MIT) © [六阿哥](https://github.com/6ag)


