<?php

route("/", function () {
    return view("welcome");
});

$action = $_SERVER["REQUEST_URI"];
dispatch($action);



/*
Settings of Route
*/



















$routes = [];

function route($action, $callback)
{

    global $routes;

    $action = trim($action, '/');

    $routes[$action] = $callback;
}

function dispatch($action)
{
    global $routes;

    $action = trim($action, '/');

    $callback = $routes[$action];

    call_user_func($callback);
}

function view($views)
{
    require "views/" . $views . ".php";
}
