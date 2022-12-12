<?php
namespace App\Api\Controllers;

use App\Http\Controllers\Controller;

class WechatController extends Controller
{
    /**
     * 
     * question    chatgpt问题
     *
     */
    public function login(){
        return request()->all();
    }
}
?>