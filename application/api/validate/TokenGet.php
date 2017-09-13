<?php
/**
 * Created by PhpStorm.
 * User: kobe
 * Date: 2017/9/8
 * Time: 13:11
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];
    protected $message = [
        'code' => '没有code还想获取Token,做梦哦'
    ];
}