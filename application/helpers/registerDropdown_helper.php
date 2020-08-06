<?php
function dropDown($tablo){
    $ci =& get_instance();
    $ci->load->model('Register_Model');
    $data = new stdClass();
    $data->icerik = $ci->Register_Model->dropdowns_getAll($tablo);
    return $data;
}