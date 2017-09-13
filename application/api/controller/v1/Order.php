<?php
/**
 * Created by PhpStorm.
 * User: kobe
 * Date: 2017/9/9
 * Time: 12:17
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\Token;
use app\api\validate\OrderPlace;
use app\api\service\Order as OrderService;

class Order extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'placeOrder'],
    ];
    public function placeOrder()
    {
        (new OrderPlace())->goCheck();
         $uid = Token::getCurrentUid();
        $products = [];
        $label = input('post.ad/a')[0];
        $products['label_id'] = $label['label_id'];
        $products['status'] = $label['status'];
        $products['day'] = $label['day'];
        $order = new OrderService();
        $status = $order->place($uid,$products);
        return $status;
    }
}