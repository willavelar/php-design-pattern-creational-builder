<?php

use DesignPattern\Right\InvoiceBuilder;

require "vendor/autoload.php";

$invoiceBuilder = new InvoiceBuilder();
$invoiceBuilder->forCompany( '00.000.000/0000-00', 'Company Name')
               ->withItem( 'Product 1')
               ->withObs('Something')
               ->withIssuanceDate(new DateTimeImmutable());

$invoice = $invoiceBuilder->build();