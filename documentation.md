FORMAT: 1A

# 欧本富API文档

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

# customers

## 附近商家 [POST /api/customer/store/near]
用户端APP附近商家列表

+ Parameters
    + store_longitude: (string, required) - 用户当前位置的经度
        + Default: test
    + store_latitude: (string, required) - 用户当前位置的经度
        + Default: test

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

# Login

## 骑手登录 [POST /api/rider/login]


+ Request (application/json)
    + Body

            {
                "account": "15611111111",
                "password": "123456"
            }

## 骑手退出登录 [POST /api/rider/logout]


## 骑手注册 [POST /api/rider/reg]


+ Request (application/json)
    + Body

            {
                "name": "aa",
                "mobile": "15611111111",
                "password": "密码",
                "verify_code": "验证码",
                "email": "aa@qq.com",
                "desc": "自我介绍",
                "avatar": "my.jpg"
            }

## 骑手登录密码重置（忘记密码|更换密码） [POST /api/rider/password/reset]


+ Request (application/json)
    + Body

            {
                "account": "15611111111",
                "verify_code": "1234",
                "new_password": "123456",
                "is_verify_code": "是否为验证码方式(默认为false)"
            }

# User

## 骑手基本信息 [GET /api/rider/basic_info]


+ Request (application/json)
    + Body

            []

## 更换绑定手机 [POST /api/rider/phone/reset]


+ Request (application/json)
    + Body

            {
                "old_mobile": "旧手机号",
                "new_mobile": "新手机号",
                "verify_code": "验证码"
            }

## 骑手本月战绩 [GET /api/rider/month_score]


+ Request (application/json)
    + Body

            []

## 骑手实名认证 [POST /api/rider/certificate]


+ Request (application/json)
    + Body

            {
                "name": "ling",
                "mobile": "15611111111",
                "email": "aa@qq.com",
                "address": "东圃米研",
                "safe_code": "222xx",
                "driver_permit": "1.jpg",
                "address_permit": "2.jpg",
                "car_insurance": "3.jpg",
                "bank_code": "银行代码",
                "band_account": "银行账号",
                "cardholder": "持卡人姓名",
                "card_type": "银行卡类型"
            }

## 骑手实名信息 [GET /api/rider/certificate_info]


## 骑手余额信息 [GET /api/rider/balance]


## 骑手余额明细 [GET /api/rider/balance_details]


## 骑手账户信息
type = 1 支票 type = 2 存储 [GET /api/rider/account_info]


## 骑手账户设置
type = 1 支票 type = 2 存储 [POST /api/rider/account/set]


## 骑手评价信息
type = 1 满意 type =2 不满意 [GET /api/rider/evaluate]


## 骑手意见列表 [GET /api/rider/suggestion]


## 骑手意见详情 [GET /api/rider/suggestion/$id]


## 骑手意见提交 [POST /api/rider/suggestion/post]


+ Request (application/json)
    + Body

            []

# App

## app基本信息 [GET /api/rider/app/info]


+ Request (application/json)
    + Body

            []

## app更新 [GET /api/rider/app/update]


+ Request (application/json)
    + Body

            []

## app历史版本列表 [GET /api/rider/app/versions]


+ Request (application/json)
    + Body

            []

## app版本详情 [GET /api/rider/app/version/$id]


+ Request (application/json)
    + Body

            []

## 获取隐私政策信息 [GET /api/rider/app/privacy_policy]


## 获取骑手协议 [GET /api/rider/app/rider_protocol]


+ Request (application/json)
    + Body

            []

## 获取热线 [GET /api/rider/app/hotline]


+ Request (application/json)
    + Body

            []

# Order

## 订单列表 [GET /api/rider/order/index]


+ Request (application/json)
    + Body

            []

## 骑手已接订单；列表
type = 1 待取货 type =2 待送达 [GET /api/rider/order/took]


## 获取订单详情
type = 1 待取货 type = 2 待送达 [GET /api/rider/order/details]


+ Request (application/json)
    + Body

            []

## 骑手到店上报 [POST /api/rider/order/reach_store]


+ Request (application/json)
    + Body

            []

## 骑手确认收货 [POST /api/rider/order/confirm]


+ Request (application/json)
    + Body

            []

## 获取订单菜品 [GET /api/rider/order/foods]


+ Request (application/json)
    + Body

            []

## 获取短信模板 [GET /api/rider/order/sms_tmpl]


+ Request (application/json)
    + Body

            []