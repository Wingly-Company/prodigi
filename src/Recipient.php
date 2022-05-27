<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class Recipient extends DataTransferObject
{
    public string $name;

    public ?string $email;

    public ?string $phoneNumber;

    public Address $address;
}
