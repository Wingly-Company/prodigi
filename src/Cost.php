<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class Cost extends DataTransferObject
{
    public string $amount;

    public string $currency;
}
