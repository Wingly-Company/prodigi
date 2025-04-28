<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class Status extends DataTransferObject
{
    public string $stage;

    /** @var Details[] */
    public $details;

    /** @var Issues[] */
    public $issues;
}
