<?php

namespace Repositories;

use BereczkyBalazs\Interfaces\LanguagesRepositoryInterface;

class LanguagesRepository implements LanguagesRepositoryInterface
{
    public function show()
    {
        return Languages::all();
    }
}