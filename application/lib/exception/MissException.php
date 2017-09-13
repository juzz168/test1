<?php
/**
 * Created by PhpStorm.
 * User: wwz
 * Date: 2017/9/13
 * Time: 14:01
 */

namespace app\lib\exception;


class MissException extends BaseException
{
    public $code = 404;
    public $msg = 'global:your required resource are not found';
    public $errorCode = 10001;
}