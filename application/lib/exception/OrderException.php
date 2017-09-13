<?php
/**
 * Created by PhpStorm.
 * User: kobe
 * Date: 2017/9/9
 * Time: 17:24
 */

namespace app\lib\exception;


class OrderException extends BaseException
{
    public $code = 404;
    public $msg = '订单不存在，请检查ID';
    public $errorCode = 80000;
}