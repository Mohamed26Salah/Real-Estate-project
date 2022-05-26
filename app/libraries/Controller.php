<?php
/*
 * Base Controller
 * Loads the models
 */
//require_once APPROOT.'/helpers/Util.php';
abstract class Controller
{
    protected $model;

    public function __construct($model)
    {
        $modelPath = Util\pathBuilder('models', $model);

        if (file_exists($modelPath)) {
            require_once $modelPath;
            $this->model = new $model();
        } else {
            die('Model does not exist');
        }
    }
    public function getModel()
    {
        return $this->model;
    }
    public function __call($name, $arguments) {
        if (!method_exists($this, $name)) {
            throw new myCustomException(' Something Went Wrong Please Try Again');
        }
        if (!property_exists($name, false)) {
            throw new myCustomException(' Something Went Wrong Please Try Again');
        }
    }
}
