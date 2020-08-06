<?php
class Raporlamalar extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Raporlamalar_Model');
        $this->load->model('OptikIslem_Model');
        $this->load->model('kullanici/Randevu_Model');
    }

    public function index(){
        $this->load->view('Raporlamalar',array(
            'dropdown_birim' => dropDown('birim'),
            'dropdown_unvan' => dropDown('unvan')
        ));
    }
    public function raporToplamOptik(){
        $gelenTarih = $this->input->post('tarih');
        $bolum_id = $this->input->post('bolumGetir');
        $tarihler = $this->tarihParcala($gelenTarih);
        $toplamOptik = $this->Raporlamalar_Model->toplamOptik($tarihler[0],$tarihler[1],1,$bolum_id);
        echo json_encode($toplamOptik);
    }
    public function raporBekleyenOptik(){
        $gelenTarih = $this->input->post('tarih');
        $bolum_id = $this->input->post('bolumGetir');
        $tarihler = $this->tarihParcala($gelenTarih);
        $bekleyenOptik = $this->Raporlamalar_Model->toplamOptik($tarihler[0],$tarihler[1],0,$bolum_id);
        echo json_encode($bekleyenOptik);
    }
    public function rapor_YapilanIslem(){
        $gelenTarih = $this->input->post('tarih');
        $bolum_id = $this->input->post('bolumGetir');
        $tarihler = $this->tarihParcala($gelenTarih);
        $optikler = $this->Raporlamalar_Model->tarihArasiIslem($tarihler[0],$tarihler[1],$bolum_id);
        echo json_encode($optikler);

    }
    public function tarihParcala($gelenTarih){

        $select_Date = explode("-", $gelenTarih);

        $startDateArr = explode("/", $select_Date[0]);
        $finishDateArr = explode("/", $select_Date[1]);

        $startDateStr = trim($startDateArr[2]) . "-" . trim($startDateArr[1]) . "-" . trim($startDateArr[0]);
        $finishDateStr = trim($finishDateArr[2]) . "-" . trim($finishDateArr[1]) . "-" . trim($finishDateArr[0]);

        $saatler = array($startDateStr,$finishDateStr);
        return $saatler;

    }
    public function okumaYapan(){
        $optikID = $this->input->post('optikID');
        $result = $this->Raporlamalar_Model->okumaYapan($optikID);
        echo json_encode($result);
    }
    public function teslimEden(){
        $optikID = $this->input->post('optikID');
        $result = $this->Raporlamalar_Model->teslimEden($optikID);
        echo json_encode($result);
    }
    public function teslimAlan(){
        $optikID = $this->input->post('optikID');
        $result = $this->Raporlamalar_Model->teslimAlan($optikID);
        echo json_encode($result);
    }
    /*
     * PDF OLUŞTURMA
     */
    public function raporlamaPdf($durum = ""){
        $bolumID = $this->input->post('bolumGetir');
        $bolumAd = $this->Raporlamalar_Model->bolumGetir($bolumID);
        $raporPdf =  $this->raporCek($bolumID);

        $this->load->view('dashboard/htmltopdf',array(
            'bolumAd' => $bolumAd,
            'rapor' => $raporPdf[0],
            'okunanOptik' => $raporPdf[1],
            'bekleyenOptik' => $raporPdf[2],
            'toplamOptik' => $raporPdf[3]
        ));

        $html = $this->output->get_output();

        // Load pdf library

        // Load HTML content
        $this->pdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $this->pdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $font = $this->pdf->getFontMetrics()->get_font("DejaVu Sans");
        $turkey = now("Turkey");
        $simdikiTarih = mdate('%Y%m%d',$turkey);
        $this->pdf->stream($simdikiTarih, array("Attachment"=>0));

    }
    public function raporCek($bolumID = ""){
        $gelenTarih = $this->input->post('selected_dateRange');
        $tarihler = $this->tarihParcala($gelenTarih);
        $raporArr = array();
        array_push($raporArr,$this->Raporlamalar_Model->OptikBilgiCek($tarihler[0],$tarihler[1],$bolumID),$this->Raporlamalar_Model->toplamOptik($tarihler[0],$tarihler[1],1,$bolumID),$this->Raporlamalar_Model->toplamOptik($tarihler[0],$tarihler[1],0,$bolumID),$this->Raporlamalar_Model->toplamOptikRapor($tarihler[0],$tarihler[1],$bolumID));
        return $raporArr;
    }
    public function bolumGoster(){
        $birim_id = $this->input->post('birim_id');

        $bolumler = $this->Randevu_Model->bolumCek($birim_id);
        echo json_encode($bolumler);
    }
}