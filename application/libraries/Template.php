<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
    public $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function render($view, $data = [])
    {
        $view = str_replace('.', '/', $view);
        
        $this->ci->load->view('themes/header', $data);
        $this->ci->load->view('themes/sidebar', $data);
        $this->ci->load->view($view, $data);
        $this->ci->load->view('themes/footer', $data);
    }
}