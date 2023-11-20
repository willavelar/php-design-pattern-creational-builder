<?php

namespace DesignPattern\Right;

class InvoiceBuilder
{
    private Invoice $invoice;

    public function __construct()
    {
        $this->invoice = new Invoice();
        $this->invoice->issuanceDate = new \DateTimeImmutable();
    }

    public function forCompany(string $cnpjCompany, string $nameCompany): self
    {
        $this->invoice->cnpjCompany = $cnpjCompany;
        $this->invoice->nameCompany = $nameCompany;

        return $this;
    }

    public function withItem(string $item): self
    {
        $this->invoice->items[] = $item;

        return $this;
    }

    public function withObs(string $obs): self
    {
        $this->invoice->obs = $obs;

        return $this;
    }

    public function withIssuanceDate(\DateTimeInterface $issuanceDate): self
    {
        $this->invoice->issuanceDate = $issuanceDate;

        return $this;
    }

    public function build(): Invoice
    {
        return $this->invoice;
    }
}