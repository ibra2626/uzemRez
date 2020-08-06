<?php
class RandevuKontrol_Model extends CI_Model{
    function kontrol(){
        $today = date('Y-m-d');
        date_default_timezone_set("Europe/Istanbul");
        $nowTime = date('H:i');
        $randevular = $this->db
            ->get('randevu')
            ->result();
        foreach ($randevular as $randevu){
            if ($today > $randevu->tarih){
                $this->db
                    ->set('durum',1)
                    ->where('durum',0)
                    ->where('tarih',$randevu->tarih)
                    ->where('saat',$randevu->saat)
                    ->update('randevu');
                $this->db
                    ->set('durum',6)
                    ->set('tamamlandi',3)
                    ->where('RandevuID',$randevu->RandevuID)
                    ->where('teslimAlma_Tarih',null)
                    ->update('optikislem');
            }
            else if($today == $randevu->tarih){
                if ($nowTime > $randevu->saat){
                    $this->db
                        ->set('durum',1)
                        ->where('durum',0)
                        ->where('tarih',$randevu->tarih)
                        ->where('saat',$randevu->saat)
                        ->update('randevu');
                }
                $this->db
                    ->set('durum',6)
                    ->set('tamamlandi',3)
                    ->where('RandevuID',$randevu->RandevuID)
                    ->where('teslimAlma_Tarih',null)
                    ->update('optikislem');
            }
        }
    }
}
