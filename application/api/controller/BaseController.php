<?php
/**
 * Created by PhpStorm.
 * User: kobe
 * Date: 2017/9/8
 * Time: 10:42
 */

namespace app\api\controller;

use app\api\service\Token;
use think\Controller;

class BaseController extends Controller
{
    protected function checkExclusiveScope()
    {
        Token::needExclusiveScope();
    }

    protected function checkPrimaryScope()
    {
        Token::needPrimaryScope();
    }

    protected function checkSuperScope()
    {
        Token::needSuperScope();
    }
}