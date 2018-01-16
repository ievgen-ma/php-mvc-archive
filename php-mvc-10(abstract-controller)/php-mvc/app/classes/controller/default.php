<?php
class Controller_Default extends Controller_Base
{
    public function main() 
    {
        $view = $this->loadView();
        $view->name = 'admin';
        $view->render();
    }
}
