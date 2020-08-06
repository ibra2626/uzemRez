<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayarlar extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    }
    public function account()
    {
        $this->load->view('kullanici_routerHtml/ayar_account');
    }

    public function sifre()
    {
        $this->load->view('kullanici_routerHtml/ayar_pass');
    }

    public function cikis()
    {
        $this->load->view('kullanici_routerHtml/ayar_exit');
    }
}
