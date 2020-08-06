<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kullanici_islemleri extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KullaniciIslem_Model');
        $this->load->model('kullanici/Account_Model');
//       SESSİON KONTROLÜ helper
        session_Control();
        admin_account_info();

    }

    public function index()
    {
        $this->TumKullanicilar();
    }
    public function TumKullanicilar(){
        $data = new stdClass();
        $data->vals = $this->KullaniciIslem_Model->getAllKullanici();

        $this->load->view('Kullanici_Tumu',array(
            'data' => $data
        ));
    }
    public function KullaniciEkle(){
        $this->load->view('Kullanici_Ekle', array(
            'dropdown_birim'=>dropDown('birim'),
            'dropdown_unvan'=>dropDown('unvan')
                ));
    }
    public function manuelKullaniciEkle(){
        $rol =  $this->input->post('rol');
        if ($rol == null){
            $this->session->set_userdata("rolyok",'Lütfen rol seçiniz.');
            $this->session->mark_as_temp("rolyok", 5);
            redirect(base_url('Kullanici_islemleri/KullaniciEkle'));
            return 0;
        }
            $this->form_validation->set_rules("ad","Ad","required|trim");
            $this->form_validation->set_rules("soyad","Soyad","required|trim");

            if ($rol != 1 AND $rol != 2){
                $this->form_validation->set_rules("birim","Birim","required|trim");
                $this->form_validation->set_rules("unvan","Ünvan","required|trim");
            }

            $this->form_validation->set_rules("mail","Email","required|trim|valid_email|is_unique[account.email]");
            $this->form_validation->set_rules("sifre","Şifre","required|trim|min_length[6]|max_length[15]");
            $this->form_validation->set_rules("sifreRe","Şifre Tekrar","required|trim|min_length[6]|max_length[15]|matches[sifre]");
            $this->form_validation->set_rules("rol","Rol","required");

            if ($this->form_validation->run() == TRUE){
                $ogretimGorvArr = array(
                    'ad' => $this->input->post('ad'),
                    'soyad' => $this->input->post('soyad'),
                    'mail' => $this->input->post('mail'),
                    'sifre' => $this->input->post('sifre'),
                    'sifreRe' => $this->input->post('sifreRe'),
                    'rol' => $this->input->post('rol'),
                    'birim' => $this->input->post('birim'),
                    'unvan' => $this->input->post('unvan')
                );
                $returnVal = $this->KullaniciIslem_Model->manuelKullaniciEkle($ogretimGorvArr,$rol);
                if ($returnVal == 1){
                    $sonuc = $this->KullaniciIslem_Model->user_ID_save();
                    if ($sonuc == 1){
                        $this->session->set_userdata("basariliKayit","Kayıt tamamlandı!");
                        $this->session->mark_as_temp("basariliKayit", 5);
                        redirect(base_url('Kullanici_islemleri/KullaniciEkle'));

                    }
                    else{
                        $this->session->set_userdata("basarisizKayit","Kayıt yapılamadı");
                        $this->session->mark_as_temp("basarisizKayit", 5);
                        redirect(base_url('Kullanici_islemleri/KullaniciEkle'));

                    }
                }
                else{
                    $this->session->set_userdata("manuelKayit","Bir hata meydana geldi.");
                    $this->session->mark_as_temp("manuelKayit", 5);
                    redirect(base_url('Kullanici_islemleri/KullaniciEkle'));
                }

            }else{
                $errors = validation_errors();
                $this->session->set_userdata("valid_error",$errors);
                $this->session->mark_as_temp("valid_error", 5);
                redirect(base_url('Kullanici_islemleri/KullaniciEkle'));
            }
    }
    public function KullaniciOnay(){
        $data = new stdClass();
        return $data->vals = $this->KullaniciIslem_Model->getDeaktifKullanici();
        $this->load->view('Kullanici_onayla',$data);

    }
    public function KL_DeaktifGuncelle($id){

        $completed = ($this->input->post("completed")=="true")? 1 : 0;
        echo $id." ".$completed;

        $this->KullaniciIslem_Model->KL_DeaktifGuncelle($id,array(
            "user_durum" => $completed
        ));
    }
    public function KL_sil($id){
        $this->KullaniciIslem_Model->KL_Sil($id);
        redirect(base_url('Kullanici_islemleri/TumKullanicilar'));
    }

    /**
     * Yönetici panelinde kullanıcılar sayfasında seçilen kullanıcının id'si çekilir.
     * $hocaID olarak fonksiyona gönderilir.Ve kullanıcı hesabına geçiş yapılır.
     * Kullanıcı hesabından tekrar yönetici hesabına geri dönmek için yöneticinin bilgileri yedek sessiona aktarılır.
     *
     */
    public function changeUser($hocaID){
        if(isset($hocaID)) {
                $session_data = array(
                    'admin_id',
                    'logged_in_admin'
                );
                $adminData_yedek = array(
                  'adminID_yedek' => $this->session->userdata('admin_id'),
                  'loggedInAdmin_yedek' => $this->session->userdata('logged_in_admin')
                );

                $this->session->set_userdata($adminData_yedek);
                $this->session->unset_userdata($session_data);

                $yetki = 2;
                $id = $hocaID;

                $session_UserData = array(
                        'user_id' => $id,
                        'logged_in_user' => $yetki,
                        'durum' => 1
                );
                $this->session->set_userdata($session_UserData);
                redirect(base_url('user/home'));
        }
    }

}
