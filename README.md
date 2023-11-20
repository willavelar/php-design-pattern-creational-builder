## Builder

Builder is a creational design pattern that lets you construct complex objects step by step. The pattern allows you to produce different types and representations of an object using the same construction code.

-----

We need to create an invoice class

### The problem

If we do it this way, every time the number of parameters increases, the constructor line will increase, making it very disorganized.

```php
<?php
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
```
```php
<?php
$cnpjCompany = '00.000.000/0000-00';
$nameCompany = 'Company Name';
$obs = 'Something';
$items = [
    'Product 1'
];
$today = new DateTimeImmutable();

$invoice = new Invoice($cnpjCompany,$nameCompany,$items,$obs, $today);
```

### The solution

Now, using the Builder pattern, we have created a more user-friendly creation method, with steps for each case, improving the creation of an invoice

```php
<?php
class Invoice
{
    public string $cnpjCompany;
    public string $nameCompany;
    public array $items;
    public string $obs;
    public \DateTimeInterface $issuanceDate;

}
```
```php
<?php
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
```
```php
<?php
$invoiceBuilder = new InvoiceBuilder();
$invoiceBuilder->forCompany( '00.000.000/0000-00', 'Company Name')
               ->withItem( 'Product 1')
               ->withObs('Something')
               ->withIssuanceDate(new DateTimeImmutable());

$invoice = $invoiceBuilder->build();
```

-----

### Installation for test

![PHP Version Support](https://img.shields.io/badge/php-7.4%2B-brightgreen.svg?style=flat-square) ![Composer Version Support](https://img.shields.io/badge/composer-2.2.9%2B-brightgreen.svg?style=flat-square)

```bash
composer install
```

```bash
php wrong/test.php
php right/test.php
```