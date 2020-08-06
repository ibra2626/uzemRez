<?php
function pageLoad($sendView,$pageName){
    $ci =get_instance();
    $pageNameArr = array(
        'pageName' => $pageName
    );
    $ci->load->view($sendView,$pageNameArr);
}