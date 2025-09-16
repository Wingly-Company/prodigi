<?php

namespace Wingly\Prodigi;

use Spatie\LaravelData\Data;

class Issues extends Data
{
    public string $objectId;

    public string $errorCode;

    public string $description;

    public AuthorisationDetails $authorisationDetails;
}
