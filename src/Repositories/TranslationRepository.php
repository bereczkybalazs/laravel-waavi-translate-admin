<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Repositories;


use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\TranslationRepositoryInterface;
use Waavi\Translation\Models\Translation;

class TranslationRepository implements TranslationRepositoryInterface
{

    public function show()
    {
        return Translation::all();
    }
}