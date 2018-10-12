<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{

    protected $fillable = [
        'site_page',
    ];

    public $timestamps = false;

    protected $table = 'sites';

    public static function setClickSites($request)
    {
        $site = self::where('site_page', '=', $request->site_page)->first();
        if(is_null($site)) {
            $site = new self();
            $site->site_page = $request->site_page;
            $site->save();
        }
        return ClickSiteAnalytic::saveSitesClick($site, $request);
    }
}
