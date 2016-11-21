<?php

use Phalcon\Mvc\Router;

$router = new Router();

$router->add(
    "/",
    [
        "controller" => "index",
        "action"     => "index",
    ]
);

// demo 左侧面板初始化
$router->add(
    "/demo-left-panel-init",
    [
        "controller" => "demo",
        "action"     => "demo1",
    ]
);

// demo 左侧面板带菜单
$router->add(
    "/demo-left-panel-with-menu",
    [
        "controller" => "demo",
        "action"     => "demo2",
    ]
);

// demo 右侧面板带菜单
$router->add(
    "/demo-right-panel-with-menu",
    [
        "controller" => "demo",
        "action"     => "demo3",
    ]
);

// Set 404 paths
$router->notFound(
    [
        "controller" => "index",
        "action"     => "route404",
    ]
);


return $router;
