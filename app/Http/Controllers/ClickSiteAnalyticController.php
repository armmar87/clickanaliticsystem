<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClickAnalyticSites;
use App\Site;
use Illuminate\Http\Request;

class ClickSiteAnalyticController extends Controller
{
    public function setClickSites(StoreClickAnalyticSites $request)
    {
        return Site::setClickSites($request);
    }
}
