<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class Item extends DataTransferObject
{
    public ?string $id;

    public ?string $merchantReference;

    public string $sku;

    public int $copies = 1;

    public string $sizing = 'fillPrintArea';

    public ?Cost $recipientCost;

    public array $attributes = [];

    /** @var \Wingly\Prodigi\Asset[] */
    public $assets;
}
