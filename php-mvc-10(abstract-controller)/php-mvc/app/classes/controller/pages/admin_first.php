<?php
class Controller_Pages_AdminFirst
{
    public function index()
    {       
        $view = new View();
        $view->set('name','ievgen');
        $view->set(array('age'=>30));
        $view->render();
    }
}