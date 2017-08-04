<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Interfaces;

use Illuminate\Http\Request;

interface RequestDataTransformerInterface
{
    public function requestToArray(Request $inputRequest);
}