<?php
/**
 * Created by PhpStorm.
 * User: kobe
 * Date: 2017/9/8
 * Time: 10:58
 */

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use \app\api\service\Pay as PayService;
use app\api\validate\IDMustBePostiveInt;
use think\Exception;

class Pay extends BaseController
{
    public function getPreOrder($id='')
    {
        (new IDMustBePostiveInt())->goCheck();
        $pay = new PayService($id);
        $pay->pay();
    }

}