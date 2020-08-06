<?php
class AdminAyar_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }
    public function DBTarihKaydet($dataDate,$dataTime){
        $dataArr = array('tarih' => $dataDate,'saat'=>$dataTime);
        if (!empty($dataDate)){
            $this->db
            ->set($dataArr)
            ->insert('randevu');
        }
    }
    public function DBTarihSaatKontrol($dataDate,$dataTime){
         $whereArray = array(
          'tarih =' => $dataDate,
          'saat =' => $dataTime
        );
        $query = $this->db
                      ->where($whereArray)
                      ->get('randevu',1)
                      ->result();
        return  $query;
    }
    public function getDBRows($tablo){
        $rows = $this->db
            ->get($tablo)
            ->result();
        return $rows;
    }
    public  function delete($id,$tablo,$sutunAdi){
        $this->db
            ->where($sutunAdi,$id)
            ->delete($tablo);
    }
    public function getDBRowsDistDay($tablo){

        return $rows = $this->db
            ->distinct()
            ->get($tablo)
            ->result();
    }

    public  function TekSaatSil($tarih,$saat,$tablo,$sutunAdi1,$sutunAdi2){
        $this->db
            ->where($sutunAdi1,$tarih)
            ->where($sutunAdi2,$saat)
            ->delete($tablo);
    }
    public function birimEkle($birim_ad){
        if ($birim_ad == ''){
            return 0;
        }
        $kontrol = $this->db
            ->where('birim_ad',$birim_ad)
            ->get('birim')
            ->result();
        if (!empty($kontrol)){
            return 1;
        }
        else{
            $this->db
                ->set('birim_ad',$birim_ad)
                ->insert('birim');
            return 2;
        }
    }
    public function birimSil($birim_id){
        $this->db
            ->where('birim_id',$birim_id)
            ->delete('birim');
        $this->db
            ->where('birim_id',$birim_id)
            ->delete('bolum');
    }
    public function bolumEkle($birim_id,$bolum_ad){
        if ($bolum_ad == '' OR $birim_id == ''){
            return 0;
        }
        $kontrol = $this->db
            ->where('birim_id',$birim_id)
            ->where('bolum_ad',$bolum_ad)
            ->get('bolum')
            ->result();
        if (!empty($kontrol)){
            return 1;
        }
        else{
            $this->db
                ->set('birim_id',$birim_id)
                ->set('bolum_ad',$bolum_ad)
                ->insert('bolum');
            return 2;
        }
    }
    public function bolumSil($bolum_id,$birim_id){
        if ($birim_id == '' OR $bolum_id == ''){
            return 0;
        }
        $this->db
            ->where('bolum_id',$bolum_id)
            ->where('birim_id',$birim_id)
            ->delete('bolum');
        return 1;
    }
    public function birimIDCek($birim_ad){
        $result = $this->db
            ->where('birim_ad',$birim_ad)
            ->get('birim')
            ->result();
        return $result[0]->birim_id;
    }
    public function unvanEkle($unvan){
        if ($unvan == ''){
            return 0;
        }
        $kontrol = $this->db
            ->where('unvan_ad',$unvan)
            ->get('unvan')
            ->result();
        if (!empty($kontrol)){
            return 1;
        }
        else{
            $this->db
                ->set('unvan_ad',$unvan)
                ->insert('unvan');
            return 2;
        }
    }
    public function unvanSil($unvan_id){
        $this->db
            ->where('unvan_id',$unvan_id)
            ->delete('unvan');
        $this->db
            ->where('unvan_id',$unvan_id)
            ->delete('unvan');
    }
    public function topluSilme($tablo){
        $this->db
            ->truncate($tablo);
    }

    public function import_Birim($data){
        $eklenen = 0;
        $eklenemeyen = 0;
        foreach ($data as $birim){
            $birimDBkontol = $this->db
                ->where('birim_ad',$birim["birim_ad"])
                ->get('birim')
                ->result();
            if (empty($birimDBkontol)){
                $this->db
                    ->set('birim_ad',$birim["birim_ad"])
                    ->insert('birim');
                $eklenen++;
            }
            else
                $eklenemeyen++;

        }
        echo $eklenen;
    }
    public function import_Bolum($data){
        $eklenen = 0;
        foreach ($data as $birim){
            $birimDBkontol = $this->db
                ->where('birim_id',$birim["birim_id"])
                ->where('bolum_ad',$birim["bolum_ad"])
                ->get('bolum')
                ->result();
            if (empty($birimDBkontol)){
                $this->db
                    ->set('bolum_ad',$birim["bolum_ad"])
                    ->set('birim_id',$birim["birim_id"])
                    ->insert('bolum');
                $eklenen++;
            }

        }
        echo $eklenen;
    }
    public function import_Unvan($data){
        $eklenen = 0;
        foreach ($data as $birim){
            $birimDBkontol = $this->db
                ->where('unvan_ad',$birim["unvan_ad"])
                ->get('unvan')
                ->result();
            if (empty($birimDBkontol)){
                $this->db
                    ->set('unvan_ad',$birim["unvan_ad"])
                    ->insert('unvan');
                $eklenen++;
            }

        }
        echo $eklenen;
    }

}