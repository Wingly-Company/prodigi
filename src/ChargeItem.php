<?php

namespace Wingly\Prodigi;

use Spatie\LaravelData\Data;

class ChargeItem extends Data
{
    public string $id;

    public string $description;

    public string $itemSku;

    public string $shipmentId;

    public string $itemId;

    public string $merchantItemReference;

    public Cost $cost;
}
