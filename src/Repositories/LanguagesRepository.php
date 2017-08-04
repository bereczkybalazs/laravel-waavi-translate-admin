<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Repositories;

use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\LanguagesRepositoryInterface;
use Waavi\Translation\Models\Language;

class LanguagesRepository implements LanguagesRepositoryInterface
{
    public function show()
    {
        return Language::all();
    }
}