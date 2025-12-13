<?php
class Route
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $param = [];

    public function __construct()
    {
        if (isset($_GET['url'])) {
            // fungsi lain rtrim menerima 2 parameter ('/', $_GET['url'])
            $url = explode('/', filter_var(trim($_GET['url']), FILTER_SANITIZE_URL)) ?? null;
        }
        // Gunakan kapitalisasi agar cocok dengan nama file Controller di Linux
        $url[0] = isset($url[0]) ? ucfirst($url[0]) . 'Controller' : 0;


        // ngecek file controller
        if (file_exists('../app/Controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // ngecek method pada controller
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if (!empty($url)) {
            $this->param = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->param);
    }
}
