<?php

use DesignPattern\Wrong\Invoice;

require "vendor/autoload.php";

$cnpjCompany = '00.000.000/0000-00';
$nameCompany = 'Company Name';
$obs = 'Something';
$items = [
    'Product 1'
];
$today = new DateTimeImmutable();

$invoice = new Invoice($cnpjCompany,$nameCompany,$items,$obs, $today);