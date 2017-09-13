<?php
/**
 * Created by PhpStorm.
 * User: kobe
 * Date: 2017/9/8
 * Time: 11:54
 */

namespace app\api\model;


use think\Model;

class User extends BaseModel
{
    protected $autoWriteTimestamp = true;
    public function Orders()
    {
        $this->hasMany('Order','user_id','id');
    }
    public static function getByOpenID($openid)
    {
        $user = self::where('openid','=',$openid)
            ->find();
        return $user;
    }
}