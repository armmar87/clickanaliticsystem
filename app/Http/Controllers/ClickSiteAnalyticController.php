<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;

class ClickSiteAnalyticController extends Controller
{
    public function setClickSites(Request $request)
    {
        return Site::setClickSites($request);
    }
}
