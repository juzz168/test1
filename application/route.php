<?php
use think\Route;
Route::post('api/:version/token/user', 'api/:version.Token/getToken');
Route::post('api/:version/order', 'api/:version.Order/placeOrder');
Route::post('api/:version/pay/pre_order', 'api/:version.Pay/getPreOrder');
Route::get('api/:version/ad', 'api/:version.Ad/showAd');
Route::post('api/:version/uploads','api/:version.Upload/upload');