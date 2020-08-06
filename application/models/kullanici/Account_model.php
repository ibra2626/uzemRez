<?php
/*
 * BU MODEL DOSYASI KULLANICI VE ADMİN SAYFASINDA USER_ID,İSİM,SOYİSİM,ÜNVAN,BİRİM ÇEKMEK
 * İÇİN OLUŞTURULMUŞTUR.
 * */
class Account_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }
    public function get_Account_Info($loginID){
//    SELECT
//      account.id,
//      users.user_accountId,
//      users.user_ad,
//      users.user_soyad,
//      users.user_id,
//      account.email,
//      account.yetki,
//      birim.birim_ad,
//      unvan.unvan_ad
//
//    FROM
//      account
//
//    INNER JOIN users ON account.id = users.user_accountId
//    INNER JOIN birim ON users.user_birimId = birim.birim_id
//    INNER JOIN unvan ON users.user_unvanId = unvan.unvan_id

        return $dbVals =
             $this->db
            ->select(
                    'account.id,
                    users.user_accountId,
                    users.user_ad,
                    users.user_soyad,
                    users.user_id,
                    account.email,
                    account.yetki,
                    birim.birim_ad,
                    unvan.unvan_ad'
                    )
            ->from('account')
            ->join('users','account.id = users.user_accountId')
            ->join('birim','users.user_birimId = birim.birim_id')
            ->join('unvan','users.user_unvanId = unvan.unvan_id')
            ->where('users.user_accountId',$loginID)
            ->get()
            ->result();

    }
    public function get_AdminAcc_Info($loginID){
//        SELECT
//        users.user_id,
//        users.user_ad,
//        users.user_soyad
//        FROM
//        account
//        INNER JOIN users ON account.id = users.user_accountId

        return $dbVals =
            $this->db
                ->select(
                    '
                    users.user_id,
                    users.user_ad,
                    users.user_soyad,
                    yetkiler.yetki
                    '
                )
                ->from('account')
                ->join('users','account.id = users.user_accountId')
                ->join('yetkiler','yetkiler.id = account.yetki')
                ->where('users.user_accountId',$loginID)
                ->get()
                ->result();
    }
}