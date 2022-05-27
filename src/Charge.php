<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class Charge extends DataTransferObject
{
    public string $id;

    public string $prodigiInvoiceNumber;

    public Cost $totalCost;

    /** @var \Wingly\Prodigi\ChargeItem[] */
    public $items;
}
