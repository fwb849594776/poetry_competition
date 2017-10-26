<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
error_reporting(0);
date_default_timezone_set('Asia/Shanghai');

use Daxia\Poetry\Generator\PoetryGenerator as Generator;

class Poetry
{
    private $file;

    public function __construct()
    {
        $this->file = dirname(__DIR__) . '/data/PoetryCategory.php';
    }

    public function addPoetry()
    {
        $generator = new Generator();
        $content = $generator->get() . "\n";
        $res = file_put_contents($this->file, $content, FILE_APPEND);

        if (empty($res)) {
            echo '添加失败';
        } else {
            echo '添加成功';
        }
        return;
    }
}

// register_shutdown_function(function(){
//     $e = error_get_last();
//     echo json_encode($e);exit;
// });


$poetry = new Poetry();
$poetry->addPoetry();

