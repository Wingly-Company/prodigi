<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class FulfillmentLocation extends DataTransferObject
{
    public string $countryCode;

    public string $labCode;
}
