<?php
class KullaniciOptik_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }
    public function okunanOptikGet($user_id){
//        SELECT
//            users.user_id,
//            optikislem.hocaID,
//            optikislem.durum,
//            optikislem.optik_sayisi,
//            optikislem.startDate,
//            optikislem.finishDate,
//            birim.birim_ad,
//            bolum.bolum_ad
//            FROM
//            users
//            INNER JOIN optikislem ON users.user_id = optikislem.hocaID
//            INNER JOIN birim ON users.user_birimId = birim.birim_id
//            INNER JOIN bolum ON optikislem.bolumID = bolum.bolum_id
//            WHERE optikislem.durum = 1 AND users.user_id=1
        return $query = $this
            ->db
            ->select('
                    optikislem.optikID,
                    users.user_id,
                    optikislem.hocaID,
                    optikislem.tamamlandi,
                    optikislem.optik_sayisi,
                    optikislem.startDate,
                    optikislem.teslimAlma_Tarih,
                    optikislem.finishDate,
                    optikislem.durum,
                    birim.birim_ad,
                    bolum.bolum_ad,
                    optikislem.randevuID
                    
                    ')
            ->from('users')
            ->join('optikislem','users.user_id = optikislem.hocaID')
            ->join('birim','optikislem.BirimID = birim.birim_id')
            ->join('bolum','optikislem.bolumID = bolum.bolum_id')
            ->where('optikislem.hocaID',$user_id)
            ->get()
            ->result();
    }
    public function notindir($optikID){
        return $this->db
                ->select('
                    hocaID,
                    dosya_ad
                ')
                ->from('upload')
                ->where('optik_id',$optikID)
                ->get()
                ->result();
    }
    public function teslimEdilen_EdilmeyenOptik($durum,$hocaID){
        return $this->db
            ->where('durum =',$durum)
            ->where('hocaID',$hocaID)
            ->count_all_results('optikislem');
    }
}