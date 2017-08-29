<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Repositories;


use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\TranslationRepositoryInterface;
use Waavi\Translation\Models\Translation;

class TranslationRepository implements TranslationRepositoryInterface
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function show()
    {
        return Translation::all();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findById($id)
    {
        return Translation::where('id', $id)->first();
    }

    public function storeTextById($id, $text)
    {
        if ($text != null) {
            $translation = $this->findById($id);
            $translation->text = $text;
            $translation->save();
        }
    }
}
