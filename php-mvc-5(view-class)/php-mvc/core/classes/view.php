<?php
class View {
    private $_conf;
    private $_layout = '';
    private $_view = '';
    public $_vars = array();
    public function __construct($layout='', $view=''){
        $this->_conf = Config::instance();
        $this->_layout = !empty($layout) ? $layout : $this->_conf->get('default_layout');
        if(!empty($view)){
            $this->_view = $view;
        } else {
            $router = Router::instance();
            $this->_view = className2fileName($router->controller()).DS.$router->action();
        }
        var_dump($this->_view);
    }
    public function set($var, $value=''){
        if(is_array($var)){
            $keys = array_keys($var);
            $values = array_values($var);
            $this->_vars = array_merge($this->_vars, array_combine($keys, $values));
        } else {
            $this->_vars[$var] = $value;
        }
    }

    public function __set($key, $value) {
        $this->_vars[$key] = $value;
    }
}