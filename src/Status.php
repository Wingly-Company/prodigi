<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class Status extends DataTransferObject
{
    public string $stage;

    /** @var \Wingly\Prodigi\Details[] */
    public $details;

    /** @var \Wingly\Prodigi\Issues[] */
    public $issues;
}
