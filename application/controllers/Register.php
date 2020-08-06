<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_Model');

    }

    public function index()
    {
        //birim ve ünvanları çekmek için dropDown helper'ı kullanılmakta.
        $this->load->view('register',array(
            'captcha'=>$this->captcha(),
            'dropdown_birim'=>dropDown('birim'),
            'dropdown_unvan'=>dropDown('unvan')
        ));
    }
    //captcha helperi kullanılıyor.
    public function captcha()
    {
        $vals = array(
            'word'          => '',
            'img_path'      => 'assets/captcha/',
            'img_url'       => 'http://localhost/uzemRez/assets/captcha/',
            'font_path'     => 'assets/plugins/fonts/texb.ttf',
            'img_width'     => 120,
            'img_height'    => 40,
            'expiration'    => 15,
            'word_length'   => 5,
            'font_size'     => 20,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'        => array(
                'background' => array(40, 167, 69),
                'border' => array(255, 255, 255),
                'text' => array(255, 255, 255),
                'grid' => array(0, 255, 40)
            )
        );
        $cap = create_captcha($vals);

        $this->session->set_userdata("captcha_code",$cap["word"]);
        $viewData = new stdClass();
        $viewData->data = $cap;
        return $viewData;
    }
    public function register(){
        $Set_Capt = $this->input->post('captcha');
        $captcha_code = $this->session->userdata["captcha_code"];

        if (!empty($Set_Capt)){
            if ($Set_Capt == $captcha_code){

                /**
                 * Captcha'nın doğru olduğu durumda çalışır.Ve bilgileri 'modele' gönderir.
                 * Veritabanına Kayıt Gerçekleşir.

                 */
                if ($this->email_control() == true){

                    $this->form_validation->set_rules("ad","Ad","required|trim");
                    $this->form_validation->set_rules("soyad","Soyad","required|trim");
                    $this->form_validation->set_rules("birim","Birim","required|trim");
                    $this->form_validation->set_rules("unvan","Ünvan","required|trim");
                    $this->form_validation->set_rules("email","Email","required|trim|valid_email|is_unique[account.email]");
                    $this->form_validation->set_rules("sifre","Şifre","required|trim|min_length[6]|max_length[15]");
                    $this->form_validation->set_rules("pass_conf","Şifre Tekrar","required|trim|min_length[6]|max_length[15]|matches[sifre]");


                    if ($this->form_validation->run() == TRUE){

                        $account_regist = array(
                            'email' => $this->input->post('email'),
                            'password' => $this->input->post('sifre')
                        );

                        $user_regist = array(
                            'user_ad' => $this->input->post('ad'),
                            'user_soyad' => $this->input->post('soyad'),
                            'user_birimId' => $this->input->post('birim'),
                            'user_unvanId' => $this->input->post('unvan')
                        );
                        /**
                         * ldap helperi kullanılıyor.Gelen değer true ise kayıt tamamlanıyor.
                         * false ise hata mekanizması çalışıyor
                         */
                        $ldapKontrol = ldap($account_regist['email'],$account_regist['password']);
                        if ($ldapKontrol == true){
                            $this->Register_Model->user_save('account',$account_regist);
                            $this->Register_Model->user_save('users',$user_regist);
                            $this->Register_Model->user_infoSave();

                            /**
                             *kayıt maili helperi kullanılarak mail gönderiliyor.
                             **/
                            kayitMail($user_regist['user_ad'],$user_regist['user_soyad'],$account_regist['email']);


                            $this->session->set_userdata("kayitTamamlandi",'Kaydınız Başarı İle Gerçekleşti.');
                            $this->session->mark_as_temp("kayitTamamlandi", 15);
                            redirect(base_url());

                        }
                        else{

                            $this->session->set_userdata("val_errors","Ldap Hatası");
                            $this->session->mark_as_temp("val_errors", 15);

                            redirect(base_url('Register'));
                        }
                    }
                    else{
                        $errors = validation_errors();
                        $this->session_registerForm();
                        $this->session->set_userdata("val_errors",$errors);
                        $this->session->mark_as_temp("val_errors", 15);

                        redirect(base_url('Register'));
                    }

                }
                else{
                    $this->session->set_userdata("emailUyumlulugu","Email '@bilecik.edu.tr' ile bitmelidir.");
                $this->session->mark_as_temp("emailUyumlulugu",15);
                $this->session_registerForm();
                redirect(base_url('Register'));
                }

            }
            else
            {
                /**
                 * Captcha yanlışsa uyarı verir.
                 * Kayıt Gerçekleşmez.
                 */

                $this->session_registerForm();
                $this->session->set_userdata("captcha_control",0);
                $this->session->mark_as_temp("captcha_control",15);


                redirect(base_url('Register'));

            }
        }
        else
        {
            $this->session->set_userdata("val_errors","Boş Alan Bırakmayınız!");
            $this->session->mark_as_temp("val_errors", 15);
            redirect(base_url('Register'));
        }
    }
    public function email_control(){
        $return_strpos = strpos($this->input->post('email'),"@ogrenci.bilecik.edu.tr");
        if ($return_strpos == false){
            return false;
        }
        return true;
    }
    public function session_registerForm(){

        $value_entered =array(
            'name' => $this->input->post('ad'),
            'lastname' => $this->input->post('soyad'),
            'email' => $this->input->post('email')
        );
        $this->session->set_userdata($value_entered);
        $this->session->mark_as_temp($value_entered,15);
    }

}
