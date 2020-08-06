<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_Model');
        $this->load->model('RandevuKontrol_Model');

    }

    public function index()
    {
        $this->randevuKontrol();
        $logged_in_admin = $this->session->userdata('logged_in_admin');
        $logged_in_user = $this->session->userdata('logged_in_user');
        /*
         * SESSİON'LAR KONTROL EDİLİYOR.
         * Eğer daha önce giriş yapılmışsa oluşturulmuş olan sessiona göre admin veya kullanıcı sayfasına yönlendiriliyor.
         * Belirtilen kriterde session yoksa login sayfasına yönlendirilme yapılıyor.
        */
        if ($logged_in_admin != 0){
            redirect(base_url('dashboard'));
        }
        elseif ($logged_in_user != 0){
            redirect(base_url('user/home'));
        }
        elseif ($logged_in_user != 0 AND $logged_in_admin != 0){
            redirect(base_url('dashboard'));
        }
        else
            $this->load->view('Login');
    }
    public function loginControl()
    {
        if(isset($_POST['login'])) {
            $this->form_validation->set_rules('username','Kullanıcı Adı','required');
            $this->form_validation->set_rules('password','Şifre','required');

            if ($this->form_validation->run() == TRUE) {

                    $username = $this->input->post('username');
                    $pass = $this->input->post('password');

                    $result = $this->Login_Model->LoginControl($username, $pass);
                    $resultObj = new stdClass();
                    $resultObj->dbIcerik = $result;
                    $yetki = 0;
                    $id = 0;
                    if (!$result){
                        $yetki = 0;
                    }
                    else{
                        foreach ($resultObj->dbIcerik as $vals) {
                            $yetki = $vals->yetki;
                            $id = $vals->id;
                        }
                    }
                    /*
                     * Database'den email ve şifreye göre gelen yetki 1 veya 3 ise admin girişi yapılıyor.
                     * Değilse kullanıcı girişi
                     * */
                    if ($yetki == 1 OR $yetki == 3) {
                        $session_data = array(
                            'admin_id' => $id,
                            'logged_in_admin' => $yetki
                        );
                        $this->session->set_userdata($session_data);
                        redirect(base_url('dashboard'));
                    }
                    elseif
                        ($yetki == 2)
                        {
                        $session_UserData = array(
                            'user_id' => $id,
                            'logged_in_user' => $yetki
                        );
                        $this->session->set_userdata($session_UserData);
                        redirect(base_url('user/home'));
                    }
                    else
                            $data['wrong_login'] = "Eposta/Şifre Yanlış";

                    $this->load->view('login', $data);
            }
            else
            {
                $data['valid_error'] = "Tüm Alanları Doldurunuz";

                $this->load->view('login',$data);
            }

        }
    }
    public function randevuKontrol(){
        $this->RandevuKontrol_Model->kontrol();
    }
}