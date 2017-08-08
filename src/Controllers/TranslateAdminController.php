<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Controllers;

use App\Http\Controllers\Controller;
use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\RequestDataTransformerInterface;
use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\ResponseDataTransformerInterface;
use Illuminate\Http\Request;

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
        return view('vendor.translate_admin.admin');
    }

    public function index()
    {
        return response()->json($this->responseTransformer->transform()->response->translates);
    }

    public function store(Request $request)
    {
        $data = $this->transformer->requestToArray($request);
        return $data;
    }
}
