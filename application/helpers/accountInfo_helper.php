<?php
function user_account_info(){
    $ci = get_instance();
    $login_id = $ci->session->userdata('user_id');

    $dbData = new stdClass();
    $dbData->row_icerik = $ci->Account_Model->get_account_Info($login_id);
    $account_info_sessionArr = array();
    foreach ($dbData->row_icerik as $item){
        array_push($account_info_sessionArr,$item->user_ad,$item->user_soyad,$item->birim_ad,$item->unvan_ad,$item->email,$item->user_id);
    }
    $accountSessArr=array(
        'name' =>$account_info_sessionArr[0],
        'lastname'=> $account_info_sessionArr[1],
        'email' => $account_info_sessionArr[4],
        'birim_ad'=> $account_info_sessionArr[2],
        'unvan_ad'=> $account_info_sessionArr[3],
        'hocaID'=> $account_info_sessionArr[5]
    );
    $ci->session->set_userdata($accountSessArr);
}
function admin_account_info(){
    $ci = get_instance();
    $login_id = $ci->session->userdata('admin_id');

    $dbData = new stdClass();
    $dbData->row_icerik = $ci->Account_Model->get_AdminAcc_Info($login_id);
    $account_info_sessionArr = array();
    foreach ($dbData->row_icerik as $item){
        array_push($account_info_sessionArr,$item->user_ad,$item->user_soyad,$item->user_id,$item->yetki);
    }
    $accountSessArr=array(
        'name' =>$account_info_sessionArr[0],
        'lastname'=> $account_info_sessionArr[1],
        'user_id'=> $account_info_sessionArr[2],
        'yetki'=> $account_info_sessionArr[3]

    );
    $ci->session->set_userdata($accountSessArr);
}
