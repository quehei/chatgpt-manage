<?php
namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chatgpt;
use Illuminate\Http\Request;

class ChatgptController extends Controller
{
    public function index(Request $request)
    {
        $question = $request->input('q');
        $chatgpt = new Chatgpt();
        return $chatgpt->getAnswer($question);
    }
}
?>