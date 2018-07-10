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
        $this->unformattedTranslates = $this->translateRepository->showByGroup();
        $this->transformTranslates();
        return $this;
    }

    
    protected function transformTranslates()
    {
        if (count($this->unformattedTranslates) > 0) {
            $this->response->translates = new \stdClass();
            $groups = [];
            foreach ($this->unformattedTranslates->groupBy('group') as $key => $group) {
                $data = $group->groupBy('locale');
                $groups[] = json_decode(json_encode([
                    'name' => $key,
                    'data' => $data,
                    'percent' => $this->getPercentsByGroup($data)
                ]));
            }
            $this->response->translates->groups = $groups;
        }
    }

    protected function getPercentsByGroup($data)
    {
        $percents = new \stdClass();
        foreach ($data as $locale => $localizedData) {
            $progress = 0;
            foreach ($localizedData as $data) {
                if ($data->text != '') {
                    $progress++;
                }
            }
            $percents->{$locale} = number_format(($progress / count($localizedData)) * 100, 2);
        }
        return $percents;
    }
}
