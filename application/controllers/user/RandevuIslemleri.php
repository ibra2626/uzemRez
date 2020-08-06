<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RandevuIslemleri extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kullanici/Randevu_Model');
        $this->load->model('kullanici/KullaniciOptik_Model');
        $this->load->model('OptikIslem_Model');
        $this->load->model('AdminAyar_Model');
        session_user_Control();

    }

    public function index()
    {
        $this->randevuAl();
    }
    public function randevuAl(){


        $this->load->view('kullanici_routerHtml/randevu_al',array(
            'aktifRandevu' => $this->aktifRandevu($this->session->userdata('hocaID')),
            'dropdown_birim'=>dropDown('birim'),
            'dropdown_bolum'=>dropDown('bolum'),
            'randevu_tablo' => $this->AktifTarihTablo(),
            'dbActiveHours' => $this->AktifSaatTablo()

        ));

    }
    public function bolumGoster(){
        $birim_id = $this->input->post('birim_id');

        $bolumler = $this->Randevu_Model->bolumCek($birim_id);
        echo json_encode($bolumler);
    }
    public function randevuIptal(){
        $hocaID = $this->session->userdata('hocaID');
        $okunanoptikObj= new stdClass();
        $okunanoptikObj->data = $this->KullaniciOptik_Model->okunanOptikGet($hocaID);
        $this->load->view('kullanici_routerHtml/randevu_iptal',array(
            'okunanOptik' => $okunanoptikObj,
            'randevuCek' => $this->randevuIptal_OptikCek($hocaID)
            ));
    }
    public function optikIptal($optikID,$RandevuID){
        $this->Randevu_Model->optikSil($optikID,$RandevuID);
        $this->OptikIslem_Model->randevuKontrol($RandevuID);
        redirect(base_url('user/RandevuIslemleri/randevuIptal'));
    }
    public function randevuIptal_OptikCek($hocaID){
        $today = date('Y-m-d');
        return $this->Randevu_Model->randevuSil_OptikCek($hocaID,$today);
    }
    public function randevuSil($randevuID){
        $this->Randevu_Model->randevuSil($randevuID);
        redirect(base_url('user/RandevuIslemleri/randevuIptal'));
    }
    public function randevuGecmis(){
        $hocaID = $this->session->userdata('hocaID');
        $data = $this->Randevu_Model->randevuGecmisCek($hocaID);
        $this->load->view('kullanici_routerHtml/randevu_history',array('gecmis' => $data));
    }
    public function randevu(){
    }
    public function AktifTarihTablo(){
        $today = date('Y-m-d');
        $DBActiveDay = new stdClass();
        $DBActiveDay->rows =$this->Randevu_Model->getDBRowsDistDay('randevu',$today);
        return $DBActiveDay;
    }
    public function AktifSaatTablo(){
        $DBActiveHour = new stdClass();
        $DBActiveHour->rows =$this->AdminAyar_Model->getDBRows('randevu');
        return $DBActiveHour;
    }
    public function randevuOlustur(){

        $randevuDetay = new stdClass();
        $randevuDetay->result = $this->input->post('dizi[]');
        $hocaID = $this->session->userdata('hocaID');
        $hocaMail = $this->Randevu_Model->MailCek(47);
        $mailArr = array();
        foreach($randevuDetay->result as $vals){
            $valsExpArr = explode(',',$vals);
            $birimID = $valsExpArr[1];
            $bolumID = $valsExpArr[2];
            $optikSayisi = $valsExpArr[3];
            $tarih = $valsExpArr[4];
            $saat = $valsExpArr[5];
            $this->Randevu_Model->randevuOlustur($tarih,$saat,$hocaID,$birimID,$bolumID,$optikSayisi);
            array_push($mailArr,$tarih,$saat);
        }
        RandevuMail($mailArr[0],$mailArr[1],$hocaMail[0]->email);

    }
    public function aktifRandevu($hocaID){
        $gelenVeri = new stdClass();
        $gelenVeri->vals = $this->Randevu_Model->randevuCek($hocaID);
        return $gelenVeri->vals;
    }
    public function degisiklik(){
        $this->Randevu_Model->degisiklik();
    }

}
