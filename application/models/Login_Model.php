<?php
class Login_Model extends CI_Model
{

  function __construct()
  {
    parent::__construct();

  }

  function loginControl($username,$password){

      $resultAdmin = $this->db->where('email',$username)
               ->where('password',$password)
               ->where('yetki','1')
               ->get('account')
               ->result();
      $resultKullanici = $this->db->where('email',$username)
              ->where('password',$password)
              ->where('yetki','2')
              ->get('account')
              ->result();
      $resultOgrenci = $this->db->where('email',$username)
          ->where('password',$password)
          ->where('yetki','3')
          ->get('account')
          ->result();
      if (!empty($resultAdmin)){
          return $resultAdmin;
      }
      elseif(!empty($resultKullanici)){
          return $resultKullanici;
      }
      elseif(!empty($resultOgrenci)){
          return $resultOgrenci;
      }
      else return false;
  }
}

