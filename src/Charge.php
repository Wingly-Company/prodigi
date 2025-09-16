<?php

namespace Wingly\Prodigi;

use Spatie\LaravelData\Data;

class Charge extends Data
{
    public string $id;

    public string $prodigiInvoiceNumber;

    public Cost $totalCost;

    /** @var ChargeItem[] */
    public $items;
}
