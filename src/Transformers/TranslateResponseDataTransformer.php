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

    public function __construct()
    {
        $this->languagesRepository = new LanguagesRepository();
        $this->translateRepository = new TranslationRepository();
    }

    public function transform()
    {
        $this->response = new \stdClass();
        $this->response->languages = $this->languagesRepository->show();
        $this->response->unformattedTranslates = $this->translateRepository->show();
        $this->transformTranslates();
        return $this;
    }

    protected function transformTranslates()
    {
        if (isset($this->response->unformattedTranslates)) {
            $this->response->translates = new \stdClass();
            $groups = new \stdClass();
            foreach ($this->response->unformattedTranslates->groupBy('group') as $key => $group) {
                $groups->{$key} = $group->groupBy('locale');
            }
            $this->response->translates->groups = $groups;
        }
    }
}