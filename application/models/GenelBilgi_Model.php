<?php
class GenelBilgi_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function dashboardOptikTotalBilgi($durum){
        return $this->db
            ->select_sum('optik_sayisi')
            ->where('tamamlandi',$durum)
            ->get('optikislem')
            ->result();
    }
    public function dashboardKullaniciTotalBilgi($durum){
        return $this->db
            ->where('user_durum',$durum)
            ->from('users')
            ->count_all_results();
    }

}