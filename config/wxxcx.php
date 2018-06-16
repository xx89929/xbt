<?php

return [
	/**
	 * 小程序APPID
	 */
    'appid' => 'wx8bbe7f70d72cb870',
    /**
     * 小程序Secret
     */
    'secret' => '45154983dade23c1451c8cf0fd544590',
    /**
     * 小程序登录凭证 code 获取 session_key 和 openid 地址，不需要改动
     */
    'code2session_url' => "https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",
];
