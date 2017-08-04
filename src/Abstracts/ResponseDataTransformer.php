<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Abstracts;

use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\ResponseDataTransformerInterface;

abstract class ResponseDataTransformer implements ResponseDataTransformerInterface
{
    public $unFormattedData;

    public function init($unFormattedData)
    {
        $this->unFormattedData = $unFormattedData;
        return $this;
    }
}