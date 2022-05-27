<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class Issues extends DataTransferObject
{
    public string $objectId;

    public string $errorCode;

    public string $description;

    public AuthorisationDetails $authorisationDetails;
}
