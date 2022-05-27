<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class PackingSlip extends DataTransferObject
{
    public ?string $url;

    public ?string $status;
}
