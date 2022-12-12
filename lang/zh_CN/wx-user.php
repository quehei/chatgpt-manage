<?php 
return [
    'labels' => [
        'WxUser' => 'WxUser',
        'wx-user' => 'WxUser',
    ],
    'fields' => [
        'open_id' => '同微信的oppenid',
        'union_id' => '同微信的 unionid，作为预留字段，不一定有值',
        'nick_name' => '微信昵称，同微信的nickName',
        'password' => '登录密码，作为预留字段，不一定有值',
        'avatar_url' => '微信图像，同微信的avatarUrl',
        'phone' => '手机号码，可能为空',
        'gender' => '性别，可能为空',
        'country' => '国家',
        'province' => '省份',
        'city' => '城市',
        'language' => '语言',
        'logged_at' => '最后登录时间',
    ],
    'options' => [
    ],
];
