<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class Asset extends DataTransferObject
{
    public string $printArea = 'default';

    public string $url;
}
