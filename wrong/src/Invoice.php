<?php

namespace DesignPattern\Wrong;

class Invoice
{
    public string $cnpjCompany;
    public string $nameCompany;
    public array $items;
    public string $obs;
    public \DateTimeInterface $issuanceDate;

    public function __construct(string $cnpjCompany, string $nameCompany, array $items, string $obs, \DateTimeInterface $issuanceDate)
    {
        $this->cnpjCompany = $cnpjCompany;
        $this->nameCompany = $nameCompany;
        $this->items = $items;
        $this->obs = $obs;
        $this->issuanceDate = $issuanceDate;
    }
}