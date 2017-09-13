<?php
/**
 * Created by PhpStorm.
 * User: kobe
 * Date: 2017/9/9
 * Time: 14:04
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class OrderPlace extends BaseValidate
{
    protected $rule = [
        'ad' => 'checkOrders'
    ];
    protected $singRule = [
        'label_id' => 'require|isPositiveInteger',
        'status' => 'require|isPositiveInteger',
        'day' => 'require|isPositiveInteger'
    ];
    protected function checkOrders($values)
    {
        if(empty($values)){
            throw new ParameterException([
                'msg' => '标签不能为空'
            ]);
        }
        foreach ($values as $value)
        {
            $this->checkOrder($value);
        }
        return true;
    }
    private function checkOrder($value)
    {
        $validate = new BaseValidate($this->singRule);
        $result = $validate->check($value);
        if(!$result){
            throw new ParameterException([
                'msg' => '商品列表参数错误',
            ]);
        }
    }
}