FORMAT: 1A

# 欧本富API接口

# 用户APP-用户

## 登录 [POST /api/customer/login]
用户端APP登录

+ Parameters
    + customer_phone: (string, required) - 用户名(手机号)
        + Default: 13800138001
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

## 查新新人红包 [POST /api/customer/bind/twitter]
用户端APP绑定 Twitter(需要token)

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

# 用户APP-附近商家

## 附近商家 [POST /api/customer/near/stores]
用户端APP附近商家列表

+ Parameters
    + store_longitude: (string, required) - 用户当前位置的经度
        + Default: 
    + store_latitude: (string, required) - 用户当前位置的经度
        + Default: 

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 附近商家主页信息 [POST /api/customer/near/store/info]
用户端APP附近商家主页信息

+ Parameters
    + store_id: (string, required) - 商家ID
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 附近商家评论列表 [GET /api/customer/near/store/comments]
用户端APP附近商家主页评论列表

+ Parameters
    + store_id: (string, required) - 商家ID
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 附近商家添加评论 [POST /api/customer/store/info/near]
用户端APP附近商家添加评论

+ Parameters
    + store_id: (string, required) - 商家ID
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 附近商家推荐菜品 [POST /api/customer/near/store/recommend/goods]
用户端APP附近商家推荐菜品

+ Parameters
    + store_id: (string, required) - 商家ID
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

# 用户APP-版本

## 最新版本 [GET /api/customer/version/latest]


## 版本列表 [GET /api/customer/versions]


## 版本详情 [GET /api/customer/version/info]


+ Parameters
    + version_id: (string, required) - 版本ID
        + Default: 

# 用户APP-协议

## 协议列表 [GET /api/customer/protocols]


## 协议详情 [GET /api/customer/protocolInfo]


+ Parameters
    + protocols_id: (string, required) - 协议ID
        + Default: 

# 用户APP-堂食

## 商家信息 [GET /api/customer/dine/store/info]


+ Parameters
    + store_id: (string, required) - 商家ID
        + Default: 

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 分类列表 [GET /api/customer/dine/store/menus]


+ Parameters
    + store_id: (string, required) - 商家ID
        + Default: 

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 菜品列表 [GET /api/customer/dine/store/menus]


+ Parameters
    + store_id: (string, required) - 商家ID
        + Default: 
    + type_id: (string, required) - 分类ID
        + Default: 

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 菜品详情 [GET /api/customer/dine/store/goods/info]


+ Parameters
    + store_id: (string, required) - 商家ID
        + Default: 
    + type_id: (string, required) - 菜品ID
        + Default: 

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 菜品评论 [GET /api/customer/dine/store/goods/info]


+ Parameters
    + store_id: (string, required) - 商家ID
        + Default: 
    + type_id: (string, required) - 菜品ID
        + Default: 
    + page: (string, required) - 页码
        + Default: 
    + page_nums: (string, required) - 每页显示的总条数
        + Default: 

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

# 用户APP-收藏

## 收藏列表(token) [GET /customer/collects]


## 删除收藏 [POST /api/customer/collect/delete]


+ Parameters
    + collect_id: (string, required) - 收藏ID
        + Default: 

# 用户APP-地址

## 用户收货地址列表(token) [GET /api/customer/addreses]
1/男; 2/女

## 添加收货地址 [POST /api/customer/addreses/create]


+ Parameters
    + customer_name: (string, required) - 收货人姓名
        + Default: 
    + customer_sex: (int, required) - 性别
        + Default: 
    + customer_phone: (array, required) - 电话
        + Default: 
    + address_name: (string, required) - 地址名
        + Default: 
    + address_desc: (string, required) - 门牌号
        + Default: 

## 收货地址详情 [GET /api/customer/addreses/detail]


+ Parameters
    + address_id: (string, required) - 地址ID
        + Default: 

## 修改收货地址 [POST /api/customer/addreses/update]


+ Parameters
    + customer_name: (string, required) - 收货人姓名
        + Default: 
    + customer_sex: (int, required) - 性别
        + Default: 
    + customer_phone: (array, required) - 电话
        + Default: 
    + address_name: (string, required) - 地址名
        + Default: 
    + address_desc: (string, required) - 门牌号
        + Default: 

