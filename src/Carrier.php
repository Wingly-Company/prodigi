<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class Carrier extends DataTransferObject
{
    public string $name;

    public string $service;
}
