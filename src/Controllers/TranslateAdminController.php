<?php

namespace BereczkyBalazs\WaaviTranslateAdmin\Controllers;

use App\Http\Controllers\Controller;

class TranslateAdminController extends Controller
{
    public function index()
    {
        return view('vendor.translate_admin.admin', ['test' => 213213213]);
    }
}
