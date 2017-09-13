<?php
/**
 * Created by PhpStorm.
 * User: wwz
 * Date: 2017/9/12
 * Time: 16:38
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;

class Upload extends BaseController
{
    public function upload()
    {
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            return $info->getSaveName();
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
           // echo $info->getFilename();
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
}