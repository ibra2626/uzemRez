<?php
class KullaniciIslem_Model extends CI_Model{
    function __construct()
    {
        parent::__construct();

    }
    function getAllKullanici(){
//            SELECT
//            users.user_ad,
//            users.user_soyad,
//            birim.birim_ad,
//            unvan.unvan_ad
//            FROM
//            users
//            INNER JOIN birim ON users.user_birimId = birim.birim_id
//            INNER JOIN unvan ON users.user_unvanId = unvan.unvan_id

        $query = $this
                    ->db
                    ->select('
                                users.user_id,
                                users.user_ad,
                                users.user_soyad,
                                birim.birim_ad,
                                unvan.unvan_ad,
                                users.user_durum,
                                users.user_accountId
                                ')
                    ->from('users')
                    ->join('birim','users.user_birimId = birim.birim_id')
                    ->join('unvan','users.user_unvanId = unvan.unvan_id')
                    ->get()
                    ->result();
        return $query;
    }
    function getDeaktifKullanici(){

        $query = $this
            ->db
            ->select('
                                users.user_id,
                                users.user_ad,
                                users.user_soyad,
                                birim.birim_ad,
                                unvan.unvan_ad,
                                users.user_durum
                                ')
            ->from('users')
            ->join('birim','users.user_birimId = birim.birim_id')
            ->join('unvan','users.user_unvanId = unvan.unvan_id')
            ->where('users.user_durum = 0')
            ->get()
            ->result();
        return $query;
    }
    function KL_DeaktifGuncelle($id,$data=array()){
        return $this->db->where("user_id", $id)->update('users',$data);
    }
    function KL_Sil($id){
        return $this->db->where("user_id","$id")->delete('users');
    }
    function manuelKullaniciEkle($postVeri,$rol){
        if ($rol == 3){
            $insertAccountArr = array(
                'email' => $postVeri['mail'],
                'password' => $postVeri['sifre'],
                'yetki' => "2"
            );
            $insertInfoArr = array(
              'user_ad' => $postVeri['ad'],
              'user_soyad' => $postVeri['soyad'],
              'user_birimId' => $postVeri['birim'],
              'user_unvanId' => $postVeri['unvan'],
              'user_durum' => 1
            );
            $check = $this->db
                ->set($insertAccountArr)
                ->insert('account');
            $check2 = $this->db
                ->set($insertInfoArr)
                ->insert('users');
            if (isset($check) AND isset($check2)){
                return 1;
            }
        }
        elseif($rol == 1){
            $insertAccountArr = array(
                'email' => $postVeri['mail'],
                'password' => $postVeri['sifre'],
                'yetki' => "1"
            );
            $insertInfoArr = array(
                'user_ad' => $postVeri['ad'],
                'user_soyad' => $postVeri['soyad'],
                'user_durum' => 1
            );
            $check = $this->db
                ->set($insertAccountArr)
                ->insert('account');
            $check2 = $this->db
                ->set($insertInfoArr)
                ->insert('users');
            if (isset($check) AND isset($check2)){
                return 1;
            }
        }
        elseif($rol == 2){
            $insertAccountArr = array(
                'email' => $postVeri['mail'],
                'password' => $postVeri['sifre'],
                'yetki' => "3"
            );
            $insertInfoArr = array(
                'user_ad' => $postVeri['ad'],
                'user_soyad' => $postVeri['soyad'],
                'user_durum' => 1
            );
            $check = $this->db
                ->set($insertAccountArr)
                ->insert('account');
            $check2 = $this->db
                ->set($insertInfoArr)
                ->insert('users');
            if (isset($check) AND isset($check2)){
                return 1;
            }
        }
    }
    function user_ID_save(){
        $rowAcc = $this->db
            ->limit(1)
            ->order_by('id','desc')
            ->get('account')
            ->result();
        $rowUser = $this->db
            ->limit(1)
            ->order_by('user_id','desc')
            ->get('users')
            ->result();
        $sonuc = $this->db
            ->set('user_accountId',$rowAcc[0]->id)
            ->where('user_id',$rowUser[0]->user_id)
            ->update('users');
        return $sonuc;
    }
}