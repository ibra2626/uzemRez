<?php
function ldap($username, $password, $basedn='dc=bilecik,dc=edu,dc=tr'){
    $server='192.168.120.20';

    $ldap_con = ldap_connect($server);
    ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
    //ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);

    $sr = ldap_list($ldap_con, $basedn, 'ou=*', array('ou'));
    $contexts = ldap_get_entries($ldap_con, $sr);

    if ($ldap_con) {
        //Ldap Bağlamlar  :ou=personel,dc=bilecik,dc=edu,dc=tr;ou=ogrenci,dc=bilecik,dc=edu,dc=tr
        for ($i=0; $i < $contexts['count']; $i++) {

            $ldap_dn = "uid=".$username.",".$contexts[$i]['dn'];
            $bind = @ldap_bind($ldap_con,$ldap_dn,$password);
            if ($bind){

                ldap_close($ldap_con);
                return TRUE;
            }

        }

        ldap_close($ldap_con);
        return FALSE;

    }else{

        return FALSE;

    }
}