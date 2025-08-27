<?php

namespace Wingly\Prodigi;

use Spatie\LaravelData\Data;

class Details extends Data
{
    public string $downloadAssets;

    public string $allocateProductionLocation;

    public string $printReadyAssetsPrepared;

    public string $inProduction;

    public string $shipping;
}
