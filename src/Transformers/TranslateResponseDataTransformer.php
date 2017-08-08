<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Transformers;

use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\ResponseDataTransformerInterface;
use BereczkyBalazs\WaaviTranslateAdmin\Repositories\LanguagesRepository;
use BereczkyBalazs\WaaviTranslateAdmin\Repositories\TranslationRepository;

class TranslateResponseDataTransformer implements ResponseDataTransformerInterface
{
    public $response;
    protected $languagesRepository;
    protected $translateRepository;
    protected $unformattedTranslates;

    public function __construct()
    {
        $this->languagesRepository = new LanguagesRepository();
        $this->translateRepository = new TranslationRepository();
    }

    public function transform()
    {
        $this->response = new \stdClass();
        $this->response->locales = $this->languagesRepository->show();
        $this->unformattedTranslates = $this->translateRepository->show();
        $this->transformTranslates();
        return $this;
    }

    protected function transformTranslates()
    {
        if (count($this->unformattedTranslates) > 0) {
            $this->response->translates = new \stdClass();
            $groups = [];
            foreach ($this->unformattedTranslates->groupBy('group') as $key => $group) {
                $groups[] = json_decode(json_encode(['name' => $key, 'data' => $group->groupBy('locale')]));
            }
            $this->response->translates->groups = $groups;
        }
    }
}