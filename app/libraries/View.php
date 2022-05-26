<?php

abstract class View{
    protected $model;
    protected $controller;

    public function __construct($model, $controller){
        $this->model = $model;
        $this->controller = $controller;
    }
    public function __call($name, $arguments) {
        if (!method_exists($this, $name)) {
            throw new myCustomException(' Something Went Wrong Please Try Again');
        }
    }

    public abstract function output();
}