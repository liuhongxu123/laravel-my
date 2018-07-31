FORMAT: 1A

# openfood_api_v1

# customers

## 登录 [POST /api/customer/login]
用户端APP登录

+ Parameters
    + customer_user: (string, required) - 用户名(手机号)
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