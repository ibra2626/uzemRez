<?php

class Register_Model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    public function dropdowns_getAll($tablo){
            $result= $this->db
                ->get($tablo)
                ->result();
            return $result;
    }
    public function user_save($table,$user_info = array()){
        
        $this->db->insert($table,$user_info);


    }
    public function user_infoSave(){
        $rowAcc = $this->db
            ->limit(1)
            ->order_by('id','desc')
            ->get('account')
            ->result();
        $rowUser = $this->db
            ->limit(1)
            ->order_by('user_id','desc')
            ->get('users')
            ->result();
        $this->db
            ->set('user_accountId',$rowAcc[0]->id)
            ->where('user_id',$rowUser[0]->user_id)
            ->update('users');
    }

}