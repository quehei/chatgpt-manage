<?php
namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chatgpt;
use Illuminate\Http\Request;

class ChatgptController extends Controller
{
    public function index(Request $request)
    {
        $queue = "chatgpt_container";
        $status = $this->getContainerStatus();
        if($status){
            $question = $request->input('q');
            $chatgpt = new Chatgpt();
            return response()->json([
                'code' => 200,
                'msg' => $chatgpt->getAnswer($question)
            ]);
        }else{
            return response()->json([
                'code' => 500,
                'msg' => '服务器繁忙'
            ]);
        }
       
    }

    public function getContainerStatus($queue = "chatgpt_container")
    {
        $tokenBucket = new TokenBucketController($queue);
        $status = $tokenBucket->get();
        return $status;
    }
}
?>