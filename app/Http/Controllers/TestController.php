<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use yii\redis\Cache;
use Illuminate\Support\Facades\Event;
use App\Jobs\SendReminderEmail;

class TestController extends Controller
{
    //
    public function test()
    {
//        phpinfo();
        Redis::set('ddd',1231);
        $dd = Redis::get('ddd');
        var_dump($dd);
        \Event::dispatch(new \App\Events\AsyncNotifyEvent($dd));
        $this->dispatch(new SendReminderEmail($dd));
        var_dump(1111);exit;
    }
}
