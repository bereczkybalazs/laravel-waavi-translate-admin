<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Interfaces;

interface RequestDataTransformerInterface
{
    public function fill($data);
    public function transform();
}