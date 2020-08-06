<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayarlar_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminAyar_Model');
        $this->load->model('kullanici/Randevu_Model');
        $this->load->library('excel');
        //Session Kontrolü helper
        session_Control();

    }

    public function index()
    {
        $this->TarihSaatAyarla();
    }

    public function TarihSaatAyarla()
    {

        $this->load->view('ayar_date',array(
            'dbActiveDay' => $this->AktifTarihTablo(),
            'dbActiveHours' => $this->AktifSaatTablo()
        ));
    }


    public function GenelAyar()
    {
        $this->load->view('GenelAyar',array(
            'dropdown_birim' => dropDown('birim'),
            'dropdown_unvan' => dropDown('unvan')
        ));
    }

    /**
     * bolumGoster() => Birim seçildiğinde bölümün değişmesi için bu fonksiyon kullanılıyor.
     * Fonksiyon ajax ile çağrıldığı için json_encode ile değerler geri gönderiliyor.
     * Ajax kodları includes/include_script içerisinde bulunmaktadır.
     */
    public function bolumGoster(){
        $birim_id = $this->input->post('birim_id');

        $bolumler = $this->Randevu_Model->bolumCek($birim_id);
        echo json_encode($bolumler);
    }
    public function birimEkle(){
        $birim_ad = $this->input->post('birimad');
        $kontrol = $this->AdminAyar_Model->birimEkle($birim_ad);
        if ($kontrol == 0){
            $this->session->set_userdata("hata",'Boş Değer Göndermeyiniz.');
            $this->session->mark_as_temp("hata", 5);
            redirect(base_url('Ayarlar_admin/GenelAyar'));
        }
        elseif($kontrol == 1)
        {
            $this->session->set_userdata("hata",'Bu birim sistemde bulunuyor!');
            $this->session->mark_as_temp("hata", 5);
            redirect(base_url('Ayarlar_admin/GenelAyar'));
        }
        else
        {
            $this->session->set_userdata("eklendi",'Birim başarıyla eklendi.');
            $this->session->mark_as_temp("eklendi", 5);
            redirect(base_url('Ayarlar_admin/GenelAyar'));
        }

    }
    public function birimSil(){
        $birim_id = $this->input->post('birimSil');
        $this->AdminAyar_Model->birimSil($birim_id);
        $this->session->set_userdata("silindi",'birim silindi.');
        $this->session->mark_as_temp("silindi", 5);
        redirect(base_url('Ayarlar_admin/GenelAyar'));

    }
    public function bolumEkle(){
        $birim_id = $this->input->post('bolumEkleBirimSec');
        $bolum_ad = $this->input->post('bolumad');

        $kontrol = $this->AdminAyar_Model->bolumEkle($birim_id,$bolum_ad);
        if ($kontrol == 0){
            $this->session->set_userdata("hata",'Boş Değer Göndermeyiniz.');
            $this->session->mark_as_temp("hata", 5);
            redirect(base_url('Ayarlar_admin/GenelAyar'));
        }
        elseif($kontrol == 1)
        {
            $this->session->set_userdata("hata",'Bu birimde eklenmek istenen bölüm zaten var');
            $this->session->mark_as_temp("hata", 5);
            redirect(base_url('Ayarlar_admin/GenelAyar'));
        }
        else
        {
            $this->session->set_userdata("eklendi",'Bolum başarıyla eklendi.');
            $this->session->mark_as_temp("eklendi", 5);
            redirect(base_url('Ayarlar_admin/GenelAyar'));
        }
    }
    public function bolumSil(){
        $bolum_id = $this->input->post('bolumSil');
        $birim_id = $this->input->post('bolumSilBirimSec');

        $kontrol = $this->AdminAyar_Model->bolumSil($bolum_id,$birim_id);
        if ($kontrol == 0){

            $this->session->set_userdata("hata","Lütfen Seçim Yapınız.");
            $this->session->mark_as_temp("hata", 15);
            redirect(base_url('Ayarlar_admin/GenelAyar'));
        }
        else{

            $this->session->set_userdata("silindi",'Bölüm başarıyla silindi.');
            $this->session->mark_as_temp("silindi", 15);
            redirect(base_url('Ayarlar_admin/GenelAyar'));
        }

    }
    public function unvanEkle()
    {
        $unvan_ad = $this->input->post('unvanAd');
        $kontrol = $this->AdminAyar_Model->unvanEkle($unvan_ad);
        if ($kontrol == 0) {
            $this->session->set_userdata("hata", 'Boş Değer Göndermeyiniz.');
            $this->session->mark_as_temp("hata", 5);
            redirect(base_url('Ayarlar_admin/GenelAyar'));
        } elseif ($kontrol == 1) {
            $this->session->set_userdata("hata", 'Bu ünvan sistemde bulunuyor!');
            $this->session->mark_as_temp("hata", 5);
            redirect(base_url('Ayarlar_admin/GenelAyar'));
        } else {
            $this->session->set_userdata("eklendi", 'Ünvan başarıyla eklendi.');
            $this->session->mark_as_temp("eklendi", 5);
            redirect(base_url('Ayarlar_admin/GenelAyar'));
        }
    }
    public function unvanSil(){
            $unvan_id = $this->input->post('unvanSil');
            $this->AdminAyar_Model->unvanSil($unvan_id);
            $this->session->set_userdata("silindi",'Ünvan silindi.');
            $this->session->mark_as_temp("silindi", 5);
            redirect(base_url('Ayarlar_admin/GenelAyar'));

        }

    /**
     * post edilen selected_dateRange id'sine sahip inputtan tarih alınır.
     * tarihye "-" olan yerler "/" ile değiştirilir.Bu database formatına uygun olması için yapılan işlemdir.
     *
     * Yeni oluşturulan tarih tekrar DateTime tipine çevrilir.2 tarih arasındaki tüm tarihleri almak için DatePeriod fonksiyonu kullanılır
     *
     * Daha sonra tarihler veritabanına kaydedilir.
     */
    public function TarihSaatSec()
    {
        // TARİH İLE İLGİLİ KODLAR
        $select_Date = explode("-", $this->input->post('selected_dateRange'));

        $startDateArr = explode("/", $select_Date[0]);
        $finishDateArr = explode("/", $select_Date[1]);

        $startDateStr = trim($startDateArr[2]) . "-" . trim($startDateArr[1]) . "-" . trim($startDateArr[0]);
        $finishDateStr = trim($finishDateArr[2]) . "-" . trim($finishDateArr[1]) . "-" . trim($finishDateArr[0]);

        $startDate = new DateTime($startDateStr);
        $finishDate = new DateTime(date('Y-m-d',strtotime("1 Day",strtotime($finishDateStr))));

        $interval = DateInterval::createFromDateString("1 day");
        $period = new DatePeriod($startDate, $interval, $finishDate);

        $weekendCtrlArr = array();
        foreach ($period as $date) {
                if (($this->WeekDayDisable($date->format("Y-m-d"))) != '' ) {
                    array_push($weekendCtrlArr, $this->WeekDayDisable($date->format("Y-m-d")));
                }
            }

        // SAAT İLE İLGİLİ KODLAR VE FONKSİYONLAR

        $returnTimesArr = $this->timeRangeCreate('startTime','finishTime');

        // RANDEVU ALINABİLECEK TARİH VE SAATLERİ DB'E YAZDIRMA

        $basariylaEklenen = 0;
        foreach ($weekendCtrlArr as $CtrlDate) {
            foreach ($returnTimesArr as $hours){
                $dbKontrol = $this->AdminAyar_Model->DBTarihSaatKontrol($CtrlDate,$hours);
                if (empty($dbKontrol)){
                        $this->AdminAyar_Model->DBTarihKaydet($CtrlDate,$hours);
                }

                else{
                    $this->session->set_flashdata('dbkontrol','Seçilen tarih zaten aktif!'.'<br>'.$CtrlDate.' '.$hours);
                }
            }
            $basariylaEklenen++;
        }
        $this->session->set_flashdata('successAdd',$basariylaEklenen.' tarih başarıyla eklendi');
        redirect(base_url('Ayarlar_admin/TarihSaatAyarla'));
    }
    public function WeekDayDisable($date)
    {

        $weekendDate = new DateTime($date);
        if ($weekendDate->format("w") != 6 AND $weekendDate->format("w") != 0) {
            return $date;
        }
    }

    public function timeRangeCreate($startPostName,$finishPostName)
    {
        $startTimeStr = explode(':', $this->input->post($startPostName));
        $finishTimeStr = explode(':', $this->input->post($finishPostName));

        $startHourStr = $startTimeStr[0];
        $startMinStr = $startTimeStr[1];

        $finishHourStr = $finishTimeStr[0];
        $finishMinStr = $finishTimeStr[1];

        $timeStartUnix = mktime($startHourStr, $startMinStr);
        $timeFinishUnix = mktime($finishHourStr, $finishMinStr);

        return $this->OneHourInsert($timeStartUnix, $timeFinishUnix);
    }

    public function OneHourInsert($startUnix, $finishUnix, $value = true)
    {
        $hoursArr=array();
        if ($startUnix == $finishUnix) {
            array_push($hoursArr,date('H:i', $startUnix));
            return $hoursArr;
        }
        elseif($startUnix > $finishUnix){
            $this->session->set_flashdata('dbkontrol','Başlangıç saati bitiş saatinden büyük olamaz!');
        }
        else {
            while ($value) {
                if (date('H:i', $startUnix)!='13:00' AND date('H:i', $startUnix)!='13:30')
                    array_push($hoursArr, date('H:i', $startUnix));
                $startUnix += +3600;
                if (date('H:i', $startUnix) > date('H:i', $finishUnix)) {
                    $value = false;
                }
             }
            return $hoursArr;
        }
    }
    public function AktifTarihTablo(){
        $DBActiveDay = new stdClass();
        $DBActiveDay->rows =$this->AdminAyar_Model->getDBRowsDistDay('randevu');
        return $DBActiveDay;
    }
    public function AktifSaatTablo(){
        $DBActiveHour = new stdClass();
        $DBActiveHour->rows =$this->AdminAyar_Model->getDBRows('randevu');
        return $DBActiveHour;
    }
    public function TarihSil($id){
        $this->AdminAyar_Model->delete($id,'randevu','tarih');
        redirect(base_url('Ayarlar_admin/TarihSaatAyarla'));
    }
    public function TekSaatSil(){
        $tarih = $this->uri->segment(3);
        $saat = $this->uri->segment(4);

        $this->AdminAyar_Model->TekSaatSil($tarih,$saat,'randevu','tarih','saat');
        redirect(base_url('Ayarlar_admin/TarihSaatAyarla'));
    }
    public function TekSaatEkle()
    {
        $date = $this->input->post('tarih');
        $hours = $this->input->post('tekSaat');
            $dbKontrol = $this->AdminAyar_Model->DBTarihSaatKontrol($date, $hours);
            if (empty($dbKontrol)) {
                $this->AdminAyar_Model->DBTarihKaydet($date, $hours);
                $this->session->set_flashdata('successAdd', 'Saat'.' '.$hours .' '.'başarıyla eklendi.' );
            } else {
                $this->session->set_flashdata('dbkontrol', 'Seçilen saat zaten aktif!' . '<br>' . $date . ' ' . $hours);
            }

            redirect(base_url('Ayarlar_admin/TarihSaatAyarla'));

    }


    /**
     * Birimi/Bölümü toplu eklemek için kullanılan fonksiyonlar.
     * Kullanılan Kütüphane  => PHPEXCEL
     *
     * Toplu ekleme yapmak için excel dosyasının içeriğin de birim adları "A" Kolonunda bolum adları ise "B" Kolonunda bulunmalıdır.
     *
     *Ünvan eklemek için ise ayrı bir excel dosyası olmalıdır.Bu excel dosyasında ise ünvan adları "A" kolonunda olmalıdır.
     */

    public function import_birim(){
        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++)
                {
                    $birimAd = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $data[] = array(
                        'birim_ad' => $birimAd
                    );
                }
            }
            $this->AdminAyar_Model->import_Birim($data);
            echo ' adet fakülte eklendi!';
        }

    }
    public function import_bolum(){
        if(isset($_FILES["fileBolum"]["name"]))
        {

            $path = $_FILES["fileBolum"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++)
                {
                    $birim_ad= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $bolum_ad = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $data[] = array(

                        'birim_id' => $this->AdminAyar_Model->birimIDCek($birim_ad),
                        'bolum_ad' => $bolum_ad
                    );

                }
            }
            $this->AdminAyar_Model->import_Bolum($data);
            echo ' Adet Bölüm Eklendi!';
        }


    }
    public function import_Unvan(){
        if(isset($_FILES["fileUnvan"]["name"]))
        {

            $path = $_FILES["fileUnvan"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++)
                {
                    $unvan = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $data[] = array(

                        'unvan_ad' => $unvan
                    );

                }
            }
            $this->AdminAyar_Model->import_Unvan($data);
            echo ' Adet Ünvan Eklendi!';
        }


    }


    public function TopluSil($silinecekTablo){
        if ($silinecekTablo == 'birim'){
            $this->AdminAyar_Model->topluSilme('birim');
            $this->session->set_userdata("silindi",'Birimler silindi.');
            $this->session->mark_as_temp("silindi", 5);
        }
        elseif($silinecekTablo == 'bolum'){
            $this->AdminAyar_Model->topluSilme('bolum');
            $this->session->set_userdata("silindi",'Bölümler silindi.');
            $this->session->mark_as_temp("silindi", 5);

        }elseif ($silinecekTablo == 'unvan'){
            $this->AdminAyar_Model->topluSilme('unvan');
            $this->session->set_userdata("silindi",'Ünvanlar silindi.');
            $this->session->mark_as_temp("silindi", 5);
            redirect(base_url('Ayarlar_admin/GenelAyar'));

        }
        else
            echo "Geçersiz İşlem";
    }
}