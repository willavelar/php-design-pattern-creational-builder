<?php

namespace DesignPattern\Right;

class Invoice
{
    public string $cnpjCompany;
    public string $nameCompany;
    public array $items;
    public string $obs;
    public \DateTimeInterface $issuanceDate;

}