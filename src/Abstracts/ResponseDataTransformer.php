<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Abstracts;

use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\ResponseDataTransformerInterface;
use Illuminate\Http\Response;

abstract class ResponseDataTransformer implements ResponseDataTransformerInterface
{
    public function __construct(Response $inputResponse)
    {
        $this->responseToArray($inputResponse);
    }

    public function responseToArray(Response $inputResponse)
    {
        return $inputResponse->all();
    }
}