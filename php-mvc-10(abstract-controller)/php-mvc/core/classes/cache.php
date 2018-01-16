<?php
class Cache
{
    private $cacheFile;

    private static $_instance;

    public static function instance()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function set($id, $data, $lifetime = 10)
    {
        $cacheFile = $this->cacheFullName($id);
        file_put_contents($cacheFile, serialize($data));
        touch($cacheFile, (time() + intval($lifetime)));
        $cacheDir = APP_PATH . DS . 'temp' . DS . 'cache';
        if (!is_file($cacheDir . DS . 'cache_clean')) {
            file_put_contents($cacheDir . DS . 'cache_clean', '');
            touch($cacheDir . DS . 'cache_clean', (time() + intval(Config::instance()->get('cache_lifetime'))));
        }
    }
    public function get($id)
    {
        $cacheDir = APP_PATH . DS . 'temp' . DS . 'cache';
        if ((is_file($cacheDir . DS . 'cache_clean') and filemtime($cacheDir . DS . 'cache_clean'))) {
            $this->clean();
        }
        $cacheFile = $this->cacheFullName($id);
        if (file_exists($cacheFile)) {
            if (filemtime($cacheFile) < time()) {
                $this->delete($id);
            } else {
                return unserialize(file_get_contents($cacheFile));
            }
        }
        return false;
    }
    public function delete($id)
    {
        unlink($this->cacheFullName($id));
    }

    private function cacheFullName($id)
    {
        $cacheDir = APP_PATH . DS . 'temp' . DS . 'cache';
        return $cacheDir . DS . rawurlencode($id) . '.cache';
    }

    private function clean(){

    }
}
