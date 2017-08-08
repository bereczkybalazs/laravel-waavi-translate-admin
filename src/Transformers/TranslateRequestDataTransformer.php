<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Transformers;

use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\RequestDataTransformerInterface;
use BereczkyBalazs\WaaviTranslateAdmin\Repositories\TranslationRepository;

class TranslateRequestDataTransformer implements RequestDataTransformerInterface
{
    public $request;
    protected $storeData;

    public function __construct()
    {
        $this->storeData = [];
        $this->translateRepository = new TranslationRepository();
    }

    public function fill($data)
    {
        $this->request = $data;
        return $this;
    }

    public function transform()
    {
        foreach ($this->request as $locale) {
            foreach ($locale as $item) {
                $this->storeData[] = json_decode(json_encode($item));
            }
        }
        return $this;
    }

    public function store()
    {
        foreach ($this->storeData as $item) {
            $this->translateRepository->storeTextById($item->id, $item->text);
        }
    }
}