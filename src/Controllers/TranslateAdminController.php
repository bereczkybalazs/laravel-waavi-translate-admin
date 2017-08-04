<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Controllers;

use App\Http\Controllers\Controller;
use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\RequestDataTransformerInterface;
use BereczkyBalazs\WaaviTranslateAdmin\Interfaces\ResponseDataTransformerInterface;
use Illuminate\Http\Request;
use Waavi\Translation\Models\Translation;

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
        return response()->json(Translation::orderBy('item', 'ASC')->get()->groupBy('group'));
    }

    public function store(Request $request)
    {
        $data = $this->transformer->requestToArray($request);
        return $data;
    }
}
