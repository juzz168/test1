<?php
/**
 * Created by PhpStorm.
 * User: wwz
 * Date: 2017/9/13
 * Time: 12:43
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\IDMustBePostiveInt;
use app\api\model\Food as FoodModel;

class food extends BaseController
{
    public function getFood($id)
    {
        $validate = new IDMustBePostiveInt();
        $validate->goCheck();
        $food = FoodModel::
    }
}