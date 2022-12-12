<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class WxUser extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'wx_users';
    
}
