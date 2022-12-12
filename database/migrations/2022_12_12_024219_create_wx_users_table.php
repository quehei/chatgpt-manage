<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_users', function (Blueprint $table) {
            $table->id();
            $table->string('open_id')->comment('同微信的oppenid');
            $table->string('union_id')->nullable()->comment('同微信的 unionid，作为预留字段，不一定有值');
            $table->string('nick_name')->charset('utf8mb4')->comment('微信昵称，同微信的nickName');
            $table->string('password')->nullable()->comment('登录密码，作为预留字段，不一定有值');
            $table->text('avatar_url')->comment('微信图像，同微信的avatarUrl');
            $table->string('phone')->nullable()->comment('手机号码，可能为空');
            $table->string('gender')->nullable()->comment('性别，可能为空');
            $table->string('country')->nullable()->comment('国家');
            $table->string('province')->nullable()->comment('省份');
            $table->string('city')->nullable()->comment('城市');
            $table->string('language')->nullable()->comment('语言');
            $table->dateTime('logged_at')->comment('最后登录时间');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wx_users');
    }
};
