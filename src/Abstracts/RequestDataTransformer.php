<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Abstracts;

use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\RequestDataTransformerInterface;
use Illuminate\Http\Request;

abstract class RequestDataTransformer implements RequestDataTransformerInterface
{
    public function __construct(Request $inputRequest)
    {
        $this->requestToArray($inputRequest);
    }

    public function requestToArray(Request $inputRequest)
    {
        return $inputRequest->all();
    }
}