<?php
/**
 * Created by PhpStorm.
 * User: wwz
 * Date: 2017/9/11
 * Time: 16:18
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\AdOneday;
use app\api\validate\AdPlace;

class Ad extends BaseController
{
    public function showAd()
    {
        $db = new AdOneday();
        $db->user_id = 1;
        $db->title = 'xxx';
        $db->save();
    }
}