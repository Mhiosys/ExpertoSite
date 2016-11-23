<?php
//require_once("Config.php");
/*
$DOMINIO = 'sigcomt.com';
$DN = 'DC=sigcomt,DC=com';
$SERVER = 'sigcomt.com';
$PUERTO = 389;
*/
$DOMINIO1 = 'bancofalabella.com.pe';
$DOMINIO2 = 'falabella.com';
$DOMINIO3 = 'falabella.com.pe';
$DOMINIO4 = 'falabella.cl';
//$DOMINIO = array('bancofalabella.com.pe', 'falabella.com', 'falabella.com.pe', 'falabella.cl');
$DN = 'dc=falabella,dc=com';
$SERVER = '172.22.4.15';
$PUERTO = 389;

function verifyCredentialsAD($user,$pass){
    global $DOMINIO1, $DOMINIO2, $DOMINIO3, $DOMINIO4, $DN, $SERVER, $PUERTO;
    $respuesta = "";
    
    $ldapconn = ldap_connect('LDAP://'.$SERVER)
    or die("NO PUEDE CONECTARSE A LDAP SERVER.");
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION,3); 
    ldap_set_option($ldapconn, LDAP_OPT_REFERRALS,0);     

    $dn = $DN;
    $ldappass = trim($pass);

    $ldaprdn = trim($user).'@'.$DOMINIO1;
    $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);

    if ($ldapbind)
    {
        $filter="(sAMAccountName=".trim($user).")";
        $fields = array("sAMAccountName"); 
        $sr = @ldap_search($ldapconn, $dn, $filter, $fields); 
        $info = @ldap_get_entries($ldapconn, $sr); 
        $respuesta = $info[0]["samaccountname"][0];
    }else
    { 
        $ldaprdn = trim($user).'@'.$DOMINIO2;
        $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);

        if ($ldapbind)
        {
            $filter="(sAMAccountName=".trim($user).")";
            $fields = array("sAMAccountName"); 
            $sr = @ldap_search($ldapconn, $dn, $filter, $fields); 
            $info = @ldap_get_entries($ldapconn, $sr); 
            $respuesta = $info[0]["samaccountname"][0];
        }else
        {
            $ldaprdn = trim($user).'@'.$DOMINIO3;
            $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);

            if ($ldapbind)
            {
                $filter="(sAMAccountName=".trim($user).")";
                $fields = array("sAMAccountName"); 
                $sr = @ldap_search($ldapconn, $dn, $filter, $fields); 
                $info = @ldap_get_entries($ldapconn, $sr); 
                $respuesta = $info[0]["samaccountname"][0];
            }else
            {
                $ldaprdn = trim($user).'@'.$DOMINIO4;
                $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);

                if ($ldapbind)
                {
                    $filter="(sAMAccountName=".trim($user).")";
                    $fields = array("sAMAccountName"); 
                    $sr = @ldap_search($ldapconn, $dn, $filter, $fields); 
                    $info = @ldap_get_entries($ldapconn, $sr); 
                    $respuesta = $info[0]["samaccountname"][0];
                }else
                {
                    $respuesta=0;
                }
            }
        }        
    } 
    
    ldap_close($ldapconn);
     
    return $respuesta;
} 


?>
