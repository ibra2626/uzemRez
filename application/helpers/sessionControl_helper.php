<?php
function session_Control(){
    $ci = get_instance();

    $logged_in = $ci->session->userdata('logged_in_admin');
    if ($logged_in == 0){
        redirect(base_url());
    }
}
function session_user_Control(){
    $ci = get_instance();

    $logged_in = $ci->session->userdata('logged_in_user');
    if ($logged_in == 0){
        redirect(base_url());
    }
}