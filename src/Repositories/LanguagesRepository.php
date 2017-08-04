<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Repositories;

use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\LanguagesRepositoryInterface;

class LanguagesRepository implements LanguagesRepositoryInterface
{
    public function show()
    {
        return Languages::all();

    }
}