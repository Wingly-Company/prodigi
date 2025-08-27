<?php

namespace Wingly\Prodigi;

use Spatie\LaravelData\Data;

class Item extends Data
{
    public ?string $id;

    public ?string $merchantReference;

    public string $sku;

    public int $copies = 1;

    public string $sizing = 'fillPrintArea';

    public ?Cost $recipientCost;

    public array $attributes = [];

    /** @var Asset[] */
    public $assets;
}
