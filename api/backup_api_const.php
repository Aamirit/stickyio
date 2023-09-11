<?php
const API_HOST = 'barnabegroup';
const USERNAME = 'farhan_dev';
const PASSWORD = 'jbRZAkUC5dFN3r';
//define('BASE_URL','http://localhost/F_projects/sticky_keto');
const BASE_URL = 'https://looper3.com';
const ALT_PAY_RETURN_URL = BASE_URL . '/u1.php?lang=fr';
const ALT_PAY_RETURN_URL2 = BASE_URL . '/u2.php?lang=fr';
const THANK_YOU = BASE_URL . '/thanks.php?lang=fr';
const KLARNA_CREDENTIALS = 'PK47368_686774757d84:dFTpP4ANVhmCqeeA';

$klarnaUrlTest = 'https://api.playground.klarna.com/';
define('KLARNA_URL', $klarnaUrlTest);

//define('DB_HOST','localhost');
//define('DB_USER','root');
//define('DB_PASSWORD','');
//define('DB','looper');

const DB_USER = 'looper3_keto';
const DB_PASSWORD = 'cq)rj@jN6z,+';
const DB = 'looper3_keto';

const CURRENCIES = array(
    'de' => 'EUR',
    'fr' => 'EUR',
    'befr' => 'EUR',
    'benl' => 'EUR',
    'nl' => 'EUR',
    'ie' => 'GBP',
    'en-gb' => 'GBP',
    'chde' => 'CHF',
    'chit' => 'CHF',
    'chfr' => 'CHF',
);

const STRIPE_COMPAIGNS = array("EUR"=>3,"USD"=>1,"GBP"=>4,"CHF"=>5);

const PAYPAL_COMPAIGNS = array("EUR"=>6,"USD"=>2,"GBP"=>7,"CHF"=>8);