<?php
/**
 * Created by PhpStorm.
 * User: kobe
 * Date: 2017/9/9
 * Time: 14:12
 */

namespace app\api\model;


class Order extends BaseModel
{
    protected $hidden = ['user_id', 'delete_time', 'update_time'];
    protected $autoWriteTimestamp = true;
}