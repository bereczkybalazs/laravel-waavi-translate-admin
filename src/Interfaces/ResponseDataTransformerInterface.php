<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Interfaces;

use Illuminate\Http\Response;

interface ResponseDataTransformerInterface
{
    public function fill(Response $response);
    public function transform();
}