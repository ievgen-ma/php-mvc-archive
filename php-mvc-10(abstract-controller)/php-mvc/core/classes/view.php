<?php
class View {
    private $_conf;
    private $_layout = '';
    private $_view = '';
    private $_vars = array();
    private $_render;

    public function __construct($layout='', $view=''){
        $this->_conf = Config::instance();
        $this->_layout = !empty($layout) ? $layout : $this->_conf->get('default_layout');
        if(!empty($view)){
            $this->_view = $view;
        } else {
            $router = Router::instance();
            $this->_view = className2fileName($router->controller()).DS.$router->action();
        }
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

    public function view($view){
        $this->_view = $view;
    }

    public function layout($layout){
        $this->_layout = $layout;
    }

    public function render($render=true){
        if($render === false){
            $this->_render = false;
        }
        if($this->_render === false){
            return false;
        }
        $ext = $this->_conf->get('view_ext');
        $this->_layout = APP_PATH.DS.'view'.DS.'_layout'.DS.$this->_layout.$ext;
        $this->_view = APP_PATH.DS.'view'.DS.$this->_view.$ext;
        unset($render, $ext);

        extract($this->_vars, EXTR_OVERWRITE);
        ob_start();
        include $this->_view;
        $content_for_layout = ob_get_clean();

        if($this->_conf->get('gz_output')) {
            ob_start('ob_gzhandler') or ob_start();
        } else {
            ob_start();
        }
        
        include $this->_layout;
        header('Content-Length: '.ob_get_length());
        $this->_render = false;
    }
}