<?php

namespace Wingly\Prodigi;

use Spatie\LaravelData\Data;

class Shipment extends Data
{
    public string $id;

    public Carrier $carrier;

    public string $dispatchDate;

    /** @var ShipmentItem[] */
    public $items;

    public FulfillmentLocation $fulfillmentLocation;
}
