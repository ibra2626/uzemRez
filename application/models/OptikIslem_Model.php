<?php
class OptikIslem_Model extends CI_Model{
    function __construct()
    {
        parent::__construct();

    }
    function getAllOptik(){
//                    SELECT
//            u.user_ad,
//            u.user_soyad,
//            bl.bolum_ad,
//            br.birim_ad,
//            o.startDate,
//            o.finishDate,
//            o.`okundu/okunmadi`
//            FROM
//            optikislem AS o
//            INNER JOIN users AS u ON u.user_id = o.hocaID
//            INNER JOIN birim AS br ON br.birim_id = u.user_birimId
//            INNER JOIN bolum AS bl ON bl.bolum_id = o.bolumID

        $query = $this
                    ->db
                    ->select('
                                optikislem.optikID,
                                users.user_id,
                                users.user_ad,
                                users.user_soyad,
                                bolum.bolum_ad,
                                birim.birim_ad,
                                optikislem.startDate,
                                optikislem.teslimAlma_Tarih,
                                optikislem.okundu_Tarih,
                                optikislem.finishDate,
                                optikislem.durum,
                                optikislem.RandevuID,
                                optikislem.notYuklemeDurumu,
                                optikislem.tamamlandi,
                                optikislem.optik_sayisi,
                                randevu.saat,
                                optikislem.hocaID
                                ')
                    ->from('optikislem')
                    ->join('users','users.user_id = optikislem.hocaID')
                    ->join('birim','birim.birim_id = optikislem.BirimID')
                    ->join('bolum','bolum.bolum_id = optikislem.bolumID')
                    ->join('randevu','randevu.RandevuID = optikislem.RandevuID')
                    ->get()
                    ->result();
        return $query;
    }
    public function okunanOptikGet(){
        $query = $this
            ->db
            ->select('
                                users.user_ad,
                                users.user_soyad,
                                bolum.bolum_ad,
                                birim.birim_ad,
                                optikislem.startDate,
                                optikislem.finishDate
                                ')
            ->from('optikislem')
            ->join('users','users.user_id = optikislem.hocaID')
            ->join('birim','birim.birim_id = users.user_birimId')
            ->join('bolum','bolum.bolum_id = optikislem.bolumID')
            ->where('optikislem.tamamlandi = 1')
            ->get()
            ->result();
        return $query;
    }
    public function bekleyenOptikGet(){
        $query = $this
            ->db
            ->select('
                                users.user_ad,
                                users.user_soyad,
                                bolum.bolum_ad,
                                birim.birim_ad,
                                optikislem.startDate,
                                optikislem.finishDate,
                                ')
            ->from('optikislem')
            ->join('users','users.user_id = optikislem.hocaID')
            ->join('birim','birim.birim_id = users.user_birimId')
            ->join('bolum','bolum.bolum_id = optikislem.bolumID')
            ->where('optikislem.tamamlandi = 0')
            ->get()
            ->result();
        return $query;
    }
    public function optikAksiyon($optikID,$durum,$tarih,$randevuID=''){
        if ($durum == 2){
        $this->db
            ->where('optikID',$optikID)
            ->set('durum',$durum)
            ->set('teslimAlma_Tarih',$tarih)
            ->update('optikislem');
        $this->db
            ->where('optik_id',$optikID)
            ->set('teslimAlanID',$this->session->userdata('user_id'))
            ->update('optikdegisiklikleri');
        $this->db
            ->where('RandevuID',$randevuID)
            ->set('durum',3)
            ->update('randevu');
        }
        elseif($durum == 3){
            $this->db
                ->where('optikID',$optikID)
                ->set('durum',$durum)
                ->set('okundu_Tarih',$tarih)
                ->set('tamamlandi',1)
                ->update('optikislem');
            $this->db
                ->where('optik_id',$optikID)
                ->set('okuyanID',$this->session->userdata('user_id'))
                ->update('optikdegisiklikleri');
        }
        elseif($durum == 4){
            $this->db
                ->where('optikID',$optikID)
                ->set('durum',$durum)
                ->set('finishDate',$tarih)
                ->update('optikislem');
            $this->db
                ->where('optik_id',$optikID)
                ->set('teslimEdenID',$this->session->userdata('user_id'))
                ->update('optikdegisiklikleri');
            $this->db
                ->where('RandevuID',$randevuID)
                ->set('durum',2)
                ->update('randevu');
        }
    }
    public function optikAksiyonIptal($optikID,$durum){
        if ($durum == 0){
            $this->db
                ->where('optikID',$optikID)
                ->set('durum',$durum)
                ->set('teslimAlma_Tarih',null)
                ->update('optikislem');
            $this->db
                ->where('optik_id',$optikID)
                ->set('teslimAlanID',null)
                ->update('optikdegisiklikleri');
        }
        elseif($durum == 2){
            $this->db
                ->where('optikID',$optikID)
                ->set('durum',$durum)
                ->set('okundu_Tarih',null)
                ->update('optikislem');
            $this->db
                ->where('optik_id',$optikID)
                ->set('okuyanID',null)
                ->update('optikdegisiklikleri');
        }
        elseif($durum == 3){
            $this->db
                ->where('optikID',$optikID)
                ->set('durum',$durum)
                ->set('finishDate',null)
                ->set('tamamlandi',0)
                ->update('optikislem');
            $this->db
                ->where('optik_id',$optikID)
                ->set('teslimEdenID',null)
                ->update('optikdegisiklikleri');
        }
    }
    public function optikSil($optikID,$RandevuID){
        $this->db
            ->where('optik_id',$optikID)
            ->delete('optikdegisiklikleri');
        $this->db
            ->where('optikID',$optikID)
            ->delete('optikislem');

    }
    public function randevuKontrol($RandevuID){
        $randevuKontrol =  $this->db
            ->where('optikislem.durum',0)
            ->where('RandevuID',$RandevuID)
            ->get('optikislem')
            ->result();
        if (!$randevuKontrol){
            $this->db
                ->where('RandevuID',$RandevuID)
                ->set('userID',null)
                ->update('randevu');
        }
    }
    public function dosyaIsmiKaydet($optik_id,$dosya_ad,$hocaID){
        $dosyaKaydet = $this->db
            ->set('optik_id',$optik_id)
            ->set('dosya_ad',$dosya_ad)
            ->set('hocaID',$hocaID)
            ->insert('upload');
        if ($dosyaKaydet){
            $this->db
                ->where('optikID',$optik_id)
                ->set('notYuklemeDurumu',1)
                ->update('optikislem');
        }

    }
    public function dosyaGoster($optik_id){
        $dosya = new stdClass();
        return $dosya->rows = $dosyaGoster = $this->db
            ->select('dosya_ad')
            ->from('upload')
            ->where('optik_id',$optik_id)
            ->get()
            ->result();
    }
    public function dosyaSil($optik_id){

          $dosyadelete = $this->db
            ->where('optik_id',$optik_id)
            ->delete('upload');
          if ($dosyadelete){
              $this->db
                  ->where('optikID',$optik_id)
                  ->set('notYuklemeDurumu',0)
                  ->update('optikislem');
          }

    }
    public function optikMailBilgiCek($optikID){
//        SELECT
//            account.email,
//            bolum.bolum_ad,
//            birim.birim_ad,
//            optikislem.startDate,
//            optikislem.optik_sayisi
//            FROM
//            users
//            INNER JOIN optikislem ON optikislem.hocaID = users.user_id
//            INNER JOIN account ON users.user_accountId = account.id
//            INNER JOIN bolum ON bolum.bolum_id = optikislem.bolumID
//            INNER JOIN birim ON users.user_birimId = birim.birim_id
//            WHERE
//            optikislem.optikID = 3
        return $this
            ->db
            ->select('
                    account.email,
                    birim.birim_ad,
                    bolum.bolum_ad,
                    optikislem.optik_sayisi,
                    optikislem.startDate
                    ')
            ->from('users')
            ->join('optikislem','optikislem.hocaID = users.user_id')
            ->join('account','users.user_accountId = account.id')
            ->join('bolum','bolum.bolum_id = optikislem.bolumID')
            ->join('birim','users.user_birimId = birim.birim_id')
            ->where('optikislem.optikID',$optikID)
            ->get()
            ->result();
    }
    public function dosyaIsmiCek(){
        return $this->db
            ->get('upload')
            ->result();
    }
}