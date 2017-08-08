<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Controllers;

use App\Http\Controllers\Controller;
use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\RequestDataTransformerInterface;
use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\ResponseDataTransformerInterface;
use BereczkyBalazs\WaaviTranslateAdmin\Requests\TranslateRequest;

class TranslateAdminController extends Controller
{
    protected $requestTransformer;

    public function __construct(
        RequestDataTransformerInterface $requestTransformer,
        ResponseDataTransformerInterface $responseTransformer
    )
    {
        $this->requestTransformer = $requestTransformer;
        $this->responseTransformer = $responseTransformer;
    }

    public function view()
    {
        return view('vendor.translate_admin.admin', ['data' => $this->responseTransformer->transform()->response]);
    }

    public function index()
    {
        return response()->json($this->responseTransformer->transform()->response);
    }

    public function store(TranslateRequest $request)
    {
        return response()->json($this->requestTransformer->fill($request->all())->transform()->store());
    }
}