## 删除收货地址 [POST /api/customer/address/destroy]


+ Parameters
    + address_id: (string, required) - 地址ID
        + Default: 

# 用户APP-红包

## 红包列表 [GET /api/customer/redpackages]
1/待使用; 2/已过期; 3/已使用;

+ Parameters
    + type: (string, required) - 1/表示正常红包; 0/过期红包
        + Default: 

# 用户APP-电子钱包

## 卡列表 [GET /api/customer/wallet/cards]
1/信用卡; 2/借记卡

## 添加借记卡 [POST /api/customer/wallet/debit/card]


+ Parameters
    + card_type: (int, required) - 卡类型
        + Default: 
    + card_host_name: (string, required) - 持卡人姓名
        + Default: 
    + card_num: (array, required) - 卡号
        + Default: 
    + card_host_phone: (string, required) - 预留手机号
        + Default: 
    + phone_code: (string, required) - 验证码
        + Default: 

## 添加信用卡 [POST /api/customer/wallet/credit/card]


+ Parameters
    + card_type: (int, required) - 卡类型
        + Default: 
    + card_host_name: (string, required) - 持卡人姓名
        + Default: 
    + card_num: (array, required) - 卡号
        + Default: 
    + card_validity_time: (string, required) - 卡有效期
        + Default: 2018-12-25 12:32:12

## 常见问题列表 [GET /api/customer/wallet/questions]


## 问题详情 [GET /api/customer/wallet/question/detail]


+ Parameters
    + question_id: (string, required) - 问题ID
        + Default: 

# 用户APP-消息通知

## 订单消息(token) [GET /api/customer/news/orders]


## 系统消息(token) [GET /api/customer/news/system]


## 系统详情 [POST /api/customer/news/system/detail]


+ Parameters
    + news_id: (int, required) - 消息ID
        + Default: 

# 用户APP-建议

## 我的反馈列表(token) [GET /api/customer/suggests]


## 添加反馈 [POST /api/customer/suggest/create]


+ Parameters
    + suggest_type: (string, required) - 建议类型
        + Default: 
    + suggest_desc: (string, required) - 问题描述
        + Default: 
    + suggest_img: (array, required) - 截图
        + Default: 

# 骑手登录授权API

## 骑手登录 [POST /api/rider/login]


+ Request (application/json)
    + Body

            {
                "account": "15611111111",
                "password": "123456"
            }

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 骑手退出登录 [POST /api/rider/logout]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 骑手注册 [POST /api/rider/reg]


+ Request (application/json)
    + Body

            {
                "name": "aa",
                "mobile": "15611111111",
                "password": "密码",
                "verify_code": "验证码"
            }

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 骑手忘记密码 [POST /api/rider/password/forget]


+ Request (application/json)
    + Body

            {
                "account": "15611111111",
                "verify_code": "1234",
                "new_password": "123456"
            }

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

# 骑手端用户API

## 骑手基本信息 [GET /api/rider/basic_info]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "real_name": "真实姓名",
                    "score": "综合评分",
                    "score_today": "今日战绩",
                    "score_month": "本月战绩",
                    "work_status": "工作状态 work_status=1 接单状态 work_status=0 休息状态",
                    "avatar": "头像地址"
                }
            }

## 骑手修改密码 [POST /api/rider/password/reset]


+ Request (application/json)
    + Body

            {
                "old_password": "旧密码",
                "new_password": "新密码",
                "new_password_confirmation": "重复新密码"
            }

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 更换绑定手机 [POST /api/rider/phone/reset]


+ Request (application/json)
    + Body

            {
                "old_mobile": "旧手机号",
                "new_mobile": "新手机号",
                "verify_code": "验证码"
            }

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 骑手设置工作状态 [POST /api/rider/set_work_status]


+ Parameters
    + work_status: (string, optional) - 工作状态 work_status=1 开工，work_status=0 休息状态

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 骑手本月战绩 [GET /api/rider/month_score]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": [
                    {
                        "date": "日期",
                        "finish": "完成单量",
                        "cancel": "取消单量",
                        "income_sum": "总收入"
                    }
                ]
            }

## 骑手入驻 [POST /api/rider/join]


