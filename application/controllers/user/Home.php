<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kullanici/Account_Model');
        $this->load->model('kullanici/KullaniciOptik_Model');
        /**
         * session_user_Control kullanıcı girişi olup olmadığını teyit eder.
         */
        session_user_Control();
        /**
         * user_account_info id'ye göre databaseden kullanıcı bilgileri çeker.
         */
        user_account_info();
    }

    public function index()
    {
        $hocaID = $this->session->userdata('hocaID');
        $okunanoptikObj= new stdClass();
        $okunanoptikObj->data = $this->KullaniciOptik_Model->okunanOptikGet($hocaID);
        $teslimArr = $this->teslimEdilen_EdilmeyenOptik($hocaID);

        $this->load->view('kullanici_routerHtml/home',array(
            'okunanOptik' => $okunanoptikObj,
            'teslimEdilmeyenOptik' => $teslimArr[0],
            'teslimAlınmayanOptik' => $teslimArr[1],

        ));
    }

    /**
     * Anasayfada adminin yüklemiş olduğu excel dosyasını indirmek için kullanılan fonksiyon
     */
    public function notindir($optikID){
        $hocaKontrol = $this->session->userdata('hocaID');
        $filename = $this->KullaniciOptik_Model->notindir($optikID);
        if (!empty($filename) AND $hocaKontrol == $filename[0]->hocaID){
            $data = file_get_contents(base_url('/upload/'.$filename[0]->dosya_ad));
            force_download($filename[0]->dosya_ad,$data,TRUE);
        }
        else if(empty($filename)){
            echo "optik bulunmamaktadır";
        }
        else
            echo "Bu optiği görüntüleyemezsiniz.";
    }
    public function teslimEdilen_EdilmeyenOptik($hocaID){
        $homeOptikKontrolArr = array(
            $this->KullaniciOptik_Model->teslimEdilen_EdilmeyenOptik(1,$hocaID),
            $this->KullaniciOptik_Model->teslimEdilen_EdilmeyenOptik(3,$hocaID)
        );
        return $homeOptikKontrolArr;
    }
    public function changeUserToAdmin(){

        /**
         * eğer admin kendi sayfasından bu kullanıcıya geçiş yaptıysa bilgileri yedek alınmış sessiondan çekilir
         * Daha sonra kullanıcı session bilgileri destroy edilerek admin hesabına tekrar geçilir.
         */
        $yetki = $this->session->userdata('loggedInAdmin_yedek');
        $id = $this->session->userdata('adminID_yedek');

        $session_UserData = array(
            'user_id',
            'logged_in_user'
        );
        $this->session->unset_userdata($session_UserData);

        $session_data = array('admin_id'=>$id,'logged_in_admin'=>$yetki);
        $this->session->set_userdata($session_data);
        redirect(base_url('dashboard'));
    }
}
