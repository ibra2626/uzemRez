<?php
class Randevu_Model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function getDBRowsDistDay($tablo,$today){


        return $rows = $this->db
            ->distinct()
            ->where('durum',0)
            ->where('tarih >=',$today)
            ->get($tablo)
            ->result();
    }
    public function bolumCek($birim_id){
        return $this->db
            ->select('
            bolum_id,
            bolum_ad
            ')
            ->where('birim_id',$birim_id)
            ->get('bolum')
            ->result();
    }
    public function randevuOlustur($tarih,$saat,$hocaID,$birimID,$bolumID,$optikSayisi){
        $randevuDoldur = $this->db
            ->where('tarih',$tarih)
            ->where('saat',$saat)
            ->set('userID',$hocaID)
            ->update('randevu');

        $randevuID = $this->db
            ->select('RandevuID')
            ->from('randevu')
            ->where('tarih',$tarih)
            ->where('saat',$saat)
            ->where('userID',$hocaID)
            ->limit(1)
            ->get()
            ->result();
        foreach($randevuID as $id){
            $optikIslemArr = array(
                'birimID' => $birimID,
                'bolumID' => $bolumID,
                'optik_sayisi' => $optikSayisi,
                'startDate' => $tarih,
                'hocaID' => $hocaID,
                'randevuID' => $id->RandevuID
            );
            $optikIslemDoldur = $this->db
                ->set($optikIslemArr)
                ->insert('optikislem');
        }


        $optikIDCek = $this->db
            ->select(
                'optikID'
            )
            ->from('optikislem')
            ->order_by("optikID","desc")
            ->limit(1)
            ->get()
            ->result();
        foreach($optikIDCek as $item){
            $optikDegisiklikIDArr = array(
                'optik_id' => $item->optikID
            );
            $optikArr=array('optikID'=>$item->optikID);
            $this->db
                ->set($optikDegisiklikIDArr)
                ->insert('optikdegisiklikleri');
        }
        $optikIDCek = $this->db
            ->select(
                'optikID'
            )
            ->from('optikislem')
            ->order_by("optikID","desc")
            ->limit(1)
            ->get()
            ->result();
    }
    public function degisiklik(){

    }
    public function randevuCek($hocaID){
//        SELECT
//            optikislem.hocaID,
//            optikislem.startDate,
//            optikislem.optik_sayisi,
//            optikislem.finishDate,
//            bolum.bolum_ad,
//            birim.birim_ad
//            FROM
//            optikislem
//            INNER JOIN birim ON optikislem.BirimID = birim.birim_id
//            INNER JOIN bolum ON optikislem.bolumID = bolum.bolum_id
        return $this->db
            ->select(
                '
                optikislem.hocaID,
                optikislem.startDate,
                optikislem.optik_sayisi,
                optikislem.finishDate,
                bolum.bolum_ad,
                birim.birim_ad,
                optikislem.tamamlandi
                ')
            ->from('optikislem')
            ->join('birim','birim.birim_id = optikislem.BirimID')
            ->join('bolum','bolum.bolum_id = optikislem.bolumID')
            ->where('optikislem.hocaID',$hocaID)
            ->where('optikislem.finishDate',null)
            ->where('optikislem.tamamlandi', 0)
            ->where('optikislem.durum < ', 5)
            ->get()
            ->result();
    }
    public function randevuSil_OptikCek($hocaID,$today){
        return $this->db
            ->select(
                '
                randevu.saat,
                randevu.tarih,
                randevu.RandevuID,
                randevu.durum
                ')
            ->from('randevu')
            ->where('randevu.userID',$hocaID)
            ->where('randevu.tarih >=',$today)
            ->where('durum',0)
            ->get()
            ->result();
    }
    public function optikSil($optikID,$randevuID){
        $this->db
            ->set('userID',null)
            ->where('RandevuID',$randevuID)
            ->update('randevu');
        $this->db
            ->set('tamamlandi',2)
            ->set('durum',5)
            ->where('RandevuID',$randevuID)
            ->where('optikID',$optikID)
            ->update('optikislem');
    }
    public function randevuSil($randevuID){
        $this->db
            ->set('userID',null)
            ->set('durum',0)
            ->where('RandevuID',$randevuID)
            ->update('randevu');
        $this->db
            ->set('tamamlandi',2)
            ->set('durum',5)
            ->where('RandevuID',$randevuID)
            ->update('optikislem');
    }
    public function randevuGecmisCek($hocaID){
        return $this->db
            ->where('userID',$hocaID)
            ->get('randevu')
            ->result();
    }
    public function MailCek($hocaID){
//        SELECT
//        account.email
//        FROM
//        users
//        INNER JOIN account ON users.user_accountId = account.id
//        WHERE users.user_id = 47
        return $this->db
            ->select('account.email')
            ->from('users')
            ->join('account','users.user_accountId = account.id')
            ->where('users.user_id',$hocaID)
            ->get()
            ->result();
    }

}
