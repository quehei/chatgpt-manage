<?php
namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class TokenBucketController extends Controller
{
    private $_queue;
    private $_max;

    public function __construct($_queue,$_max = 10)
    {
        $this->_queue = $_queue;
        $this->_max = $_max;
    }

    /**
     * 
     * 向令牌桶中增加令牌数量
     * 
     */
    public function add($num = 0)
    {
        //当前令牌数量
        $current_number = intval(Redis::Llen($this->_queue));

        //最大令牌数量
        $max_number = intval($this->_max);

        $num = $current_number + $num >= $max_number ? $max_number - $current_number : $num;

        if($num > 0){
            $token = array_fill(0,$num,1);
            Redis::lpush($this->_queue,...$token);
            return $num;
        }

        return 0;
    }

    //获取令牌桶的状态
    public function get()
    {
       return Redis::rPop($this->_queue) ? true : false;
    }

    //重置令牌桶
    public function reset(){
        Redis::del($this->_queue);
        $this->add($this->_max);
    }
}
?>