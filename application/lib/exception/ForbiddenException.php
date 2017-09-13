<?php
/**
 * Created by PhpStorm.
 * User: kobe
 * Date: 2017/9/9
 * Time: 13:44
 */

namespace app\lib\exception;


/**
 * token验证失败时抛出此异常
 */
class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $errorCode = 10001;
}