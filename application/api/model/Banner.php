<?php
/**
 * Created by PhpStorm.
 * User: wwz
 * Date: 2017/9/13
 * Time: 13:41
 */

namespace app\api\model;


class Banner extends BaseModel
{
    public function items()
    {
        return $this->hasMany('BannerItem','banner_id','id');
    }
    public static function getBannerById($id)
    {
        $banner = self::with(['items','items.img'])
            ->find($id);
        return $banner;
    }
}