<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Transformers;

use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\RequestDataTransformerInterface;

class TranslateRequestDataTransformer implements RequestDataTransformerInterface
{

    public function fill($data)
    {
        if (gettype($data) == 'array' && count($data) > 0) {

        }
    }

    public function transform()
    {
        // TODO: Implement transform() method.
    }

    public function store()
    {
        // TODO: Implement store() method.
    }
}