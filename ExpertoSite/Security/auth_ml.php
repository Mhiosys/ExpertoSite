<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


$config['basedn'] = 'dc=falabella,dc=com';
$config['dominio'] = array('bancofalabella.com.pe', 'falabella.com', 'falabella.com.pe', 'falabella.cl');
$config['server'] = 'ldap://172.22.4.15';
$config['port'] = 389;
$config['roles'] = array(1 => 'G_PE_BF_INC_CONSULTA', 3 => 'G_PE_BF_INC_RIESGOS', 5 => 'G_PE_BF_INC_ADMIN');; // Niveles de acceso en la aplicacion.


$config['auditlog'] = 'application/logs/audit.log';  // Registramos los intentos de acceso