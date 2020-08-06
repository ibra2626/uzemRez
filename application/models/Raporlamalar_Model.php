<?php
class Raporlamalar_Model extends CI_Model
{
    function toplamOptik($baslangicTarih,$bitisTarih,$tamamlandi,$bolum_id = ""){
        if ($bolum_id == "")
        {
            return $this->db
                ->select_sum('optik_sayisi')
                ->where('startDate >=',$baslangicTarih)
                ->where('startDate <=',$bitisTarih)
                ->where('tamamlandi',$tamamlandi)
                ->get('optikislem')
                ->result();
        }
        else{
            return $this->db
                ->select_sum('optik_sayisi')
                ->where('startDate >=',$baslangicTarih)
                ->where('startDate <=',$bitisTarih)
                ->where('tamamlandi',$tamamlandi)
                ->where('bolumID',$bolum_id)
                ->get('optikislem')
                ->result();
        }

    }
    function toplamOptikRapor($baslangicTarih,$bitisTarih,$bolum_id = ""){
        if ($bolum_id == ""){
        return $this->db
            ->select_sum('optik_sayisi')
            ->where('startDate >=',$baslangicTarih)
            ->where('startDate <=',$bitisTarih)
            ->where('tamamlandi>=',0)
            ->where('tamamlandi<=',1)
            ->get('optikislem')
            ->result();
        }
        else{
            return $this->db
                ->select_sum('optik_sayisi')
                ->where('startDate >=',$baslangicTarih)
                ->where('startDate <=',$bitisTarih)
                ->where('tamamlandi>=',0)
                ->where('tamamlandi<=',1)
                ->where('bolumID',$bolum_id)
                ->get('optikislem')
                ->result();
        }
    }
    function tarihArasiIslem($baslangicTarih,$bitisTarih,$bolum_id = ""){
        if($bolum_id == ""){
            return $this->db
            ->select('
                    optikislem.optikID,
                    optikislem.optik_sayisi,
                    optikislem.teslimAlma_Tarih,
                    optikislem.okundu_Tarih,
                    optikislem.startDate,
                    optikislem.finishDate,
                    users.user_ad,
                    users.user_soyad,
                    birim.birim_ad,
                    bolum.bolum_ad,
                    optikdurum.durumBilgisi
            ')
            ->from('optikislem')
            ->join('bolum','bolum.bolum_id = optikislem.bolumID')
            ->join('birim','birim.birim_id = optikislem.birimID')
            ->join('users','users.user_id = optikislem.hocaID')
            ->join('optikdurum','optikdurum.id = optikislem.durum')
            ->where('optikislem.startDate >=',$baslangicTarih)
            ->where('optikislem.startDate <=',$bitisTarih)
            ->get()
            ->result();
        }
        else{
            return $this->db
                ->select('
                    optikislem.optikID,
                    optikislem.optik_sayisi,
                    optikislem.teslimAlma_Tarih,
                    optikislem.okundu_Tarih,
                    optikislem.startDate,
                    optikislem.finishDate,
                    users.user_ad,
                    users.user_soyad,
                    birim.birim_ad,
                    bolum.bolum_ad,
                    optikdurum.durumBilgisi
            ')
                ->from('optikislem')
                ->join('bolum','bolum.bolum_id = optikislem.bolumID')
                ->join('birim','birim.birim_id = optikislem.birimID')
                ->join('users','users.user_id = optikislem.hocaID')
                ->join('optikdurum','optikdurum.id = optikislem.durum')
                ->where('optikislem.startDate >=',$baslangicTarih)
                ->where('optikislem.startDate <=',$bitisTarih)
                ->where('optikislem.bolumID',$bolum_id)
                ->get()
                ->result();
        }

    }
    function okumaYapan($optikID){
        return $this->db
            ->select('
                 users.user_ad,
                users.user_soyad')
            ->from('optikdegisiklikleri')
            ->join('users','optikdegisiklikleri.okuyanID = users.user_id')
            ->where('optikdegisiklikleri.optik_id',$optikID)
            ->get()
            ->result();
    }
    function teslimAlan($optikID){
        return $this->db
            ->select('
                 users.user_ad,
                users.user_soyad')
            ->from('optikdegisiklikleri')
            ->join('users','optikdegisiklikleri.teslimAlanID = users.user_id')
            ->where('optikdegisiklikleri.optik_id',$optikID)
            ->get()
            ->result();

    }
    function teslimEden($optikID){
        return $this->db
            ->select('users.user_ad,users.user_soyad')
            ->from('optikdegisiklikleri')
            ->join('users','users.user_id = optikdegisiklikleri.teslimEdenID')
            ->where('optikdegisiklikleri.optik_id',$optikID)
            ->get()
            ->result();
    }
    function OptikBilgiCek($baslangicTarih,$bitisTarih,$bolumID = ""){
        if ($bolumID == ""){
            return $this->db
                ->select('
                optikislem.startDate,
                optikislem.finishDate,
                optikislem.optik_sayisi,
                bolum.bolum_ad,
                birim.birim_ad,
                users.user_ad,
                users.user_soyad,
                optikdurum.durumBilgisi
                ')
                ->from('optikislem')
                ->join('bolum','bolum.bolum_id = optikislem.bolumID')
                ->join('birim','birim.birim_id = optikislem.birimID')
                ->join('users','users.user_id = optikislem.hocaID')
                ->join('optikdurum','optikdurum.id = optikislem.durum')
                ->where('optikislem.startDate >=',$baslangicTarih)
                ->where('optikislem.startDate <=',$bitisTarih)
                ->get()
                ->result();
        }
        else{
            return $this->db
                ->select('
                optikislem.startDate,
                optikislem.finishDate,
                optikislem.optik_sayisi,
                bolum.bolum_ad,
                birim.birim_ad,
                users.user_ad,
                users.user_soyad,
                optikdurum.durumBilgisi
                ')
                ->from('optikislem')
                ->join('bolum','bolum.bolum_id = optikislem.bolumID')
                ->join('birim','birim.birim_id = optikislem.birimID')
                ->join('users','users.user_id = optikislem.hocaID')
                ->join('optikdurum','optikdurum.id = optikislem.durum')
                ->where('optikislem.startDate >=',$baslangicTarih)
                ->where('optikislem.startDate <=',$bitisTarih)
                ->where('optikislem.bolumID',$bolumID)
                ->get()
                ->result();
        }
    }
    function bolumGetir($bolumId){
        return $this->db
             ->where('bolum_id',$bolumId)
            ->get('bolum')
            ->result();
    }
}
