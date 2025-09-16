<?php

namespace Wingly\Prodigi;

use Spatie\LaravelData\Data;

class Status extends Data
{
    public string $stage;

    /** @var Details[] */
    public $details;

    /** @var Issues[] */
    public $issues;
}
