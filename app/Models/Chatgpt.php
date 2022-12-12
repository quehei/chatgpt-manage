<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatgpt extends Model
{
    use HasFactory;

    /**
     * 
     * question    chatgpt问题
     *
     */
    public function getAnswer($question){
        
        return $question;
    }
}
