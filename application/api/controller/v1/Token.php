<?php
/**
 * Created by PhpStorm.
 * User: kobe
 * Date: 2017/9/8
 * Time: 10:52
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\UserToken;
use app\api\validate\TokenGet;
use think\cache\driver\Redis;

class Token extends BaseController
{
    public function getToken($code='')
    {
        (new TokenGet())->goCheck();
        $wx = new UserToken($code);
        $token = $wx->get();
        return [
            'token' => $token
        ];
    }

}