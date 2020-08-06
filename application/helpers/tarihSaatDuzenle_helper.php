<?php
function tarihSaatDuzenle($tarih,$saat = ''){

    if (!empty($tarih) AND !empty($saat)){
        $date = new DateTime($tarih);
        $newdate = $date->format('d-m-Y');
        $saatParcala = explode(":",$saat);
        $saatBirlestir = trim($saatParcala[0].":".$saatParcala[1]);
        echo $newdate." ".$saatBirlestir;
    }
    elseif(!empty($tarih)){
        $date = new DateTime($tarih);
        $newdate = $date->format('d-m-Y');
        echo $newdate;
    }

}
