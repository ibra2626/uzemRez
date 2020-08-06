<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashBoard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kullanici/Account_Model');
        $this->load->model('GenelBilgi_Model');
        $this->load->model('OptikIslem_Model');

        session_Control();
        admin_account_info();
    }

    public function index()
    {

        $this->load->view('dashboard',array(
            'toplamOkunan'=> $this->optikToplamları(1),
            'bekleyen' => $this->optikToplamları(0),
            'aktifKull' => $this->kullaniciToplam(1),
            'pasifKull' => $this->kullaniciToplam(0),
            'optikDurumu' => $this->optikDurumu()
        ));
    }
    public function optikToplamları($durum){

        $toplamOptik = new stdClass();
        return $toplamOptik->deger = $this->GenelBilgi_Model->dashboardOptikTotalBilgi($durum);

    }
    public function kullaniciToplam($durum){
        $toplamKullanici = new stdClass();
        return $toplamKullanici->deger = $this->GenelBilgi_Model->dashboardKullaniciTotalBilgi($durum);
    }
    public function optikDurumu(){
        $data = new stdClass();
        return $data->vals =$this->OptikIslem_Model->getAllOptik();
    }


}
