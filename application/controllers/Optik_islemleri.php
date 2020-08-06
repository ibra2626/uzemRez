<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Optik_islemleri extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OptikIslem_Model');
//       SESSİOBK KONTROLÜ HELPER
        session_Control();

    }

    public function index()
    {
        $this->tumTaramalar();
    }
    public function tumTaramalar(){
        $this->load->view('optik_tumu',array(
            'vals'=>$this->tumOptikler(),
            'yuklenenDosyaAdi' => $this->dosyaIsmiCek()
        ));

    }
    public function okunanOptik(){
        $data = new stdClass();
        $data->vals = $this->OptikIslem_Model->okunanOptikGet();
        $this->load->view('optik_okunan',$data);
    }
    public function bekleyenOptik(){
        $data = new stdClass();
        $data->vals = $this->OptikIslem_Model->bekleyenOptikGet();
        $this->load->view('optik_bekleyen',$data);
    }

    /**
     * @param $optikID = işlem yapılan optik id
     * @param $durum = 3 değer alabilir. 2=>optiklerin getirildiği belirtilir / 3 => Optiklerin Okunduğı Belirtilir / 4 => Optiklerin Kullanıcıya teslim edildiğini belirtir.
     * @param $tarih = o anki tarihtir.
     * @param string $randevuID
     */
    public function optikAksiyon($optikID,$durum,$tarih,$randevuID=''){
        $this->OptikIslem_Model->optikAksiyon($optikID,$durum,$tarih,$randevuID);
        redirect(base_url('Optik_islemleri/tumTaramalar'));
    }
    /**
     * @param $optikID
     * @param $durum => Bir önceki değeri alır.Örn : Optikler teslim edilmedi seçilirse , optikler okundu durumuna geçer.
     */
    public function optikAksiyonSil($optikID,$durum){
        $this->OptikIslem_Model->optikAksiyonIptal($optikID,$durum);
        redirect(base_url('Optik_islemleri/tumTaramalar'));
    }
    public function optikSil($optikID,$RandevuID){
        $this->OptikIslem_Model->optikSil($optikID,$RandevuID);
        $this->OptikIslem_Model->randevuKontrol($RandevuID);
    }
    public function notYukle($optik_id,$hocaID){
        $config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'xls|pdf|xlsx';
//        $config['max_size']             = 100;
//        $config['max_width']            = 1024;
//        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload("file"))
        {
            echo  $this->upload->display_errors();

        }
        else
        {
            $this->session->set_userdata('Not Yükleme İşlemi Başarılı');
           $dosyaVerileri = $this->upload->data();
           $this->OptikIslem_Model->dosyaIsmiKaydet($optik_id,$dosyaVerileri['file_name'],$hocaID);
           redirect(base_url('Optik_islemleri/tumTaramalar'));
        }

    }
    public function dosyaGoster($optik_id){
        $dosyaAd = new stdClass();
         return $dosyaAd->result = $this->OptikIslem_Model->dosyaGoster($optik_id);
    }
    public function tumOptikler(){
        $data = new stdClass();
        return $data->vals =$this->OptikIslem_Model->getAllOptik();
    }
    public function yukluDosyaSil($optik_id){
        $this->OptikIslem_Model->dosyaSil($optik_id);
        redirect(base_url('Optik_islemleri/tumTaramalar'));
    }

    public function okunduMailiGonder($optikID){
            $row = $this->OptikIslem_Model->optikMailBilgiCek($optikID);
            $icerik = "Aşağıda bilgileri verilen işlemler tamamlanmıştır.Optiklerinizi mesai saatleri içerisinde birimimizden teslim alabilirsiniz.";
            $mail = "ibrahim.yesil26@hotmail.com";
            okunanOptikMail($mail,$row[0]->birim_ad,$row[0]->bolum_ad,$row[0]->optik_sayisi,$row[0]->startDate,$icerik);
            redirect(base_url('Optik_islemleri/tumTaramalar'));
    }
    public function hatirlatmaMaili($optikID){
        $row = $this->OptikIslem_Model->optikMailBilgiCek($optikID);
        $icerik = "Aşağıda bilgileri verilen optikler birimimizden teslim alınmamıştır.Kısa süre içerisinde teslim almanızı rica ederiz.";
        $mail = "ibrahim.yesil26@hotmail.com";
        hatirlatmaMaili($mail,$row[0]->birim_ad,$row[0]->bolum_ad,$row[0]->optik_sayisi,$row[0]->startDate,$icerik);
        redirect(base_url('Optik_islemleri/tumTaramalar'));
    }

    //DOSYA İSMİ

    public function dosyaIsmiCek(){
        return $this->OptikIslem_Model->dosyaIsmiCek();
    }
}
