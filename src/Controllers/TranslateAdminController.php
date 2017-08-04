<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Controllers;

use App\Http\Controllers\Controller;
use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\LanguagesRepositoryInterface;
use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\RequestDataTransformerInterface;
use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\ResponseDataTransformerInterface;
use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\TranslationRepositoryInterface;
use Illuminate\Http\Request;

class TranslateAdminController extends Controller
{
    protected $requestTransformer;

    public function __construct(
        RequestDataTransformerInterface $requestTransformer,
        ResponseDataTransformerInterface $responseTransformer,
        LanguagesRepositoryInterface $languagesRepository,
        TranslationRepositoryInterface $translationRepository
    )
    {
        $this->requestTransformer = $requestTransformer;
        $this->responseTransformer = $responseTransformer;
        $this->languagesRepository = $languagesRepository;
        $this->translationRepository = $translationRepository;
    }

    public function view()
    {
        return view('vendor.translate_admin.admin');
    }

    public function index()
    {
        $data = $this->responseTransformer->init([
            ['name' => 'languages', 'data' => $this->languagesRepository->show()],
            ['name' => 'translations', 'data' => $this->translationRepository->show()],
        ]);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = $this->transformer->requestToArray($request);
        return $data;
    }
}
