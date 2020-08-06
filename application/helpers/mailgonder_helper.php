<?php
function mailAyar(){
    $ci = get_instance();

    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'ibrahim.yesill26@gmail.com',
        'smtp_pass' => '',
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'wordwrap' => true,
        'newline' => '\r\n'
    );
    $ci->load->library('email', $config);
    $ci->email->set_newline("\r\n");
    $ci->email->from('ibrahim.yesil26@gmail.com','UZEM');

}
function kayitMail($ad,$soyad,$email){
    $ci = get_instance();
    mailAyar();

    $ci->email->to($email);
    $ci->email->subject('Kayıt Başarılı');

    $data = array('ad' => $ad,'soyad'=>$soyad);
    $message = $ci->load->view('primary/email_kayitSablon',$data,TRUE);

    $ci->email->message($message);
    $ci->email->send();
}
function RandevuMail($tarih,$saat,$email){
    $ci = get_instance();
    mailAyar();

    $ci->email->to($email);
    $ci->email->subject('Randevu Alındı');

    $data = array('tarih' => $tarih,'saat'=>$saat);
    $message = $ci->load->view('primary/email_RandevuSablon',$data,TRUE);

    $ci->email->message($message);
    $ci->email->send();
}
function okunanOptikMail($mail,$birim_ad,$bolum_ad,$optik_sayisi,$startDate,$icerik){
    $ci = get_instance();
    mailAyar();

    $ci->email->to($mail);
    $ci->email->subject('Okunan Optikler Hk.');

    $data = array('birim_ad' => $birim_ad,'bolum_ad'=>$bolum_ad,'optik_sayisi'=>$optik_sayisi,'startDate'=>$startDate,'aciklama'=>$icerik);
    $message = $ci->load->view('primary/email_okunanOptikSablon',$data,TRUE);

    $ci->email->message($message);
    $ci->email->send();
}
function hatirlatmaMaili($mail,$birim_ad,$bolum_ad,$optik_sayisi,$startDate,$icerik){
    $ci = get_instance();
    mailAyar();

    $ci->email->to($mail);
    $ci->email->subject('Teslim Alınmayan Optikler');

    $data = array('birim_ad' => $birim_ad,'bolum_ad'=>$bolum_ad,'optik_sayisi'=>$optik_sayisi,'startDate'=>$startDate,'aciklama'=>$icerik);
    $message = $ci->load->view('primary/email_okunanOptikSablon',$data,TRUE);

    $ci->email->message($message);
    $ci->email->send();
}