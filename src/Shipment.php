<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class Shipment extends DataTransferObject
{
    public string $id;

    public Carrier $carrier;

    public string $dispatchDate;

    /** @var ShipmentItem[] */
    public $items;

    public FulfillmentLocation $fulfillmentLocation;
}
