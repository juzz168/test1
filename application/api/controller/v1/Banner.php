<?php
/**
 * Created by PhpStorm.
 * User: wwz
 * Date: 2017/9/13
 * Time: 13:32
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\MissException;

class Banner extends BaseController
{
    public function getBannerById($id)
    {
        $validate = new IDMustBePostiveInt();
        $validate->goCheck();
        $banner = BannerModel::getBannerById($id);
        if(!$banner){
           throw new MissException([
               'msg' => '请求banner不存在',
               'errorCode' => 40000
           ]);
        }
        return $banner;
    }
}