+ Request (multipart/form-data)
    + Body

            name=姓名&mobile=手机号&email=邮箱&desc=简介&read_and_confirm=接受协议&avatar=头像

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

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
                "bank_account": "银行账号",
                "cardholder": "持卡人姓名",
                "card_type": "银行卡类型"
            }

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 骑手实名信息 [GET /api/rider/certificate_info]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "real_name": "真实姓名",
                    "mobile": "电话",
                    "email": "邮件",
                    "address": "居住地址",
                    "safe_code": "社会安全号码",
                    "driver_permit": "驾驶证",
                    "address_permit": "地址证明",
                    "car_insurance": "汽车保险"
                }
            }

## 骑手基本余额信息 [GET /api/rider/balance]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "balance": "余额",
                    "balance_freeze": "冻结余额",
                    "details": [
                        {
                            "date": "日期",
                            "money": "收入金额",
                            "balance": "余额"
                        }
                    ]
                }
            }

## 骑手余额明细（将修改为订单明细） [GET /api/rider/balance/details]


+ Parameters
    + month: (string, optional) - 月份(传参方式形如：2018-03 的月份)

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": [
                    {
                        "date": "日期",
                        "order_no": "订单号",
                        "receiver": "收货人",
                        "receiver_mobile": "联系电话",
                        "remark": "备注",
                        "sum": "合计",
                        "origin": "取货",
                        "dest": "送货",
                        "type": ""
                    }
                ]
            }

## 获取银行流水 [GET /api/rider/bank_statement]


+ Parameters
    + month: (string, optional) - 月份(传参方式形如：2018-03 的月份)

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": [
                    {
                        "month": "月份",
                        "item": [
                            {
                                "date": "日期",
                                "bank_no": "银行账单",
                                "bank_code": "银行代号",
                                "money": "打款金额"
                            }
                        ]
                    }
                ]
            }

## 骑手银行账户信息 [GET /api/rider/account]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "bank_code": "银行代码",
                    "bank_account": "银行账户",
                    "cardholder": "持卡人姓名",
                    "card_type": "存储类型"
                }
            }

## 骑手收款账户设置 [POST /api/rider/account/set]


+ Parameters
    + bank_code: (string, required) - 银行代码
    + account: (string, required) - 银行账户
    + cardholder: (string, required) - 持卡人姓名
    + card_type: (integer, required) - 银行卡类型--type = 1 支票 type = 2 存储

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 骑手评价信息 [GET /api/rider/evaluate]


+ Parameters
    + type: (integer, optional) - 类型--type = 1 满意 type =2 不满意
        + Default: 0

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": [
                    {
                        "content": "评级内容",
                        "type": "评价类型--type=1 满意 type=2 不满意",
                        "date": "评价日期"
                    }
                ]
            }

# 骑手端意见相关API

## 骑手意见列表 [GET /api/rider/suggestion]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": [
                    {
                        "content": "意见内容",
                        "date": "提交意见时间"
                    }
                ]
            }

## 骑手意见详情 [GET /api/rider/suggestion/details]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "cat_id": "意见分类id",
                    "content": "意见具体内容",
                    "photo": [
                        {
                            "path": "图片路径"
                        }
                    ]
                }
            }

## 骑手意见提交 [POST /api/rider/suggestion/post]


+ Request (multipart/form-data)
    + Body

            cat_id=意见类型id&content=意见内容&photo=附加图片

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 获取意见分类 [GET /api/rider/suggestion/cat]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": [
                    {
                        "id": "类别ID",
                        "name": "类别名称"
                    }
                ]
            }

# 骑手APP相关API

## app基本信息 [GET /api/rider/app/info]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "photo": "app缩略图",
                    "version": "版本号"
                }
            }

## app更新 [GET /api/rider/app/update]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## app历史版本列表 [GET /api/rider/app/version]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "id": "版本id",
                    "title": "版本更新标题信息",
                    "date": "版本更新日期"
                }
            }

## app历史版本详情 [GET /api/rider/app/version/details]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "content": "更新内容"
                }
            }

## 获取隐私政策信息 [GET /api/rider/app/privacy_policy]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "content": "政策内容"
                }
            }

## 获取骑手协议 [GET /api/rider/app/rider_protocol]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "content": "骑手协议内容"
                }
            }

