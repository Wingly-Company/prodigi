<?php

namespace Wingly\Prodigi;

use Spatie\LaravelData\Data;

class Asset extends Data
{
    public string $printArea = 'default';

    public string $url;
}
