<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Controllers;

use App\Http\Controllers\Controller;
use BereczkyBalazs\Interfaces\RequestDataTransformerInterface;
use Illuminate\Http\Request;

class TranslateAdminController extends Controller
{
    protected $transformer;

    public function __construct(RequestDataTransformerInterface $transformer)
    {
        $this->transformer = $transformer;
    }

    public function view()
    {
        return view('vendor.translate_admin.admin');
    }

    public function index()
    {

    }

    public function store(Request $request)
    {
        $data = $this->transformer->requestToArray($request);
        return $data;
    }
}
