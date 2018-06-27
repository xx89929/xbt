<?php

return [
	/**
	 * 小程序APPID
	 */
    'appid' => 'wxe68abfc1d61db371',
    /**
     * 小程序Secret
     */
    'secret' => '7078e299b59564b2f85e1e03f3ef49c3',
    /**
     * 小程序登录凭证 code 获取 session_key 和 openid 地址，不需要改动
     */
    'code2session_url' => "https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",
];
