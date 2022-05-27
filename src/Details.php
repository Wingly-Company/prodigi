<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class Details extends DataTransferObject
{
    public string $downloadAssets;

    public string $allocateProductionLocation;

    public string $printReadyAssetsPrepared;

    public string $inProduction;

    public string $shipping;
}
