<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class ChargeItem extends DataTransferObject
{
    public string $id;

    public string $description;

    public string $itemSku;

    public string $shipmentId;

    public string $itemId;

    public string $merchantItemReference;

    public Cost $cost;
}
