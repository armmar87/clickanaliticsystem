<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Site extends Model
{

    protected $fillable = [
        'site_page',
    ];

    public $timestamps = false;

    protected $table = 'sites';

    public static function setClickSites($request)
    {
        DB::beginTransaction();
        try {
            $site = self::where('site_page', '=', $request->site_page)->first();
            if (is_null($site)) {
                $site = new self();
                $site->site_page = $request->site_page;
                $site->save();
            }
            ClickSiteAnalytic::saveSitesClick($site, $request);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Error'])->setStatusCode(500);
        }
        return response()->json(['status' => 'OK'])->setStatusCode(200);
    }
}
