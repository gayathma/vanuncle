<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//Custom configuration file.

//This is to set the site title
$config['APPLICATION_MAIN_TITLE'] = "VanUncle.lk";
$config['LOGIN_OPTION']           = 1;



//Systems
$systems= array('ADVERTISEMENT','USERS','PAGES','REVIEWS','VEHICLE SPECS','SETTINGS');
$config['SYSTEMS']=$systems;


$config['URL'] = 'http://localhost/index.php';

