<?php

class Controller
{
    public function model($model)
    {
        require_once "app/models/" . $model . '.php';
        return new $model;
    }

    public function setAllowedMethod($method)
    {
        $is_allowed = $_SERVER['REQUEST_METHOD'] == $method;
        if (!$is_allowed) {
            http_response_code(405);
            exit();
        }
    }
}
