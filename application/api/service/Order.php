<?php
/**
 * Created by PhpStorm.
 * User: kobe
 * Date: 2017/9/8
 * Time: 11:10
 */

namespace app\api\service;


use app\api\model\Label;
use app\lib\exception\OrderException;
use app\api\model\Order as OrderModel;
use think\Exception;

class Order
{
    protected $olabel;
    protected $label;
    protected $uid;
    public function place($uid,$oProducts)
    {
        $this->olabel = $oProducts;
        if (!$this->getLabelByOrder($oProducts['label_id'])){
            throw new OrderException([
                'msg' => 'id为' . $oProducts['label_id'] . '的标签不存在，订单创建失败'
            ]);
        }
        $this->label = $this->getLabelByOrder($oProducts['label_id']);
        $this->uid = $uid;
        $status = $this->getLabelStatus();
        if (!$status['pass']) {
            $status['order_id'] = -1;
            return $status;
        }
        $orderSnap = $this->snapOrder($status['totalPrice']);
        $status = self::createOrderByTrans($orderSnap);
        $status['pass'] = true;
        return $status;
    }
    // 根据订单查找真实分类
    private function getLabelByOrder($lid)
    {
        // 为了避免循环查询数据库
        $label = Label::where('id','=',$lid)->find();
        return $label;
    }
    private function getLabelStatus()
    {
        $count = OrderModel::where('top_status','=','2')->count();
        $status = $this->getpStatus($count,$this->label);
        return $status;
    }
    private function getpStatus($count, $label)
    {
        $pStatus = [
            'id' => null,
            'pass' => true,
            'name' => '',
            'totalPrice' => 0
        ];
            $pStatus['id'] = $label['id'];
            $pStatus['name'] = $label['name'];
            $pStatus['totalPrice'] = $label['price'];
            if ($this->olabel['status'] == 2) {
                if (config('setting.top_sum') - $count > 0) {
                    $pStatus['totalPrice'] = $label['price'] + $label['top_price'] * $this->olabel['day'];
                }else{
                    $pStatus['pass'] = false;
                }
            }
        return $pStatus;
    }
    // 创建订单时没有预扣除库存量，简化处理
    // 如果预扣除了库存量需要队列支持，且需要使用锁机制
    private function createOrderByTrans($snap)
    {
        $orderNo = $this->makeOrderNo();
        try {
            $orderNo = $this->makeOrderNo();
            $order = new OrderModel();
            $order->user_id = $this->uid;
            $order->order_no = $orderNo;
            $order->total_price = $snap['orderPrice'];
            $order->top_status = $this->olabel['status'];
            $order->top_day = $snap['top_day'];
            $order->snap_label = $snap['snapLabel'];
            $order->snap_name = $snap['snapName'];
            $order->save();

            $orderID = $order->id;
            $create_time = $order->create_time;
            return [
                'order_no' => $orderNo,
                'order_id' => $orderID,
                'create_time' => $create_time
            ];
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    /**
     * @param string $orderNo 订单号
     * @return array 订单商品状态
     * @throws Exception
     */
    public function checkOrderStock($orderID)
    {
        //        if (!$orderNo)
        //        {
        //            throw new Exception('没有找到订单号');
        //        }

        // 一定要从订单商品表中直接查询
        // 不能从商品表中查询订单商品
        // 这将导致被删除的商品无法查询出订单商品来
        $label = OrderModel::where('id', '=', $orderID)->find();
        $this->label = Label::where('id','=',$label->snap_label)->find();
        $status = $this->getlabelStatus();
        return $status;
    }
    // 预检测并生成订单快照
    private function snapOrder($price)
    {
        // status可以单独定义一个类
        $snap = [
            'orderPrice' => $price,
            'top_day' => $this->olabel['day'],
            'snapName' => $this->label['name'],
            'snapLabel' => $this->label['id']
        ];
        return $snap;
    }
    public static function makeOrderNo()
    {
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn =
            $yCode[intval(date('Y')) - 2017] . strtoupper(dechex(date('m'))) . date(
                'd') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf(
                '%02d', rand(0, 99));
        return $orderSn;
    }
}