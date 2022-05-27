<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class Address extends DataTransferObject
{
    public string $line1;

    public ?string $line2;

    public string $postalOrZipCode;

    public string $countryCode;

    public string $townOrCity;

    public ?string $stateOrCounty;
}
