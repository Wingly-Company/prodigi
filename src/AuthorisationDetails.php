<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class AuthorisationDetails extends DataTransferObject
{
    public string $authorisationUrl;

    public Cost $paymentDetails;
}
