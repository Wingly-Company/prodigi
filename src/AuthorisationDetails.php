<?php

namespace Wingly\Prodigi;

use Spatie\LaravelData\Data;

class AuthorisationDetails extends Data
{
    public string $authorisationUrl;

    public Cost $paymentDetails;
}
