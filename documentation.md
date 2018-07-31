FORMAT: 1A

# openfood_api_v1

# customers

## 登录 [POST /api/customer/login]
用户端APP登录

+ Parameters
    + customer_phone: (string, required) - 用户名(手机号)
        + Default: test
    + customer_password: (string, required) - 用户密码
        + Default: test

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 注册 [POST /api/customer/register]
用户端APP注册

+ Parameters
    + customer_phone: (string, required) - 用户名(手机号)
        + Default: 
    + phone_code: (string, required) - 验证码
        + Default: 
    + customer_password: (string, required) - 用户密码
        + Default: 

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 退出 [POST /api/customer/logout]
用户端APP退出 (需要token)

+ Parameters
    + token: (string, required) - token 令牌
        + Default: 

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 找回密码 [POST /api/customer/password/reset]
用户端APP找回密码

+ Parameters
    + customer_phone: (string, required) - 用户名(手机号)
        + Default: 
    + phone_code: (string, required) - 验证码
        + Default: 
    + phone_zone: (string, required) - 区号
        + Default: 
    + customer_password: (string, required) - 用户密码
        + Default: 

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 修改密码 [POST /api/customer/password/update]
用户端APP修改密码

+ Parameters
    + customer_password: (string, required) - 原始密码
        + Default: 
    + customer_new_password: (string, required) - 新密码
        + Default: 
    + customer_new_password_twice: (string, required) - 第二次确认密码
        + Default: 

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 修改绑定手机号 [POST /api/customer/phone/update]
用户端APP修改绑定手机号 (需要token)

+ Parameters
    + customer_new_phone: (string, required) - 新的手机号
        + Default: 
    + phone_code: (string, required) - 验证码
        + Default: 

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 修改用户头像 [POST /api/customer/head/update]
用户端APP修改用户头像 (需要token)

+ Parameters
    + hear_img: (base64位图片, required) - 用户头像
        + Default: 

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 修改用户名 [POST /api/customer/name/update]
用户端APP修改用户名 (需要token)

+ Parameters
    + customer_name: (string, required) - 用户名
        + Default: 

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 获取用户信息 [POST /api/customer/info]
用户端APP修改用户名 (需要token)

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 绑定 google [POST /api/customer/bind/google]
用户端APP绑定谷歌账号 (需要token)

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 绑定 Twitter [POST /api/customer/bind/twitter]
用户端APP绑定 Twitter(需要token)

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 绑定 FaceBook [POST /api/customer/bind/facebook]
用户端APP绑定 FaceBook(需要token)

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }