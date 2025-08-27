<?php

namespace Wingly\Prodigi;

use Spatie\LaravelData\Data;

class Address extends Data
{
    public string $line1;

    public ?string $line2;

    public string $postalOrZipCode;

    public string $countryCode;

    public string $townOrCity;

    public ?string $stateOrCounty;
}
