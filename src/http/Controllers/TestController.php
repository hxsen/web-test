<?php

namespace Hxsen\WebTest\http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class TestController extends Controller
{
    /**
     * 桥接到测试代码
     * 访问方式：http://lods.test/test/ForecastList->PackageCancel
     *
     * @param $className
     * @param $func
     * @return mixed
     * @author houxin 2021/11/3 11:14
     */
    public function index($className, $funcName)
    {
        $dirName = config('web_url.dir_name');
        // 拼接调用的类名称
        $class = "Tests\\$dirName\\" . Str::finish(Str::title($className), 'Test');
        // 方法名称
        $func = Str::start(Str::title($funcName), 'test');

        return (new $class)->$func();
    }
}