## 获取热线 [GET /api/rider/app/hotline]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": [
                    {
                        "name": "热线名称",
                        "tel": "热线电话"
                    }
                ]
            }

## 获取短信模板 [GET /api/rider/app/smstmpl]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": [
                    {
                        "content": "短信模板内容"
                    }
                ]
            }

# 骑手端订单API

## 获取订单列表 [GET /api/rider/order/get_list]


+ Parameters
    + status: (integer, required) - 订单状态

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": [
                    {
                        "origin": "取货",
                        "dest": "送货",
                        "current_time": "当前时间",
                        "add_time": "下单时间",
                        "final_time": "最后送达时间（即13:00前送达）",
                        "status": "订单状态，可选值：-1 已取消订单 0 可抢订单 1 待取货 2 待送达 3 进行中 4 完成订单",
                        "slip_status": "转单状态 slip_status=0 正常状态 slip_status=1 转单中 slip_status=2 转单完成",
                        "store_img": "商家图标",
                        "store_tel": "商家电话",
                        "store_name": "商家名称"
                    }
                ]
            }

## 获取订单详情 [GET /api/rider/order/details]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "origin": "取货地址",
                    "dest": "送货地址",
                    "status": "订单状态",
                    "current_time": "当前时间",
                    "take_time": "接单时间",
                    "reach_store_time": "到店时间",
                    "take_delivery_time": "取货时间",
                    "finish_time": "送达时间",
                    "deliver_money": "配送费",
                    "discount_money": "优惠金额",
                    "remark": "备注",
                    "store_name": "商家名称",
                    "store_img": "商家图标",
                    "store_tel": "商家电话",
                    "food": [
                        {
                            "name": "菜品名称",
                            "price": "单价",
                            "count": "数量",
                            "img": "菜品图片"
                        }
                    ]
                }
            }

## 获取订单明细 [GET /api/rider/order/order_statement]


+ Parameters
    + month: (string, optional) - 月份(传参方式形如：2018-03 的月份)

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": [
                    {
                        "date": "日期",
                        "order_no": "订单号",
                        "receiver": "收货人",
                        "receiver_mobile": "联系电话",
                        "remark": "备注",
                        "sum": "合计",
                        "origin": "取货",
                        "dest": "送货",
                        "type": "类型 type=1 正常 type = 2退款单"
                    }
                ]
            }

## 骑手确认接单 [POST /api/rider/order/robbing]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 骑手到店上报 [POST /api/rider/order/reach_store]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 骑手确认收货 [POST /api/rider/order/take_delivery]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 骑手确认送达 [POST /api/rider/order/finish]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "commission": "订单佣金"
                }
            }

## 获取本月剩余转单数 [GET /api/rider/order/get_slip_num]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "num": "本月剩余转单次数"
                }
            }

## 确认转订单 [POST /api/rider/order/slip]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 取消转单 [POST /api/rider/order/cancel_slip]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 订单异常报备 [POST /api/rider/order/abnormal_post]


+ Parameters
    + cat_id: (integer, required) - 异常分类id
    + content: (string, required) - 异常描述
    + phote: (string, required) - 异常图片

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 获取订单异常类型 [GET /api/rider/order/abnormal_cat]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": [
                    {
                        "id": "订单异常分类id",
                        "name": "异常名称"
                    }
                ]
            }

# 骑手端消息API

## 获取订单消息列表 [GET /api/rider/ordermsg]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "order_id": "订单id",
                    "content": "订单消息内容",
                    "date": "日期"
                }
            }

## 获取系统消息列表 [GET /api/rider/sysmsg]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "id": "消息id",
                    "title": "系统消息标题",
                    "date": "日期"
                }
            }

## 获取系统消息详情 [GET /api/rider/sysmsg/details]


+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": ""
            }

## 获取短息验证码 [POST /api/rider/get_sms_code]


+ Parameters
    + mobile: (string, required) - 手机号码
    + sms_type: (integer, required) - 验证码类型 sms_type=1 注册验证码 sms_type=2 忘记密码验证码

+ Response 200 (application/json)
    + Body

            {
                "code": 0,
                "message": "",
                "data": {
                    "code": "验证码",
                    "expire": "验证码过期时间"
                }
            }