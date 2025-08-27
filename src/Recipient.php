<?php

namespace Wingly\Prodigi;

use Spatie\LaravelData\Data;

class Recipient extends Data
{
    public string $name;

    public ?string $email;

    public ?string $phoneNumber;

    public Address $address;
}
