<?php
/**
 * Created by PhpStorm.
 * User: wwz
 * Date: 2017/9/11
 * Time: 16:21
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class AdPlace extends BaseValidate
{
    protected $rule = [
        'ad' => 'checkAds'
    ];
    protected $singRule = [
        'user_id' => 'require|isPositiveInteger',
        'label_id' => 'require|isPositiveInteger',
        'label_pid' => 'require|isPositiveInteger',
        'head_img' => 'require',
        'title' => 'require',
        'content' => 'require'
    ];
    protected function checkAds($values)
    {
        if(empty($values)){
            throw new ParameterException([
                'msg' => '标签不能为空'
            ]);
        }
        foreach ($values as $value)
        {
            $this->checkAd($value);
        }
        return true;
    }
    private function checkAd($value)
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