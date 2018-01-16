<?php
abstract class Controller_Base
{
    final public function redirect($url = '')
    {
        $appBaseUrl = Config::instance()->get('base_uri');
        $url = "{$appBaseUrl}{$url}";
        header("Location:{$url}");
        exit;
    }

    public function loadView($layout = 'default', $view = '')
    {
        return new View($layout, $view);
    }

    public function loadComponent($component)
    {
        $component = 'Component_' . $component;
        $comp = new $component();
        return $comp;
    }

    public function loadModel($model){
        $model = 'Model_' . $model;
        return new $model();
    }

}
