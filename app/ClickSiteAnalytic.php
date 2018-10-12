<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class ClickSiteAnalytic extends Model
{

    protected $fillable = [
        'sites_id', 'coordinate_Y', 'coordinate_X',
    ];

    protected $table = 'click_site_analytics';

    public static function saveSitesClick($site, $request)
    {
        $siteClicks = new self();
        $siteClicks->sites_id = $site->id;
        $siteClicks->coordinate_X = $request->coordinate_X;
        $siteClicks->coordinate_Y = $request->coordinate_Y;
        $siteClicks->save();
//        return true;
    }
}
