<?php

namespace App\Console\Commands;

use App\Api\Controllers\TokenBucketController;
use Illuminate\Console\Command;

class GenerateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gernerate_token:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '定时自动增加令牌桶数量';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        //令牌桶容器
        $queue = "chatgpt_container";
        $max = 100;

        $tokenBucket = new TokenBucketController($queue,$max);

        //每次时间时间间隔加入的令牌数
        $token_num = 10;

        //时间间隔
        $time_sleep = 3;

        //执行次数
        $exe_time = intval(60/$time_sleep);

        for($i = 0;$i <= $exe_time;$i++){
            $add_number = $tokenBucket->add($token_num);
            if($add_number == 0){
                break;
            } 
            echo '['.date('Y-m-d H:i:s').'] add token num:'.$add_number.PHP_EOL;
            sleep($time_sleep);
        }
    }
}
